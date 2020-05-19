<?php
session_start();

include("../includes/config.php"); 


$C_ID = $_SESSION['C_Log'];


if (!$_SESSION['C_Log'])
echo '<script language="JavaScript">
 document.location="../Signin_Singup.php";
</script>';






$total_price=$_GET['total_price'];
$sub_total_price=$_GET['sub_total_price'];
$order_number=$_GET['order_number'];
$sub_quantity=$_GET['sub_quantity'];
$pro_quantity=$_GET['pro_quantity'];
$sub_order_id=$_GET['sub_order_id'];
$pro_id=$_GET['pro_id'];







$P = $total_price - $sub_total_price;
$C = $pro_quantity + $sub_quantity;

mysqli_query($dbConn,"delete from order_details where order_details_id='$sub_order_id'");
mysqli_query($dbConn,"update orders set total_price='$P' where order_number='$order_number'");
mysqli_query($dbConn,"update products set product_quantity='$C' where product_id='$pro_id'");

	  

	  

	echo "<script language='JavaScript'>
document.location='Cart.php';
        </script>";

?>