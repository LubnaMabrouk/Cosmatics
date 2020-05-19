<?php


session_start();

$C_ID=$_POST['C_ID'];
$pro_id=$_POST['pro_id'];
$pro_price=$_POST['pro_price'];
$quantity=$_POST['quantity'];
$pro_quantity=$_POST['pro_quantity'];





require_once('../includes/config.php');


$sql123 = mysqli_query($dbConn,"select * from orders where customer_id='$C_ID' AND order_status='Pending'");
if (mysqli_num_rows($sql123)>0){
	
	
		$row123 = mysqli_fetch_array($sql123);
		$order_id = $row123['order_id'];
		$order_number = $row123['order_number'];
		$total_price = $row123['total_price'];
		
		

$sql444 = mysqli_query($dbConn,"select * from order_details where order_number='$order_number' AND product_id='$pro_id'");
if (mysqli_num_rows($sql444)>0){
	
		$row444 = mysqli_fetch_array($sql444);
		$sub_quantity = $row444['quantity'];
		$sub_total_price = $row444['total_price'];
		$New_QNT = $sub_quantity + $quantity;
		$New_Total_Price = $sub_total_price + ($pro_price*$quantity);
	
	mysqli_query($dbConn,"update order_details set quantity='$New_QNT', total_price='$New_Total_Price' where order_number='$order_number' AND product_id='$pro_id'");		
	
		$New_Total_Amount = $total_price + ($pro_price*$quantity);

mysqli_query($dbConn,"update orders set total_price='$New_Total_Amount' where order_number='$order_number'");



$new_pro_quantity = $pro_quantity - $quantity;

mysqli_query($dbConn,"update products set product_quantity='$new_pro_quantity' where product_id='$pro_id'");





}else{ 
	
	
	$sub_total_price = $pro_price*$quantity;
	
	mysqli_query($dbConn,"insert into order_details (order_number,order_id,product_id,quantity,price,total_price)
values ('$order_number','$order_id','$pro_id','$quantity','$pro_price','$sub_total_price')");	
	
	$New_Total_Amount = $total_price + ($pro_price*$quantity);

mysqli_query($dbConn,"update orders set total_price='$New_Total_Amount' where order_number='$order_number'");	
	
	
	
	
	$new_pro_quantity = $pro_quantity - $quantity;

mysqli_query($dbConn,"update products set product_quantity='$new_pro_quantity' where product_id='$pro_id'");




}
	
		
		

	
}else{
	
	
	
	
	
	
	
	
	
$sql = mysqli_query($dbConn,"select * from orders order by order_id DESC");
if (mysqli_num_rows($sql)>0){
	
	$row = mysqli_fetch_array($sql);
	$order_number = $row['order_number'] + 1;
	$order_id = $row['order_id'] + 1;
	
			$sub_total_price = $pro_price*$quantity;

	
	
	mysqli_query($dbConn,"insert into orders (order_number,total_price,order_status,customer_id)
values ('$order_number','$sub_total_price','Pending','$C_ID')");







	mysqli_query($dbConn,"insert into order_details (order_number,order_id,product_id,quantity,price,total_price)
values ('$order_number','$order_id','$pro_id','$quantity','$pro_price','$sub_total_price')");


$new_pro_quantity = $pro_quantity - $quantity;

mysqli_query($dbConn,"update products set product_quantity='$new_pro_quantity' where product_id='$pro_id'");




	
	
}else{
	
		$order_number = 1;
		
					$sub_total_price = $pro_price*$quantity;

mysqli_query($dbConn,"insert into orders (order_number,total_price,order_status,customer_id)
values ('$order_number','$sub_total_price','Pending','$C_ID')");
	


$sql555 = mysqli_query($dbConn,"select * from orders where order_number='$order_number'");
$row555 = mysqli_fetch_array($sql555);
$order_id = $row555['order_id'];


		

	
		mysqli_query($dbConn,"insert into order_details (order_number,order_id,product_id,quantity,price,total_price)
values ('$order_number','$order_id','$pro_id','$quantity','$pro_price','$sub_total_price')");

	
	
	$new_pro_quantity = $pro_quantity - $quantity;

mysqli_query($dbConn,"update products set product_quantity='$new_pro_quantity' where product_id='$pro_id'");



}	
	






}











	  

	echo "<script language='JavaScript'>
document.location='Cart.php';
        </script>";


?>