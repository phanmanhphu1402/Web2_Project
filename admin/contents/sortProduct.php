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
            <h3 class="panel-title" style="font-size: 20px;">Product Manager</h3>
            <?php
                if($_SESSION['role']==1){
                echo "<button type="."button"." class="."'btn btn-danger'" ."onClick="."window.open('admin_product_add.php','_self')".">Thêm sản phẩm</button>";
                }
                ?>
                <button type="button" class="btn btn-default" onclick="sortProduct(1)">Sắp xếp giảm dần</button>

            <button type="button" class="btn btn-default" onclick="sortProduct1(1)">Sắp xếp tăng dần</button>
            <div class="input-group">
                <input type="text" class="form-control" id="usr" placeholder="Search by Product name" style="width: 200px;">
                <div class="input-group-btn">
                <button class="btn btn-default" type="button" onclick="showProduct()">
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Description</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="product-container" class="user-container">
	<?php
	$sql = 'select * from product ORDER BY ProductName ASC limit 0,8';
	$ListProduct = executeResult($sql);
    foreach($ListProduct as $Product){
        echo '<tr>';
        echo '<td>'.$Product['ProductID'].'</td>';
        echo '<td>';
        echo '<img src=';
        echo '"../../pic/product/'.$Product['ProductThumbnail'].'" style ="width: 100px;">';
        echo '</td>';
        echo '<td>'.$Product['ProductName'].'</td>';
        echo '<td>'.$Product['ProductType'].'</td>';
        echo '<td style ="width: 200px;">'.$Product['ProductDescription'].'</td>';
        echo '<td>'.$Product['ProductPrice'].'</td>';
        echo '<td>'.$Product['ProductStock'].'</td>';
        echo '<td>'.$Product['ProductStatus'].'</td>';
        echo '<td>';
        if($_SESSION['role']==1){
        echo '<button type="button" class="btn btn-info" onClick=\'window.open("admin_product_add.php?productId='.$Product['ProductID'].'","_self")\'>Sửa</button>';
        echo '<button type="button" class="btn btn-warning" onClick="lockProduct('.$Product['ProductID'].')">Khóa</button>';
        echo '<button type="button" class="btn btn-danger" onClick="deleteProduct('.$Product['ProductID'].');">Xóa</button>';
        }
        echo '</td>';
        echo '</tr>';
        echo '';
    }
	?>
    </tbody>
                    </table>
              </div>
              <div class="panel-footer">
                <ul class="pagination">
                    <?php
                        $sql = 'select count(ProductID) as number from product';
                        $ListProduct = executeResult($sql);
                        $number = 0;
                        if($ListProduct!=null & count($ListProduct)>0){
                            $number = $ListProduct[0]['number'];
                        }
                        $pages = ceil($number/10);
                        for($i=1;$i<=$pages;$i++){
                            echo '<li onClick="paginationProduct1('.$i.')"><a>'.$i.'</a></li>';
                        }
                    ?>
                </ul>
              </div>
</body>
</html>