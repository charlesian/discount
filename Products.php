<?php include '_includes/sessions.php';
$menu =1;?>
<!DOCTYPE html>
<html>
<head>
  <title>Deals And Discounts | home</title>
  <!-- header -->
  <?php include '_includes/header.php' ?>
</head>
<!-- <body class="hold-transition sidebar-mini"> -->
  <body class="sidebar-mini sidebar-closed text-sm " style="height: auto;">
    <div class="wrapper">
      <!-- sidebar -->
      <?php include '_includes/sidebar.php'; ?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?php echo  ucfirst($acc_name) ?> Product Lists</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item active">Home</li>
                  <li class="breadcrumb-item active">Product Table</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <?php require_once('Products_content.php') ?>
      </div>
      <!-- /.content-wrapper -->

      <!-- footer -->
      <?php include '_includes/footer.php' ?>

      <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
            aLengthMenu: [ [200, 500, 1000, -1], [200, 500, 1000, "All"] ]
          });
          
        });
      </script>
    <script src="table2excel.js" type="text/javascript"></script>
    <script type="text/javascript">
        function Export() {
            $("#example1").table2excel({
                filename: "Products.xls"
            });
        }
    </script>
</body>
</html>