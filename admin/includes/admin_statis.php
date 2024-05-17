<div class="col-sm-10">
    <div class="container-fluid">
        <div class="panel panel-primary" id="bill-container2">
            <div class="panel-heading">
                <form method="post" style="display: flex;justify-content: space-around;">
                    <label for="email">Date from:</label>
                    <div class="form-group">
                        <input type="date" class="form-control" id="fromDate" name="fromDate">
                    </div>
                    <label for="email">Date to:</label>
                    <div class="form-group">
                        <input type="date" class="form-control" id="toDate" name="toDate">
                    </div>
                    <div class="form-group">
                        <input type="button" class="form-control" id="" name="productName" value="Search" onclick="showBillDate()">
                    </div>
                </form>

            </div>
            <div class="panel-heading" style="display: flex; justify-content: space-between; align-items: center;">
                <h3 class="panel-title" style="font-size: 20px;">Bill Manager</h3>
                <h3 style="margin: 0 auto;">Thống kê 5 khách hàng có mức mua hàng cao nhất</h3>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Khách hàng</th>
                            <th>Tổng tiền mua hàng</th>
                            <th>Chi tiết đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody id="product-container" class="user-container">
                    </tbody>
                </table>
            </div>
            <div class="panel-footer">
            </div>
        </div>
    </div>
</div>
<script>
    function showBillDate() {
        var str = document.getElementById("fromDate").value;
        var str1 = document.getElementById("toDate").value;
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
        xmlhttp.open("GET", "../contents/getUserStatics.php?q=" + str + "&p=" + str1, true);
        xmlhttp.send();
    }
</script>