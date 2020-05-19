<?php
session_start();

include("../includes/config.php"); 


$C_ID = $_SESSION['C_Log'];


if (!$_SESSION['C_Log'])
echo '<script language="JavaScript">
 document.location="../Signin_Singup.php";
</script>';







$sql4 = mysqli_query($dbConn,"select * from orders where customer_id='$C_ID' AND order_status='Pending'");
$row4 = mysqli_fetch_array($sql4);
$order_number=$row4['order_number'];
$total_price=$row4['total_price'];

$sql5 = mysqli_query($dbConn,"select * from order_details where order_number='$order_number'");
$row5 = mysqli_num_rows($sql5);








$sql654 = mysqli_query($dbConn,"select * from orders where order_number='$order_number' AND order_status='Pending'");
if (mysqli_num_rows($sql654)<1){
	
	
	
	echo '<script language="JavaScript">
 document.location="index.php";
</script>';	
	
	
	
	
	
}









if(isset($_POST['Submit']))
{


$sub_order_id = $_POST['sub_order_id'];
$pro_id = $_POST['pro_id'];
$pro_quantity = $_POST['pro_quantity'];
$sub_price = $_POST['sub_price'];
$sub_quantity = $_POST['sub_quantity'];
$new_quantity = $_POST['new_quantity'];
$order_number = $_POST['order_number'];
$sub_total_price = $_POST['sub_total_price'];
$total_price = $_POST['total_price'];



$new_total_price = $total_price - $sub_total_price;


$pro_quantity = $pro_quantity + $sub_quantity;


$pro_quantity = $pro_quantity - $new_quantity;

$sub_quantity = $new_quantity;

$sub_total_price = $sub_price * $sub_quantity;

mysqli_query($dbConn,"update products set product_quantity='$pro_quantity' where product_id='$pro_id'");


mysqli_query($dbConn,"update order_details set quantity='$sub_quantity', total_price='$sub_total_price' where order_details_id='$sub_order_id'");		


$new_total_price_2 = $new_total_price + $sub_total_price;



mysqli_query($dbConn,"update orders set total_price='$new_total_price_2' where order_number='$order_number'");		



echo '<script language="JavaScript">
 document.location="Cart.php";
</script>';	


}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="../images/icons/favicon.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/themify/themify-icons.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../fonts/elegant-font/html-css/style.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/slick/slick.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../vendor/lightbox2/css/lightbox.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../css/util.css">
	<link rel="stylesheet" type="text/css" href="../css/main.css">
<!--===============================================================================================-->
</head>
<body class="animsition">

	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<a href="#" class="topbar-social-item fa fa-facebook"></a>
					<a href="#" class="topbar-social-item fa fa-instagram"></a>
				</div>

				<span class="topbar-child1">
					Free shipping for standard order over $100
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						info@shop.com
					</span>

					
				</div>
			</div>

			<div class="wrap_header">
				<!-- Logo -->
				<a href="index.php" class="logo">
					<img src="../images/icons/logo.png" alt="IMG-LOGO">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
						<li>
								<a href="index.php">Home</a>
							</li>
							

							
							
							
							<li>
								<a href="Shop.php">Shop</a>
							</li>
							
							

						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<a href="My_Account.php" class="header-wrapicon1 dis-block">
						<img src="../images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>
					
					| 
					
					<a href="Logout.php" class="header-wrapicon1 dis-block">
					Logout		
					</a>


					
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="index.php" class="logo-mobile">
				<img src="../images/icons/logo.png" alt="IMG-LOGO">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<a href="My_Account.php" class="header-wrapicon1 dis-block">
						<img src="../images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
					</a>


					
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							Free shipping for standard order over $100
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								info@shop.com
							</span>

							
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10">
						<div class="topbar-social-mobile">
							<a href="#" class="topbar-social-item fa fa-facebook"></a>
							<a href="#" class="topbar-social-item fa fa-instagram"></a>
						</div>
					</li>



					<li class="item-menu-mobile">
								<a href="index.php">Home</a>
							</li>
							

							
							
					<li class="item-menu-mobile">
								<a href="Shop.php">Shop</a>
							</li>
							
							

				
							
							
					
				</ul>
			</nav>
		</div>
	</header>

	<!-- Title Page -->
	<section class="bg-title-page p-t-40 p-b-50 flex-col-c-m" style="background-image: url(../images/master-slide-01.jpg);">
		<h2 class="l-text2 t-center">
			Cart
		</h2>
	</section>

	<!-- Cart -->
	<section class="cart bgwhite p-t-70 p-b-100">
		<div class="container">
			<!-- Cart item -->
			<div class="container-table-cart pos-relative">
				<div class="wrap-table-shopping-cart bgwhite">
					<table class="table-shopping-cart">
						<tr class="table-head">
							<th class="column-1"></th>
							<th class="column-2">Product</th>
							<th class="column-3">Price</th>
							<th class="column-4 p-l-70">Quantity</th>
							<th class="column-5">Total</th>
							<th class="column-5">Update</th>
						</tr>






<?php
					$sql6 = mysqli_query($dbConn,"select * from order_details where order_number='$order_number' order by order_details_id DESC");
					while ($row6 = mysqli_fetch_array($sql6)){
					
					
						$sub_order_id = $row6['order_details_id'];
						$pro_id = $row6['product_id'];
						$sub_quantity = $row6['quantity'];
						$sub_price = $row6['price'];
						$sub_total_price = $row6['total_price'];
						$order_number = $row6['order_number'];
						
						
						$sql7 = mysqli_query($dbConn,"select * from products where product_id='$pro_id'");
						$row7 = mysqli_fetch_array($sql7);
						$pro_name = $row7['product_name'];
						$pro_image = $row7['product_image'];					
						$pro_quantity = $row7['product_quantity'];					
					
					?>



			<form action="" method="post">
			
			
					<input type="hidden" name="sub_order_id" value="<?php echo $sub_order_id; ?>"/>
					<input type="hidden" name="pro_id" value="<?php echo $pro_id; ?>"/>
					<input type="hidden" name="pro_quantity" value="<?php echo $pro_quantity; ?>"/>
					<input type="hidden" name="sub_price" value="<?php echo $sub_price; ?>"/>
					<input type="hidden" name="sub_quantity" value="<?php echo $sub_quantity; ?>"/>
					<input type="hidden" name="order_number" value="<?php echo $order_number; ?>"/>
					<input type="hidden" name="sub_total_price" value="<?php echo $sub_total_price; ?>"/>
					<input type="hidden" name="total_price" value="<?php echo $total_price; ?>"/>
					
					
					
					
					
					

								<tr class="table_row">
								
								
							<td class="column-1">
																<a href="Remove.php?pro_id=<?php echo $pro_id; ?>&total_price=<?php echo $total_price; ?>&sub_total_price=<?php echo $sub_total_price; ?>&order_number=<?php echo $order_number; ?>&sub_quantity=<?php echo $sub_quantity; ?>&pro_quantity=<?php echo $pro_quantity; ?>&sub_order_id=<?php echo $sub_order_id; ?>">

								<div class="cart-img-product b-rad-4 o-f-hidden">
									<img src="../../Administrator/<?php echo $pro_image; ?>" alt="IMG-PRODUCT">
								</div>
								</a>
							</td>
							<td class="column-2"><?php echo $pro_name; ?></td>
									<td class="column-3"><?php echo $sub_price; ?> JD</td>
							<td class="column-4">
								<div class="flex-w bo5 of-hidden w-size17">
									<button class="btn-num-product-down color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-minus" aria-hidden="true"></i>
									</button>


									<input class="size8 m-text18 t-center num-product" type="number" min="1" name="new_quantity" value="<?php echo $sub_quantity; ?>">

									<button class="btn-num-product-up color1 flex-c-m size7 bg8 eff2">
										<i class="fs-12 fa fa-plus" aria-hidden="true"></i>
									</button>
								</div>
							</td>
									<td class="column-5"><?php echo $sub_total_price; ?> JD</td>
							
							
							<td>
							<input type="submit" name="Submit" value="Update" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4"/>
							
					</td>
						
						
						</tr>
								
								
								
								</form>
								
							<?php
							}
							?>					
								
						
						
						
						
						
						
						
						
						
						
						
						
					</table>
				</div>
			</div>

		
			<!-- Total -->
			<div class="bo9 w-size18 p-l-40 p-r-40 p-t-30 p-b-38 m-t-30 m-r-0 m-l-auto p-lr-15-sm">
				<h5 class="m-text20 p-b-24">
					Cart Totals
				</h5>

				<!--  -->
				<div class="flex-w flex-sb-m p-b-12">
					<span class="s-text18 w-size19 w-full-sm">
						Subtotal:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo $total_price; ?> JD
					</span>
				</div>

				<!--  -->
				<div class="flex-w flex-sb bo10 p-t-15 p-b-20">
					<span class="s-text18 w-size19 w-full-sm">
						Payment Type:
					</span>

					<div class="w-size20 w-full-sm">
						<p class="s-text8 p-b-23">
							Cash On Delivery
						</p>

						

						

					</div>
				</div>

				<!--  -->
				<div class="flex-w flex-sb-m p-t-26 p-b-30">
					<span class="m-text22 w-size19 w-full-sm">
						Total:
					</span>

					<span class="m-text21 w-size20 w-full-sm">
						<?php echo $total_price; ?> JD
					</span>
				</div>

				<div class="size15 trans-0-4">
					<!-- Button -->
					
					<a href="Checkout.php?order_number=<?php echo $order_number; ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
							Proceed to Checkout
						</a>
						
						
				
				</div>
			</div>
		</div>
	</section>




	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="flex-w p-b-90">
			<div class="w-size6 p-t-30 p-l-1 p-r-15 respon3">
				<h4 class="s-text12 p-b-30">
					GET IN TOUCH
				</h4>

				<div>
					<p class="s-text7 w-size27">
						Any questions? Let us know in store at Amman / Jordan or call us on +962 6 000 0000
					</p>

					<div class="flex-m p-t-30">
						<a href="#" class="fs-18 color1 p-r-20 fa fa-facebook"></a>
						<a href="#" class="fs-18 color1 p-r-20 fa fa-instagram"></a>
			</div>
				</div>
			</div>

			

			<div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="index.php" class="s-text7">
							Home
						</a>
					</li>

					<li class="p-b-9">
						<a href="My_Account.php" class="s-text7">
							My Account
						</a>
					</li>

					<li class="p-b-9">
						<a href="Shop.php" class="s-text7">
							Shop
						</a>
					</li>

				
				</ul>
			</div>

		

			
		</div>

		<div class="t-center p-l-15 p-r-15">
			

			<div class="t-center s-text8 p-t-20">
				Copyright © 2020 All rights reserved.</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>



<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="../vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="../js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="../vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>

<!--===============================================================================================-->
	<script src="../js/main.js"></script>

</body>
</html>
