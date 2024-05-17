<div class="col-sm-10">
      <div class="container-fluid">
        <div class="panel panel-primary" id="user-container2">
              <div class="panel-heading" style="display: flex;justify-content: space-between;">
                    <h3 class="panel-title" style="font-size: 20px;">User Manager</h3>
                    <?php
                        if($_SESSION['role']==1||$_SESSION['role']==0){
                            echo "<button type="."button"." class="."'btn btn-danger'"." onClick="."window.open('admin_user_add.php','_self')".">Thêm tài khoản</button>";
                        }
                    ?>
                    
                    <button type="button" class="btn btn-default" onclick="sortUser(1)">Sắp xếp giảm dần</button>

                    <button type="button" class="btn btn-default" onclick="sortUser1(1)">Sắp xếp tăng dần</button>
                    
                    <div class="input-group">
                        <input type="text" class="form-control" id="usr" placeholder="Search by Username" style="width: 200px;">
                        <div class="input-group-btn">
                        <button class="btn btn-default" type="button" onclick="showUser()">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                        </div>
                    </div>
              </div>
              <div class="panel-body">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>Fullname</th>
                                <th>Address</th>
                                <th>Phone</th>
                                <th>Birthday</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody id="user-container" class="user-container">
                            <?php
                                $sql = 'select * from user limit 0,8';
                                $ListUser = executeResult($sql);
                                foreach($ListUser as $User){
                                    echo '<tr>';
                                    echo '<td>'.$User['Username'].'</td>';
                                    echo '<td>'.$User['Password'].'</td>';
                                    echo '<td>'.$User['Email'].'</td>';
                                    echo '<td>'.$User['Fullname'].'</td>';
                                    echo '<td>'.$User['Address'].'</td>';
                                    echo '<td>'.$User['Phone'].'</td>';
                                    echo '<td>'.$User['Birthday'].'</td>';
                                    echo '<td>'.$User['Role'].'</td>';
                                    echo '<td>'.$User['Status'].'</td>';
                                    echo '<td>';
                                    if($_SESSION['role']==1){
                                    echo '<button type="button" class="btn btn-info" onClick=\'window.open("admin_user_add.php?id='.$User['ID'].'","_self")\'>Sửa</button>';
                                    echo '<button type="button" class="btn btn-warning" onClick="lockUser('.$User['ID'].')">Khóa</button>';
                                    
                                    echo '<button type="button" class="btn btn-danger" onClick="deleteUser('.$User['ID'].');">Xóa</button>';
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
                        $sql = 'select count(ID) as number from user';
                        $ListUser = executeResult($sql);
                        $number = 0;
                        if($ListUser!=null & count($ListUser)>0){
                            $number = $ListUser[0]['number'];
                        }
                        $pages = ceil($number/8);
                        for($i=1;$i<=$pages;$i++){
                            echo '<li onClick="paginationUser('.$i.')"><a>'.$i.'</a></li>';
                        }
                    ?>
                </ul>
              </div>
        </div>
      </div>
    </div>