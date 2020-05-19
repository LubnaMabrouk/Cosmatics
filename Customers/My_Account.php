<?php
session_start();

include("../includes/config.php"); 


$C_ID = $_SESSION['C_Log'];


if (!$_SESSION['C_Log'])
echo '<script language="JavaScript">
 document.location="../Signin_Singup.php";
</script>';




$sql3 = mysqli_query($dbConn,"select * from customers where customer_id='$C_ID'");
$row3 = mysqli_fetch_array($sql3);
$customer_name=$row3['customer_name'];
$customer_email=$row3['customer_email'];
$customer_password=$row3['customer_password'];					
$customer_phone=$row3['customer_phone'];



if(isset($_POST['Submit']))
{
	
	
$C_ID=$_POST['C_ID'];
$customer_name=$_POST['customer_name'];
$customer_email=$_POST['customer_email'];
$customer_password=$_POST['customer_password'];					
$customer_phone=$_POST['customer_phone'];

$query = mysqli_query($dbConn,"SELECT * FROM customers WHERE customer_email='$customer_email' AND customer_id!='$C_ID'"); 
		

if (mysqli_num_rows($query)>0)
{


	echo "<script language='JavaScript'>
			  alert ('Sorry ! This Email Address Is Already Exist !');
      </script>";


echo '<script language="JavaScript">
            document.location="My_Account.php";
        </script>';
		
		
	
}
else
{










$insert = mysqli_query($dbConn,"update customers set customer_name='$customer_name', customer_email='$customer_email', customer_password='$customer_password', customer_phone='$customer_phone' where customer_id='$C_ID'");


	echo "<script language='JavaScript'>
			  alert ('Profile Information Updated !');
      </script>";

echo '<script language="JavaScript">
            document.location="My_Account.php";
        </script>';



}
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

	
	
	<br><br>
	
	<div class="col-md-12 p-b-10">
					<form class="leave-comment" method="post">
										<input type="hidden" name="C_ID" value="<?php echo $C_ID; ?>"/>

						<h4 class="m-text26 p-b-36 p-t-6">
							My Account
						</h4>

						
						
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" value="<?php echo $customer_name; ?>" name="customer_name" placeholder="Name">
						</div>
						
						
						
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" value="<?php echo $customer_email; ?>" name="customer_email" placeholder="Email Address">
						</div>
						
						
						
						
						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="text" value="<?php echo $customer_phone; ?>" name="customer_phone" placeholder="Phone">
						</div>
						
						
						
						
						

						<div class="bo4 of-hidden size15 m-b-20">
							<input class="sizefull s-text7 p-l-22 p-r-22" type="password" value="<?php echo $customer_password; ?>" name="customer_password" placeholder="Password">
						</div>


						<div class="w-size25">
							<!-- Button -->
							<button name="Submit" type="submit" class="flex-c-m size2 bg1 bo-rad-23 hov1 m-text3 trans-0-4">
								Update
							</button>
						</div>
					</form>
				</div>
				
	


	

	<!-- Shipping -->
	<section class="shipping bgwhite p-t-62 p-b-46">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Free Delivery Worldwide
				</h4>

				
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					30 Days Return
				</h4>

				
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Store Opening
				</h4>

				
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
