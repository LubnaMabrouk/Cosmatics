<?php
session_start();

$P_ID=$_GET['P_ID'];

require_once('../includes/config.php');


mysqli_query($dbConn,"delete from products where product_id='$P_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('Product Has Been Deleted !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Products_List.php';
        </script>";

?>