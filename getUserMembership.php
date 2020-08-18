<?php
include '_includes/sessions.php';

include '_includes/connek.php';
$id = $_POST['cost_id'];
$view_query = mysqli_query($conn, "SELECT * FROM tbl_account WHERE acc_id=$id");
while ($row = mysqli_fetch_assoc($view_query)) {

	$acc_membership = $row["acc_membership"];  
 
	echo 	$acc_membership;
}


?>