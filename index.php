<?php 

include '_includes/connek.php';
if (isset($_POST['submit'])) {
  $uname = $_POST['uname'];
  $pword = $_POST['pword'];

  $CheckIfExist = mysqli_query($conn,"SELECT * FROM tbl_account WHERE acc_name = '$uname' AND acc_password = '$pword' ");
  if (mysqli_num_rows($CheckIfExist)>0) {
    session_start();
    $row = mysqli_fetch_array($CheckIfExist);
    $acc_name = $row['acc_name'];
    $_SESSION['acc_name'] = $acc_name ;
    $acc_name = $_SESSION['acc_name'];

    $acc_password = $row['acc_password'];
    $_SESSION['acc_password'] = $acc_password ;
    $acc_password = $_SESSION['acc_password'];

    $acc_membership = $row['acc_membership'];
    $_SESSION['acc_membership'] = $acc_membership ;
    $acc_membership = $_SESSION['acc_membership'];

    $gold = $row['gold'];
    $_SESSION['gold'] = $gold ;
    $gold = $_SESSION['gold'];

    $platinum = $row['platinum'];
    $_SESSION['platinum'] = $platinum ;
    $platinum = $_SESSION['platinum'];

    $diamond = $row['diamond'];
    $_SESSION['diamond'] = $diamond ;
    $diamond = $_SESSION['diamond'];

    $acc_id = $row['acc_id'];
    $_SESSION['acc_id'] = $acc_id ;
    $acc_id = $_SESSION['acc_id'];

    $acc_access = $row['acc_access'];
    $_SESSION['acc_access'] = $acc_access ;
    $acc_access = $_SESSION['acc_access'];

    if ($acc_access == 2) {
         echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href='Products.php';
      </SCRIPT>");
    }

     if ($acc_access == 3) {
         echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href='Customer.php';
      </SCRIPT>");
    }

      if ($acc_access == 1) {
         echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.location.href='Customer.php';
      </SCRIPT>");
    }

 
  }else{
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Wrong username or password!');
      </SCRIPT>");
  }
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Deals-Discounts | Log in</title>
  <link rel="shortcut icon" type="image/png" href="images/EI.png">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a ><b>Deals</b> and <b>Discounts</b></a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p align="center" ><img src="images/EI.png" style="width: 30%; height: 30%;" class="img-circle img-fluid"></p>
        <p class="login-box-msg">Sign in to start your session</p>

        <form  method="POST">
          <div class="input-group mb-3">
            <input type="text" name="uname"class="form-control" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="pword"class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>

      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

</body>
</html>
