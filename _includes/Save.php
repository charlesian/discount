<?php 

if (isset($_POST['update_name'])) {
	$uname = $_POST['uname'];
	$pword = $_POST['pword'];
	$id = $_POST['id'];
	$Update = mysqli_query($conn,"UPDATE tbl_account SET acc_name = '$uname', acc_password = '$pword' WHERE acc_id = $id");

	if ($Update) {
		echo ("<SCRIPT LANGUAGE='JavaScript'>
			window.alert('Message : Successfuly Updated!');
			window.location.href='View.php';
			</SCRIPT>");
	}
}


?>