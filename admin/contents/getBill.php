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
	<?php
	$q = $_GET['q'];
    $sql = 'select * from bill where Fullname like "%'.$q.'%"';

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
</body>
</html>