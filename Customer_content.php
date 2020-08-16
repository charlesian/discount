<?php 
error_reporting(0);
ini_set('display_errors', 0);
include '_includes/functions.php';

$date_now = date('Y-m-d');
$date_time= date('Y-m-d H:i');

if (isset($_POST['add_product'])) {

	for($count = 0; $count < count($_POST["item"]); $count++){
		$item = $_POST['item'][$count];
		$amount = $_POST['amount'][$count];

	$insert = mysqli_query($conn,"INSERT INTO tbl_products(store_id,item,amount,date_added) VALUES($acc_id,'$item','$amount','$date_time')");
}


	if ($insert) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Message : Item Added!');
			window.location.href='Products.php';
			</SCRIPT>");
	}
}

if (isset($_POST['update_product'])) {
	$item_update = $_POST['item_update'];
	$amount_update = $_POST['amount_update'];
	$product_id = $_POST['product_id'];


	$update = mysqli_query($conn,"UPDATE tbl_products SET item = '$item_update', amount = '$amount_update' WHERE product_id = $product_id ");

	if ($update) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Message : Item Updated!');
			window.location.href='Products.php';
			</SCRIPT>");
	}
}

if (isset($_POST['update_membership'])) {
	$gold = $_POST['gold'];
	$platinum = $_POST['platinum'];
	$diamond = $_POST['diamond'];


	$update = mysqli_query($conn,"UPDATE tbl_account SET gold = '$gold', platinum = '$platinum' , diamond = '$diamond' WHERE acc_id = $acc_id ");

	if ($update) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Message : Membership Discounts Updated!');
			window.location.href='Products.php?tab=1';
			</SCRIPT>");
	}
}



?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>


<!-- /.col -->
<div class="col-md-12">
	<div class="card">
		<div class="card-header p-2">
			<ul class="nav nav-pills">
				<?php $define_tab = $_GET['tab'];?>	
				<?php if ($define_tab == 1): ?>
					<li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Dashboard</a></li>
				<li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Set Membership Discounts</a></li>
					<?php else: ?>	
					<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Dashboard</a></li>
				<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Set Membership Discounts</a></li>
				<?php endif ?>
				
			</ul>
		</div><!-- /.card-header -->
		<div class="card-body">
			<div class="tab-content">
				<?php if ($define_tab == 1 ): ?>
				<div class=" tab-pane" id="activity">
					<?php else: ?>	
				<div class="active tab-pane" id="activity">

				<?php endif ?>
					<!-- Post -->
					<section class="content">
						<div class="container-fluid">
							<div class="">
								<form method="POST">
									<div class="card">
										<!-- /.card-header -->
										<div class="card-body">
											<a class="btn btn-success float-right" onclick="Export()" id="btnExport" value="Export"  name="export" style="color:white"><i class="fa fa-fw fa-download"></i>Export</a>
										</form>
										<table id="example1" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th width="110">Date</th>
													<th width="">Store Name</th>
													<th width="100">Total Amount</th>
													<th width="100">Discount</th>
												</tr>
											</thead>
											<?php 
											$view_query = mysqli_query($conn, "SELECT ts.acc_name as store_name,ts.pr_total as total_avail,ts.pr_discount as total_discount,ts.pr_no,ts.date FROM tbl_sales_total ts LEFT JOIN tbl_accont ta on ta.acc_id = ts.store_id  WHERE ts.customer_id = $acc_id ");
											while ($row = mysqli_fetch_assoc($view_query)) {
												$store_name = $row["store_name"];
												$total_avail = $row["total_avail"];  
												$total_discount = $row["total_discount"];  
												$pr_no = $row["pr_no"];  
												$date = $row["date"];  
												?>
												<tr>
													<td>
														<?php echo strtotime('F d Y h:i A',$date);?>
													</td>
													<td>
														<a href=".php?pr_no=<?php echo $pr_no?>&date=<?php echo $date?>&total_avail=<?php echo $total_avail?>&total_discount=<?php echo $total_discount?>"><strong><?php echo ucwords($store_name);?></strong></a>
													</td>
													<td>
														<strong><?php echo '$'.number_format($total_avail,2);?></strong>
													</td>
													<td>
														<strong><?php echo '$'.number_format($total_discount,2);?></strong>
													</td>
												</tr>


												<div class="modal fade" id="modal-info_<?php echo $row['id']; ?>">
													<div class="modal-dialog">
														<div class="modal-content bg-primary">
															<div class="modal-header">
																<h4 class="modal-title">Update Product</h4>
																<button type="button" class="close" data-dismiss="modal" aria-label="Close">
																	<span aria-hidden="true">&times;</span></button>
																</div>
																<form method="POST">
																	<div class="modal-body">
																		<label>Product Name</label>
																		<input  class="form-control"type="text" name="item_update" value="<?php echo $item?>">
																		<label>Product Amount</label>
																		<input  class="form-control"type="number" name="amount_update" value="<?php echo $amount; ?>"><br>  
																		<input hidden class="form-control"type="text" name="product_id" value="<?php echo $product_id; ?>"><br>  
																	</div>
																	<div class="modal-footer justify-content-between">
																		<button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
																		<button type="submit" name ="update_product" class="btn btn-outline-light"><i class="fa fa-fw fa-save"></i>Save changes</button>
																	</div>
																</form>
															</div>
															<!-- /.modal-content -->
														</div>
														<!-- /.modal-dialog -->
													</div>

													<!-- /.modal -->
												<?php } ?>
											</table>
										</div>
										<!-- /.card-body -->
									</div>
									<!-- /.row -->
								</div><!-- /.container-fluid -->

								</section>
								<!-- /.post -->
							</div>
							<!-- /.tab-pane -->
							<?php if ($define_tab == 1): ?>
							<div class="active tab-pane" id="timeline">
								<?php else: ?>	
							<div class="tab-pane" id="timeline">

							<?php endif ?>
								<!-- The timeline -->

								<div style="padding-right: 15px;">
									<div style="padding-left: 10px;">
									</div>
									<form method="POST">
										<div style="padding-right: 15px;">
											<div style="padding-left: 10px;">
											</div>
											<button class="btn  btn-success float-right" type="submit" name="update_membership" ><i class="fa fa-fw fa-save"></i>Save</button>
										</div>
										<br><br>
										<div class="card card-info">
											<div class="card-header">
												<h3 class="card-title">Membership Discount Settings</h3>
											</div>
											<div class="card-body">
<?php 
$selectMembership = mysqli_query($conn,"SELECT gold,platinum,diamond FROM tbl_account WHERE acc_id = $acc_id");
$rowMember = mysqli_fetch_array($selectMembership);
$gold = $rowMember['gold'];
$platinum = $rowMember['platinum'];
$diamond = $rowMember['diamond'];

 ?>												
												<!-- Color Picker -->
												<div class="form-group">
													<label>Gold Membership</label>
													<input type="number" class="form-control" name="gold"  value="<?php echo $gold ?>" >
												</div>
												<div class="form-group">
													<label>Platinum Membership</label>
													<input type="number" class="form-control" name="platinum" value="<?php echo $platinum ?>" >
												</div>
												<div class="form-group">
													<label>Diamond Membership</label>
													<input type="number" class="form-control" name="diamond"  value="<?php echo $diamond ?>">
												</div>
												<!-- /.form group -->
											</div>
											<!-- /.card-body -->
										</div>
										<!-- /.content -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


<script>
		$(document).ready(function() {
			var max_fields = 10;
			var wrapper = $(".container1");
			var add_button = $(".add_form_field");

			var x = 1;
			$(add_button).click(function(e) {
				e.preventDefault();
				if (x < max_fields) {
					x++;
            $(wrapper).append('<br><div><a href="#" class="delete btn btn-danger btn-xs">Delete</a><div class="row"><div class="col-md-6"><label>Product Name</label><input  class="form-control"type="text" name="item[]" ></div><br> <div class="col-md-6"><label>Product Amount</label><input  class="form-control"type="number" name="amount[]" ></div><br></div>'); //add input box
        } else {
        	alert('You Reached the limits')
        }
    });

			$(wrapper).on("click", ".delete", function(e) {
				e.preventDefault();
				$(this).parent('div').remove();
				x--;
			})
		});
	</script>