<?php
session_start();

include 'includes/config.php';



	
if(isset($_POST['Submit']))
{

$Username=$_POST['Username'];
$Password=md5($_POST['Password']);

if ($Username=='admin' && $Password=='21232f297a57a5a743894a0e4a801fc3'){

$A_ID=1;
$_SESSION['A_Log'] = $A_ID;


echo '<script language="JavaScript">
            document.location="Administrator/";
        </script>';	
}
else
{

echo '<script language="JavaScript">
	  alert ("Error ... Please Check Administrator Access Username Or Password !");
      </script>';

}
}


?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>:: Fashe | Administration Login ::</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
        	<link rel="shortcut icon" href="img/icon.png"/>

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/logo.png"/>

</head>
<br><br><br>
<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
            
       
                <img src="img/logo.png" class="img-rounded" width="100%"/>

            </div>
                    <h2 class="font-bold">Administration Portal Login</h2>
            
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Enter administrator username and password to access parents portal</p>
            <form class="m-t" role="form" method="post" action="Admin_Login.php">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" name="Username" required="">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="Password" required="">
					<br>
                <button type="submit" name="Submit" class="btn btn-primary block full-width m-b">Login</button>
				
			   </div>

</form>
            <br><a href="index.php" class="label label-warning"><small>Back To Home Page</small></a>
              

            <p class="m-t"> <small><br>Fashe © 2020. All Rights Reserved.</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
