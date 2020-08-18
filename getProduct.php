<?php
include '_includes/sessions.php';

include '_includes/connek.php';
$id = $_POST['prod_id'];

$view_query = mysqli_query($conn, "SELECT * FROM tbl_products WHERE store_id = $acc_id AND product_id = $id ");
while ($row = mysqli_fetch_assoc($view_query)) {
	$amount = $row["amount"];  
	echo $amount;
}




?>