<div class="container" style="margin-top: 10px;">
            <div class="panel panel-primary">
                  <div class="panel-heading">
                        <h3 class="panel-title">History Cart</h3>
                  </div>
                  <div class="panel-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Người nhận</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Địa chỉ giao hàng</th>
                                    <th>Tổng giá bill</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $sql = 'select * from bill where Username like "%'.$_SESSION['name'].'%"';
                                    $ListBill = executeResult($sql);
                                    foreach($ListBill as $Bill){
                                        echo '<tr>';
                                        echo '<td>'.$Bill['OrderID'].'</td>';
                                        echo '<td>'.$Bill['OrderDate'].'</td>';
                                        echo '<td>'.$Bill['Fullname'].'</td>';
                                        echo '<td>'.$Bill['Email'].'</td>';
                                        echo '<td>'.$Bill['Phone'].'</td>';
                                        echo '<td>'.$Bill['Address'].'</td>';
                                        echo '<td>'.$Bill['TotalPrice'].'$</td>';
                                        if($Bill['Status']==1){
                                            echo '<td>Đã xử lí</td>';
                                        }else{
                                            echo '<td>Chưa xử lí</td>';
                                        }
                                        echo '<td>';
                                        
                                        echo '<button type="button" class="btn btn-info" onClick=\'window.open("../templates/bill-detail.php?OrderID='.$Bill['OrderID'].'","_self")\'>Chi tiết</button>';
                                        if($_SESSION['role']==1){
                                            if($Bill['Status']==1){
                                                echo '<button type="button" disabled class="btn btn-warning" onClick="lockBill('.$Bill['OrderID'].')">Xử lí</button>';
                                            }else{
                                                echo '<button type="button" class="btn btn-warning" onClick="lockBill('.$Bill['OrderID'].')">Xử lí</button>';
                                            }
                                        
                                        }
                                        echo '</td>';
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>
                  </div>
            </div>
    </div>