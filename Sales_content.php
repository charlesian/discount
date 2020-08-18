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
				<li class="nav-item"><a class="nav-link " href="#activity" data-toggle="tab">Products</a></li>
				<li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Set Membership
						Discounts</a></li>
				<?php else: ?>
				<li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Products</a></li>
				<li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Set Membership Discounts</a>
				</li>
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

								<div class="box-body">


									<div class="well">
										<div class="row">
											<div class="col-md-6">
												<label>Select Product</label>

												<style>



												</style>
												<div class="row">
													<div class="col-sm-8">
														<select class="form-control products select-product">
															<option value="">--Please choose product--</option>
															<?php 
$view_query = mysqli_query($conn, "SELECT * FROM tbl_products WHERE store_id = $acc_id ");
while ($row = mysqli_fetch_assoc($view_query)) {
	$product_id = $row["product_id"];
	$item = $row["item"];  
	$amount = $row["amount"];  
	echo "<option value='".$product_id."' >".$item."</option>";
}



?>
														</select>
													</div>
													<div class="col-sm-2">
														<input class="form-control  qty" placeholder="Quantity">
													</div>
													<div class="col-sm-2">
														<input class="btn btn-success add-prod" value="Add">
													</div>
												</div>
											</div>
											<br>

											<br>
										</div>
										<br>
										<div>

											<table class="table productsale">
												<thead>
													<tr>
														<th>Product Name</th>
														<th>Qty</th>
														<th>Amount</th>
														<th></th>
													</tr>
												</thead>
												<tbody></tbody>
											</table>
											<table class="table">
												<thead>
													<tr>
														<th>
															<h4>Total</h4>
														</th>
														<th style="width:30%"></th>
														<th>
															<h4><span class="total">0</span></h4>
														</th>
													</tr>
												</thead>

											</table>


											<div class="row">
												<div class="col-sm-12">
													<select class="form-control select-customer">
														<option value="">--Please choose Customer</option>
														<?php 
$view_query = mysqli_query($conn, "SELECT * FROM tbl_account WHERE acc_access=3");
while ($row = mysqli_fetch_assoc($view_query)) {
	$acc_id = $row["acc_id"]; 
	$acc_name = $row["acc_name"];  
 
	echo "<option value='".$acc_id."' >".$acc_name."</option>";
}



?>
													</select>
													<br>
													<p> Account : <span class="accountname"></span> </p>
													<p> Membership: <span class="membership" style="text-transform:capitalize"></span></p>
													<p> Discount : <span class="discount"></span> </p>
													<div style="background-color:#ffc107;padding:10px">
													<h3 style="">Final Total : <span class="topay"></span> <button style="float:right" class="btn btn-success finalize">Finalize</button></h3>
													</div>
												</div>
											</div>



										</div>



									</div>
								</div>
								<div class="modal-footer justify-content-between">
									<button type="submit" id="<?php echo $id;?>" name="add_product"
										class="btn btn-outline-light"><i class="fa fa-fw fa-save"></i>Add
										Product</button>
								</div>


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
										<button class="btn  btn-success float-right" type="submit"
											name="update_membership"><i class="fa fa-fw fa-save"></i>Save</button>
									</div>
									<br><br>
									<div class="card card-info">
										<div class="card-header">
											<h3 class="card-title">Membership Settings</h3>
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
												<input type="number" class="form-control" name="gold"
													value="<?php echo $gold ?>">
											</div>
											<div class="form-group">
												<label>Platinum Membership</label>
												<input type="number" class="form-control" name="platinum"
													value="<?php echo $platinum ?>">
											</div>
											<div class="form-group">
												<label>Diamond Membership</label>
												<input type="number" class="form-control" name="diamond"
													value="<?php echo $diamond ?>">
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
			$(document).ready(function () {


				$(".finalize").on("click", function () {
				var TableData = new Array();
					
				$('.productsale tr').each(function(row, tr){
					TableData[row]={
						"productid" : $(tr).find('td:eq(0)').text()
						, "productname" :$(tr).find('td:eq(1)').text()
						, "qty" : $(tr).find('td:eq(2) input').val()
						, "amount" : $(tr).find('td:eq(3)').text()
					}
				}); 
				TableData.shift();

				var membership= $(".membership").text();
				var topay= $(".topay").text();
				var userid = $(".select-customer").val();
				var discount=	$(".discount").text();
				var total=	$(".total").text();
					$.ajax({
						type: 'POST',
						url: "savesaledata.php",
						data: {
							"TableData": JSON.stringify(TableData),
							"userid": userid,
							"membership": membership,
							"discount": discount,
							"topay": topay,
							"total": total
						},
						success: function (result) {
				alert(result)


						}
					});

				});
				$(".select-customer").on("change", function () {
					var id = $(this).val();
					var customer = $(".select-customer option:selected").html();
					$.ajax({
						type: 'POST',
						url: "getUserMembership.php",
						data: {
							"cost_id": id
						},
						success: function (result) {
							$(".accountname").text(customer);
							$(".membership").text(result);
						$.ajax({
						type: 'POST',
						url: "getDiscount.php",
						data: {
							"membership": result
						},
						success: function (results) {
							$(".discount").text(results+"%");
							var totals = $(".total").text();
							var final = parseFloat(totals)*parseFloat("0."+results);
							var final = parseFloat(totals)-parseFloat(final);
							$(".topay").text(final);
						}
						
					});
						
						


						}
					});
				});

				$(".add-prod").on("click", function () {
					var id = $(".select-product").val();
					var qty = $(".qty").val();
					var product = $(".select-product option:selected").html();

					if ($('.productsale td:contains(' + product + ')').length) {
						alert("Product Already Exists!");
					} else {



						var totals = $(".total").text();
						if (qty != "") {
							$.ajax({
								type: 'POST',
								url: "getProduct.php",
								data: {
									"prod_id": id
								},
								success: function (result) {

									var total = parseInt(qty) * parseInt(result);
				
									$(".productsale tbody").append("<tr><td style='display:none'>"+id+"</td><td>" + product +
										"</td><td><input class='ind-qty' mainid='"+id+"' value='" + qty +
										"' id='" + result + "' info='" + total + "'></td><td id='price-"+id+"'>" +
										result +
										"</td><td id='amount-"+id+"' class='dataamount'>" + 
										result*qty +
										"</td><td style='color:red;cursor:pointer' class='remove' info='" +
										total + "'>X</td></tr>");


									var total = parseInt(total) + parseInt(totals)
									$(".total").text(total);

									$('.remove').on('click', function () {
										$(this).closest('tr').remove();
										var dataamount = Array();
  $('.dataamount').each(function(){

    
  dataamount.push(parseFloat($(this).text()));
})

$('.total').text(dataamount.reduce((a, b) => a + b, 0));
									});


				$(".ind-qty").change("live", function () {

var value = $(this).val();

var mainid = $(this).attr("mainid");
var price = $("#price-"+mainid).text();


var amount = parseFloat(price)*parseFloat(value);
console.log(amount);
if (value != "" && value != "0") {
  

    $("#amount-"+mainid).text(amount);
var dataamount = Array();
  $('.dataamount').each(function(){

    
  dataamount.push(parseFloat($(this).text()));
})

$('.total').text(dataamount.reduce((a, b) => a + b, 0));

    
} else {
    alert("Please enter a valid quantity");
    $(this).val(value);
}



});

									$('.remove').on('click', function () {
										$(this).closest('tr').remove();
										var dataamount = Array();
  $('.dataamount').each(function(){

    
  dataamount.push(parseFloat($(this).text()));
})

$('.total').text(dataamount.reduce((a, b) => a + b, 0));
									});








								}
							});

							$(".qty").val("");
						} else {

							alert("Please enter product quantity!");
						}

					}


				})






				var max_fields = 10;
				var wrapper = $(".container1");
				var add_button = $(".add_form_field");

				var x = 1;
				$(add_button).click(function (e) {
					e.preventDefault();
					if (x < max_fields) {
						x++;
						$(wrapper).append(
							'<br><div><a href="#" class="delete btn btn-danger btn-xs">Delete</a><div class="row"><div class="col-md-6"><label>Product Name</label><input  class="form-control"type="text" name="item[]" ></div><br> <div class="col-md-6"><label>Product Amount</label><input  class="form-control"type="number" name="amount[]" ></div><br></div>'
							); //add input box
					} else {
						alert('You Reached the limits')
					}
				});

				$(wrapper).on("click", ".delete", function (e) {
					e.preventDefault();
					$(this).parent('div').remove();
					x--;
				})
			});
		</script>