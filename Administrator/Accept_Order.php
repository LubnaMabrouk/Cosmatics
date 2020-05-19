<?php
session_start();

$O_ID=$_GET['O_ID'];

require_once('../includes/config.php');


mysqli_query($dbConn,"update orders set order_status='Accepted' where order_id='$O_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('Order Status Has Been Updated !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Orders_List.php';
        </script>";

?>