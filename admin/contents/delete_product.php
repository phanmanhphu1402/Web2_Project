<?php
$path = dirname(getcwd(), 2) . '\database' . '\dbhelper.php';
require_once $path;


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$productId = ($_POST['productId']);

	// $sql = "delete from product where ProductID = " . $productId;

	// execute($sql);

	// echo 'Delete Success';


	$sql = "SELECT COUNT(*) as sold_count FROM bill_detail WHERE ProductID = $productId";
	$result = executeSingleResult($sql);
	if ($result['sold_count'] > 0) {
		// Sản phẩm đã được bán ra, ẩn sản phẩm trên trang web
		$sql = "UPDATE product SET ProductStatus = 1 WHERE ProductID = $productId";
		execute($sql);
		echo "Product has been sold and is now hidden from the website.";
	} else {
		/// Sản phẩm chưa được bán ra, xóa sản phẩm
		$sql = "DELETE FROM product WHERE ProductID = $productId";
		execute($sql);
		echo "Product has been deleted.";
	}	
}
