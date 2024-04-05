<?php
	if(isset($_SESSION['name'])){
		$name = $_SESSION['name'];
	}
    
    if(!empty($_POST)){
        if(isset($_POST['fullname'])){
            $fullname = $_POST['fullname'];
        }
        if(isset($_POST['email'])){
            $email = $_POST['email'];
        }
        if(isset($_POST['phone'])){
            $phone = $_POST['phone'];
        }
        if(isset($_POST['username'])){
            $username = $_POST['username'];
        }
        if(isset($_POST['address'])){
            $address = $_POST['address'];
        }
        if(isset($_POST['order_date'])){
            $order_date = $_POST['order_date'];
        }
        if(isset($_POST['totalprice'])){
            $totalprice = $_POST['totalprice'];
        }
        $sql = "INSERT INTO bill(Fullname, Phone, Email, Address, OrderDate, TotalPrice, Username) value ('$fullname','$phone','$email','$address','$order_date','$totalprice','$username')";
        // echo $sql;
        execute($sql);
        if(isset($_SESSION['cart'])){
            $sql = 'SELECT count(OrderID) as number from bill';
            $List = executeResult($sql);
            $number = 0;
            if($List!=null & count($List)>0){
                $number = $List[0]['number'];
            }
            $number=$number-1;
            $sql = 'SELECT OrderID from bill limit '.$number.',1';
            $id = execute4($sql,'OrderID');
            foreach ($_SESSION['cart'] as $item) {
                $sql = "INSERT INTO bill_detail(OrderID,ProductID,ProductName,ProductPrice,ProductNum) value ('$id','$item[3]','$item[0]','$item[2]','$item[4]')";
                execute($sql);
            }
            unset($_SESSION['cart']);
        }
    
    }

    

?>



<div class="alert alert-success">
    <strong><h1>Order Success!</h1></strong>
    <a href="trangchu.php">Tiếp tục mua sắm</a>
    </div>