<?php
session_start();

$C_ID=$_GET['C_ID'];

require_once('../includes/config.php');


mysqli_query($dbConn,"delete from customers where customer_id='$C_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('Customer Has Been Deleted !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Customers_List.php';
        </script>";

?>