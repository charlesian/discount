<?php 

include '_includes/sessions.php';

include '_includes/connek.php';


if (isset($_POST['TableData'])) {
    $tabledata = $_POST['TableData'];
    $discount = $_POST['discount'];
    $tabledata = mysqli_real_escape_string($conn,$tabledata);
    $discount = mysqli_real_escape_string($conn,$discount);
    $userid = $_POST['userid'];
	$membership = $_POST['membership'];
    $topay = $_POST['topay'];
    $total = $_POST['total'];



$sql = "INSERT tbl_sales (store_id,customer_id,items,total,total_discount,membership,finaltotal) VALUES ( $acc_id,$userid,\"$tabledata\",$total,\"$discount\",\"$membership\",$topay)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



      

	
}


// $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";

// if ($conn->query($sql) === TRUE) {
//   echo "Record updated successfully";
// } else {
//   echo "Error updating record: " . $conn->error;
// }



?>