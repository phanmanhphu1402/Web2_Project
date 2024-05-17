<div class="col-sm-10">
    <div class="container-fluid">
        <div class="panel panel-primary" id="bill-container2">
            <div class="panel-heading">
                <form method="post" style="display: flex;justify-content: space-around;">
                    <label for="email">Date from:</label>
                    <div class="form-group">
                        <input type="date" class="form-control" id="usr2" name="datefrom">
                    </div>
                    <label for="email">Date to:</label>
                    <div class="form-group">
                        <input type="date" class="form-control" id="usr3" name="dateto">
                    </div>
                    <div class="form-group">
                        <input type="button" class="form-control" id="" name="productName" value="Search" onclick="showBillDate()">
                    </div>
                </form>

            </div>
            <div class="panel-heading" style="display: flex;justify-content: space-between;">
                <h3 class="panel-title" style="font-size: 20px;">Bill Manager</h3>
                <button type="button" class="btn btn-default" onclick="sortBill(1)">Sắp xếp giảm dần</button>

                <button type="button" class="btn btn-default" onclick="sortBill1(1)">Sắp xếp tăng dần</button>
                <div class="input-group">
                    <input type="text" class="form-control" id="usr" placeholder="Search by Receiver" style="width: 200px;">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="showBill()">
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
                        $sql = 'select * from bill ';
                        $ListBill = executeResult($sql);
                        foreach ($ListBill as $Bill) {
                            echo '<tr>';
                            echo '<td>' . $Bill['OrderID'] . '</td>';
                            echo '<td>' . $Bill['Username'] . '</td>';
                            echo '<td>' . $Bill['Fullname'] . '</td>';
                            echo '<td>' . $Bill['Order_date'] . '</td>';
                            echo '<td>' . $Bill['TotalPrice'] . '$</td>';
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
                            echo '<button type="button" class="btn btn-info" onClick=\'window.open("../templates/bill-detail.php?OrderID=' . $Bill['OrderID'] . '","_self")\'>Chi tiết</button>';
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
                    $ListBill = executeResult($sql);
                    $number = 0;
                    if ($ListBill != null & count($ListBill) > 0) {
                        $number = $ListBill[0]['number'];
                    }
                    $pages = ceil($number / 10);
                    for ($i = 1; $i <= $pages; $i++) {
                        echo '<li onClick="paginationBill(' . $i . ')"><a>' . $i . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<script>
    function updateStatus(orderId, status) {
    $.ajax({
        url: '../contents/lock_bill.php',
        type: 'POST',
        data: { order_id: orderId, status: status },
        success: function(response) {
            //alert(response);
            location.reload(); 
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            alert('An error occurred while updating the order status.');
        }
    });
}
    function showBillDate() {
        var str = document.getElementById("usr2").value;
        var str1 = document.getElementById("usr3").value;
        if (str == "" && str1 == "") {
            document.getElementById("product-container").innerHTML = "";
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("product-container").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "../contents/getBill2.php?q=" + str + "&p=" + str1, true);
        xmlhttp.send();
    }

    function showBill() {
        var str = document.getElementById("usr").value;
        if (str == "") {
            document.getElementById("product-container").innerHTML = "";
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("product-container").innerHTML = this.responseText;
            }
        }
        xmlhttp.open("GET", "../contents/getBill.php?q=" + str, true);
        xmlhttp.send();
    }
</script>