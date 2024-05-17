<?php
session_start();
ob_start();
$path = dirname(getcwd(), 2) . '\database' . '\dbhelper.php';
require_once $path;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="..\js\user.js"></script>
  <script src="..\js\product.js"></script>
  <script src="..\js\chart.js"></script>
  <script src="..\js\bill.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
    .row.content {
      height: 1500px
    }

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }

      .row.content {
        height: auto;
      }
    }
  </style>
</head>

<body>

  <div class="container-fluid">
    <div class="row content">
      <?php
      if (isset($_SESSION['role']) && ($_SESSION['role'] == 1 || $_SESSION['role'] == 2 || $_SESSION['role'] == 0)) {
        include_once '../includes/admin_nav.php';

        if (isset($_GET['act'])) {
          switch ($_GET['act']) {
            case 'usermanager':
              include_once '../includes/admin_user.php';
              break;
            case 'productmanager':
              include_once '../includes/admin_product.php';
              break;
            case 'billmanager':
              include_once '../includes/admin_bill.php';
              break;
            case 'statis':
              include_once '../includes/admin_statis.php';
              break;
            case 'trangchu':
              header('location: ../../html_frontend\templates\trangchu.php');
              break;
            case 'logout':
              unset($_SESSION['role']);
              header('location: ../../html_frontend\templates\login.php');
              break;

            default:
              include_once '../includes/admin_home.php';
              break;
          }
        } else {
          include_once '../includes/admin_home.php';
        }
      } else {
        header('location: ../../html_frontend\templates\login.php');
      }

      ?>
    </div>
  </div>

  <footer class="container-fluid">
    <p>Footer Text</p>
  </footer>

</body>

</html>