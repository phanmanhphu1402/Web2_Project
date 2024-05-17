<?php
$path = dirname(getcwd(), 2) . '\database' . '\dbhelper.php';
require_once $path;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = intval($_POST['order_id']);
    $status = intval($_POST['status']);

    $sql = "UPDATE bill SET status = $status WHERE OrderID = $order_id";
    execute($sql);
}