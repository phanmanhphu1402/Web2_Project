<?php
$path = dirname(getcwd(), 2) . '\database' . '\dbhelper.php';
require_once $path;
$productId = $productName = $productImg = $productType = $productDescription = $productStock = $productStatus = $productPrice = '';
if (!empty($_POST)) {

	if (isset($_POST['productId'])) {
		$productId = $_POST['productId'];
	}

	if (isset($_POST['productName'])) {
		$productName = $_POST['productName'];
	}

	if (isset($_POST['productImg'])) {
		$productImg = $_POST['productImg'];
	}

	if (isset($_POST['productType'])) {
		$productType = $_POST['productType'];
	}

	if (isset($_POST['productDescription'])) {
		$productDescription = $_POST['productDescription'];
	}

	if (isset($_POST['productStock'])) {
		$productStock = $_POST['productStock'];
	}

	if (isset($_POST['productStatus'])) {
		$productStatus = $_POST['productStatus'];
	}

	if (isset($_POST['productPrice'])) {
		$productPrice = $_POST['productPrice'];
	}
	$productId = str_replace('\'', '\\\'', $productId);
	$productName = str_replace('\'', '\\\'', $productName);
	$productImg = str_replace('\'', '\\\'', $productImg);
	$productType = str_replace('\'', '\\\'', $productType);
	$productDescription = str_replace('\'', '\\\'', $productDescription);
	$productStock = str_replace('\'', '\\\'', $productStock);
	$productStatus = str_replace('\'', '\\\'', $productStatus);
	$productPrice = str_replace('\'', '\\\'', $productPrice);

	$image= $_FILES['productImg']['name'];

	//echo $image;	

	$path="../../pic/product"; 
	$image_ext=pathinfo($image, PATHINFO_EXTENSION);
	echo $image_ext;
	$filename= time().'.'.$image_ext;

	if (isset($_POST['productId'])) {
		$productId = $_POST['productId'];
	}

	if ($productId > 0) {
		$sql = "update product set ProductName = '$productName' ,ProductThumbnail = '$filename' ,ProductPrice = '$productPrice',ProductStock = '$productStock',ProductDescription = '$productDescription',ProductType = '$productType',ProductStatus = '$productStatus' WHERE ProductID = " . $productId;
	} else {
		$sql = "insert into product(ProductName,ProductThumbnail,ProductPrice,ProductStock,ProductDescription,ProductType,ProductStatus) value ('$productName','$filename','$productPrice','$productStock','$productDescription','$productType','$productStatus')";
	}
	execute($sql);
	move_uploaded_file($_FILES['productImg']['tmp_name'], $path.'/'.$filename);
	header("Location: admin.php?act=productmanager");
	die();	
}
$productId = '';
if (isset($_GET['productId'])) {
	$productId = $_GET['productId'];
	$sql = "select * from product where ProductID = " . $productId;
	$ProductList = executeResult($sql);
	if ($ProductList != null && count($ProductList) > 0) {
		$product = $ProductList[0];
		$productName = $product['ProductName'];
		$productImg = $product['ProductThumbnail'];
		$productType = $product['ProductType'];
		$productDescription = $product['ProductDescription'];
		$productStock = $product['ProductStock'];
		$productStatus = $product['ProductStatus'];
		$productPrice = $product['ProductPrice'];
	} else {
		$productId = '';
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
	<title>Add User</title>
</head>

<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">User</div>
			<div class="panel-body">
				<form method="post" enctype="multipart/form-data">
					<div class="form-group">
						<input type="text" class="form-control" id="" name="productId" value="<?= $productId ?>" style="display: none">
						<label for="email">Product Name:</label>
						<input type="text" class="form-control" id="" name="productName" value="<?= $productName ?>">
					</div>
					<div class="form-group">
						<label for="pwd">Product Type:</label>
						<select name="productType" id="mySelectProductType">
							<option value="Iphone">Iphone</option>
							<option value="Oppo">Oppo</option>
							<option value="Realme">Realme</option>
							<option value="Vivo">Vivo</option>
							<option value="Samsung">Samsung</option>
						</select>
						<script>
							document.getElementById("mySelectProductType").value = "<?= $productType ?>";
						</script>
					</div>
					<div class="form-group">
						<label for="email">Product Description:</label>
						<input type="text" class="form-control" id="" name="productDescription" value="<?= $productDescription ?>">
					</div>
					<div class="form-group">
						<label for="email">Product Price:</label>
						<input type="number" class="form-control" id="" name="productPrice" value="<?= $productPrice ?>">$
					</div>
					<div class="form-group">
						<label for="email">Product Stock:</label>
						<input type="number" class="form-control" id="" name="productStock" value="<?= $productStock ?>">
					</div>
					<div class="form-group">
						<label for="email">Image:</label>
						<input type="file" class="form-control" id="myProductImg" name="productImg">
						<img id="previewImg" src="#" alt="Image Preview" style="display: none; width: 250px; margin-top: 10px;">
						<script>
							document.getElementById('myProductImg').addEventListener('change', function(event) {
								const file = event.target.files[0];
								if (file) {
									const reader = new FileReader();
									reader.onload = function(e) {
										const previewImg = document.getElementById('previewImg');
										previewImg.src = e.target.result;
										previewImg.style.display = 'block';
									};
									reader.readAsDataURL(file);
								} else {
									const previewImg = document.getElementById('previewImg');
									previewImg.style.display = 'none';
								}
							});
							// Get a reference to our file input
							const fileInput = document.querySelector('input[type="file"]');

							// Create a new File object
							const myFile = new File(['Hello World!'], '<?= $productImg ?>', {
								type: 'text/plain',
								lastModified: new Date(),
							});

							// Now let's create a DataTransfer to get a FileList
							const dataTransfer = new DataTransfer();
							dataTransfer.items.add(myFile);
							fileInput.files = dataTransfer.files;
						</script>
					</div>
					<div class="form-group">
						<label for="pwd">Status:</label>
						<select name="productStatus" id="mySelectProductStatus">
							<option value="1">Hàng bán</option>
							<option value="0">Hàng tồn</option>
						</select>
						<script>
							document.getElementById("mySelectProductStatus").value = "<?= $productStatus ?>";
						</script>
					</div>
					<button type="submit" class="btn btn-info">Save</button>
				</form>
			</div>
			<div class="panel-footer"></div>
		</div>
	</div>

</body>

</html>