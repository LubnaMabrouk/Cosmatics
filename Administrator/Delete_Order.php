<?php
session_start();

$O_ID=$_GET['O_ID'];

require_once('../includes/config.php');

mysqli_query($dbConn,"delete from order_details where order_id='$O_ID'");

mysqli_query($dbConn,"delete from orders where order_id='$O_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('Order Has Been Deleted !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Orders_List.php';
        </script>";

?>