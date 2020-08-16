<?php session_start();
date_default_timezone_set('Asia/Manila');
if(!isset($_SESSION['acc_name'])){
  header('location:../index.php');
}else{
  error_reporting(0);
  ini_set('display_errors', 0);


    $acc_name = $_SESSION['acc_name'];

    $acc_password = $_SESSION['acc_password'];

    $acc_access = $_SESSION['acc_access']; // For App/System Administrator

    $acc_membership = $_SESSION['acc_membership']; // for Customers use only

    $acc_id = $_SESSION['acc_id'];

    // FOR STORE use only
    $gold = $_SESSION['gold'];

    $platinum = $_SESSION['platinum'];

    $diamond = $_SESSION['diamond'];

}
?>