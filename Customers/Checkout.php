<?php

session_start();

require_once('../includes/config.php');


$order_number = $_GET['order_number'];



mysqli_query($dbConn,"update orders set order_status='Finish' where order_number='$order_number'");


	 
echo "<script language='JavaScript'>
			  alert ('Your Order Has Been Sent !');
      </script>";

	echo "<script language='JavaScript'>
document.location='index.php';
        </script>";


	



?>