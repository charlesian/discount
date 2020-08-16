<?php
include '_includes/connek.php';

$product_id = $_GET['product_id'];

$delete = mysqli_query($conn,"DELETE FROM tbl_products WHERE product_id = $product_id");

if ($delete) {
	echo ("<SCRIPT LANGUAGE='JavaScript'>
				window.alert('Message : Item Deleted!');
				window.location.href='Products.php';
				</SCRIPT>");
}

?>