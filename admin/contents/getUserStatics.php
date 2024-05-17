<?php
session_start();
$path = dirname(getcwd(), 2) . '\database' . '\dbhelper.php';
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
    $fromDate =  $_GET['q'];
    $toDate = $_GET['p'];
    $sql = "SELECT bill.Username, SUM(bill.TotalPrice) AS TotalAmount 
            FROM bill 
            WHERE bill.Order_date BETWEEN '$fromDate' AND '$toDate'
            GROUP BY bill.Username 
            ORDER BY TotalAmount DESC 
            LIMIT 5";
    $ListBill = executeResult($sql);
    if (!empty($ListBill)) {
        foreach ($ListBill as $Bill) {
            echo '<tr>';
            echo '<td>' . htmlspecialchars($Bill['Username']) . '</td>';
            echo '<td>' . htmlspecialchars(number_format($Bill['TotalAmount'], 2)) . '$</td>';
            echo '<td><a href="order_details.php?username=' . urlencode($Bill['Username']) . '">Xem chi tiết</a></td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="3" style="text-align:center;">Không có dữ liệu thống kê.</td></tr>';
    }
    ?>
</body>

</html>