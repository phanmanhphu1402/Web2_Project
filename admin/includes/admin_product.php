<div class="col-sm-10">
    <div class="container-fluid">
        <div class="panel panel-primary" id="product-container2">
            <div class="panel-heading" style="display: flex;justify-content: space-between;">
                <h3 class="panel-title" style="font-size: 20px;">Product Manager</h3>
                <?php
                if ($_SESSION['role'] == 1) {
                    echo "<button type=" . "button" . " class=" . "'btn btn-danger'" . "onClick=" . "window.open('admin_product_add.php','_self')" . ">Thêm sản phẩm</button>";
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
                        $sql = 'SELECT * FROM product LIMIT 0,10';
                        $ListProduct = executeResult($sql);
                        foreach ($ListProduct as $Product) {
                            echo '<tr>';
                            echo '<tr data-product-id="' . $Product['ProductID'] . '">';
                            echo '<td><img src="../../pic/product/' . $Product['ProductThumbnail'] . '" style="width: 100px;"></td>';
                            echo '<td>' . $Product['ProductName'] . '</td>';
                            echo '<td>' . $Product['ProductType'] . '</td>';
                            echo '<td style="width: 200px;">' . $Product['ProductDescription'] . '</td>';
                            echo '<td>' . $Product['ProductPrice'] . '</td>';
                            echo '<td>' . $Product['ProductStock'] . '</td>';
                            echo '<td>' . $Product['ProductStatus'] . '</td>';
                            echo '<td>';
                            if ($_SESSION['role'] == 1) {
                                echo '<button type="button" class="btn btn-info" onClick=\'window.open("admin_product_add.php?productId=' . $Product['ProductID'] . '", "_self")\'>Sửa</button>';
                                echo '<button type="button" class="btn btn-warning" onClick="lockProduct(' . $Product['ProductID'] . ')">Khóa</button>';
                                echo '<button type="button" class="btn btn-danger" onClick="deleteProduct(' . $Product['ProductID'] . ');">Xóa</button>';
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
                    $sql = 'select count(ProductID) as number from product';
                    $ListProduct = executeResult($sql);
                    $number = 0;
                    if ($ListProduct != null & count($ListProduct) > 0) {
                        $number = $ListProduct[0]['number'];
                    }
                    $pages = ceil($number / 10);
                    for ($i = 1; $i <= $pages; $i++) {
                        echo '<li onClick="paginationProduct(' . $i . ')"><a>' . $i . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>