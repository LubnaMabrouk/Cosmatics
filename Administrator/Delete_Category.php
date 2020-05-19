<?php
session_start();

$C_ID=$_GET['C_ID'];

require_once('../includes/config.php');


mysqli_query($dbConn,"delete from categories where category_id='$C_ID'");

	  
echo "<script language='JavaScript'>
			  alert ('Category Has Been Deleted !');
      </script>";
	  

	echo "<script language='JavaScript'>
document.location='View_Categories_List.php';
        </script>";

?>