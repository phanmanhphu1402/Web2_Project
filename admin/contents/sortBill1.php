<?php
    session_start();
    $path = dirname(getcwd(),2).'\database'.'\dbhelper.php';
    require_once $path;
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Untitled Document</title>
</head>

<body>
              <div class="panel-heading" style="display: flex;justify-content: space-between;">
                    <h3 class="panel-title" style="font-size: 20px;">Bill Manager</h3>
                    
                    <button type="button" class="btn btn-default" onclick="sortBill()">Sắp xếp giảm dần</button>

                    <button type="button" class="btn btn-default" onclick="sortBill1()">Sắp xếp tăng dần</button>
                    
                    <div class="input-group">
                        <input type="text" class="form-control" id="usr" placeholder="Search by Receiver" style="width: 200px;">
                        <div class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="showReceiver()">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                        </div>
                    </div>
              </div>
              <div class="panel-body">
                    <table class="table table-hover">
                    <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Receiver</th>
                                <th>Order date</th>
                                <th>Total price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="product-container" class="user-container">
                        <?php
                                $sql = 'select * from bill ORDER BY Fullname DESC limit 0,10';
                                $ListBill = executeResult($sql);
                                foreach($ListBill as $Bill){
                                    echo '<tr>';
                                    echo '<td>'.$Bill['OrderID'].'</td>';
                                    echo '<td>'.$Bill['Username'].'</td>';
                                    echo '<td>'.$Bill['Fullname'].'</td>';
                                    echo '<td>'.$Bill['Order_date'].'</td>';
                                    echo '<td>'.$Bill['TotalPrice'].'$</td>';
                                    if ($Bill['status'] == 0) {
                                        echo '<td>Chưa xử lí</td>';
                                    } else if($Bill['status'] == 1) {
                                        echo '<td>Đã xử lí</td>';
                                    }else if($Bill['status'] == 2) {
                                        echo '<td>Đang giao</td>';
                                    }else if($Bill['status'] == 3) {
                                        echo '<td>Đã giao</td>';
                                    }
                                    echo '<td>';
                                    
                                    echo '<button type="button" class="btn btn-info" onClick=\'window.open("admin_product_add.php?productId='.$Bill['OrderID'].'","_self")\'>Chi tiết</button>';
                                    if ($_SESSION['role'] == 1) {
                                        echo '<select class="btn btn-warning" onChange="updateStatus(' . $Bill['OrderID'] . ', this.value)">';
                                        echo '<option value="0"' . ($Bill['status'] == 0 ? ' selected' : '') . '>Chưa xử lí</option>';
                                        echo '<option value="1"' . ($Bill['status'] == 1 ? ' selected' : '') . '>Đã xử lí</option>';
                                        echo '<option value="2"' . ($Bill['status'] == 2 ? ' selected' : '') . '>Đang giao</option>';
                                        echo '<option value="3"' . ($Bill['status'] == 3 ? ' selected' : '') . '>Đã giao</option>';
                                        echo '</select>';
                                    }
                                    echo '</td>';
                                    echo '</tr>';
                                }
                            ?>
                        </tbody>
                    </table>
              </div>
              <div class="panel-footer">
                <ul class="pagination">
                    <?php
                        $sql = 'select count(OrderID) as number from bill';
                        $ListUser = executeResult($sql);
                        $number = 0;
                        if($ListUser!=null & count($ListUser)>0){
                            $number = $ListUser[0]['number'];
                        }
                        $pages = ceil($number/8);
                        for($i=1;$i<=$pages;$i++){
                            echo '<li onClick="paginationBill1('.$i.')"><a>'.$i.'</a></li>';
                        }
                    ?>
                </ul>
              </div>
</body>
</html>