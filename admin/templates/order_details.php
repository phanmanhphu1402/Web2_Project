<?php
session_start();
$path = dirname(getcwd(), 2) . '\database' . '\dbhelper.php';
require_once $path;
if (isset($_GET['username'])) {
    $username = $_GET['username'];

    // Thực hiện truy vấn SQL để lấy thông tin đơn hàng của khách hàng
    $sql = "SELECT * FROM bill WHERE Username = '$username'";
    $orders = executeResult($sql);
}
function getStatusText($status) {
    switch ($status) {
        case 0:
            return 'Chưa xử lí';
        case 1:
            return 'Đã xử lí';
        case 2:
            return 'Đang giao';
        case 3:
            return 'Đã giao';
        default:
            return 'Không xác định';
    }
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Bill detail</title>
</head>

<body>
    <?php include_once '../includes/admin_nav.php'; ?>
    <div class="col-sm-10">
        <div class="container">
            <div class="panel panel-primary">
                <div class="panel-heading">Order_details</div>
                <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Order Date</th>
                                <th>Total Price</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td><?php echo $order['OrderID']; ?></td>
                                    <td><?php echo $order['Order_date']; ?></td>
                                    <td><?php echo number_format($order['TotalPrice'], 2); ?>$</td>
                                    <td><?php echo htmlspecialchars(getStatusText($order['status'])) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer"></div>
            </div>
        </div>
    </div>
    <footer class="container-fluid">
    </footer>
</body>

</html>