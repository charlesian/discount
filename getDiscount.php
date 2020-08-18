<?php
include '_includes/sessions.php';

include '_includes/connek.php';
$membership = $_POST['membership'];

$view_query = mysqli_query($conn, "SELECT * FROM tbl_account WHERE acc_id = $acc_id ");
while ($row = mysqli_fetch_assoc($view_query)) {
	$membership = $row[$membership];  
	echo $membership;
}




?>