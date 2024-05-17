
    <div class="col-sm-2 sidenav">
    <h4>Admin</h4>
    <ul class="nav nav-pills nav-stacked">
      <li><a href="admin.php">Home</a></li>
      <li><a href="admin.php?act=usermanager">User Manager</a></li>
      <?php
        if($_SESSION['role']==1||$_SESSION['role']==2){
          echo '<li><a href="admin.php?act=productmanager">Product Manager</a></li>
          <li><a href="admin.php?act=billmanager">Bill Manager</a></li>
          <li><a href="admin.php?act=statis">Statis</a></li>';
        }
      ?>
      
      <li><a href="admin.php?act=trangchu">Trang chủ</a></li>
      <li><a href="admin.php?act=logout">Logout</a></li>
    </ul><br>
    <div class="input-group">
      <input type="text" class="form-control" placeholder="Search ..">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button">
          <span class="glyphicon glyphicon-search"></span>
        </button>
      </span>
    </div>
  </div>
