<?php
session_start();

include("../includes/config.php"); 


$A_ID = $_SESSION['A_Log'];


if (!$_SESSION['A_Log'])
echo '<script language="JavaScript">
 document.location="../Admin_Login.php";
</script>';



	

if(isset($_POST['Submit']))
{
$C_ID = $_POST['C_ID'];
$Name = $_POST['Name'];
$Description = $_POST['Description'];
$Price = $_POST['Price'];
$Quantity = $_POST['Quantity'];
$Color = $_POST['Color'];





$file;
	
move_uploaded_file($_FILES["file"]["tmp_name"], "Products_Pictures/" . $_FILES["file"]["name"]);
      
      $file=$_FILES["file"]["name"];
	  
	$file = 'Products_Pictures/'.$file;
	
	
	
	
	
	



$insert = mysqli_query($dbConn,"insert into products (category_id,product_name,product_description,product_image,product_quantity,product_price,product_color) values ('$C_ID','$Name','$Description','$file','$Quantity','$Price','$Color')");

echo "<script language='JavaScript'>
			  alert ('New Product Has Been Added !');
      </script>";

	echo "<script language='JavaScript'>
document.location='View_Products_List.php';
        </script>";

}





?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        	<link rel="shortcut icon" href="../img/logo.jpg"/>

    <title>:: Fashe | Administration Login ::</title>

    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="../css/plugins/dataTables/datatables.min.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="../css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="../js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">

</head>

<body style="back">
     <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="../img//user.png" width="48" height="48"/>
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><font color="#fff">Administrator Area</font></strong>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                
                                
                                <li><a href="Logout.php">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">F</div>
                            
                        </li>
                    <li >
                        <a href="index.php"><i class="fa fa-th-large"></i> <span class="nav-label">Home</span></a>
                       
                    </li>
                    
                      <li>
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Categories</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            
                            <li><a href="Add_New_Category.php">Add New Category</a></li>
                            <li><a href="View_Categories_List.php">View Categories List</a></li>
                            
                        </ul>
                    </li>
                    
                
                    
               
                    
                       <li class="active">
                        <a href="#"><i class="fa fa-list"></i> <span class="nav-label">Products</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            
                            <li><a href="Add_New_Product.php">Add New Product</a></li>
                            <li><a href="View_Products_List.php">View Products List</a></li>
                            
                        </ul>
                    </li>
					
					
					
					

					
			
                    
                       <li>
                        <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Customers</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            
                            <li><a href="View_Customers_List.php">View Customers List</a></li>
                            
                        </ul>
                    </li>
					
					
					
                    
                    
                    
                     
                    
                     <li>
                        <a href="#"><i class="fa fa-list-alt"></i> <span class="nav-label">Orders</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            
                            <li><a href="View_Orders_List.php">View Orders List</a></li>
                            
                           
                           
                        </ul>
                    </li>
                    
                    
                    
                  

                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message">Welcome To Fashe - Administration Portal</span>
                </li>
                <li class="dropdown">
                    
                    <ul class="dropdown-menu dropdown-messages">
                        
                        
                        
                        
                        
                    </ul>
                </li>
             


                <li>
                    <a href="Logout.php">
                        <i class="fa fa-sign-out"></i> Logout
                    </a>
                </li>
                
            </ul>

        </nav>
        </div>
          <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Products</h2>
                    <ol class="breadcrumb">
                        <li class="active">
                            <strong>Product Information</strong>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
            
 <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Add New Product</h5>
                        <div class="ibox-tools">
                            
                          
                           
                        </div>
                    </div>
                   
                        
                        
                        
                        
                          <div class="ibox-content">

                  
                  
                  
                  
                     <form method="post" action="Add_New_Product.php" class="form-horizontal" enctype="multipart/form-data">
                                



	<div class="form-group"><label class="col-sm-2 control-label">Category *</label>

                                    <div class="col-sm-10">
									
									
						    <?php	
$query1 = mysqli_query($dbConn,"select * from categories");

echo '<select name="C_ID" class="form-control required" title="Category Name" required>';
   echo '                                       <option disabled selected value>Select Category Name</option>
';

while ($row1 = mysqli_fetch_array($query1)) {
   echo '<option value="'.$row1['category_id'].'">'.$row1['category_name'].'</option>';
}
echo '</select>';
?>  			
									
									
									
									
									
									
									
									</div>
                                </div>
                                <div class="hr-line-dashed"></div>





                                
                               
                                
                                
                                  <div class="form-group"><label class="col-sm-2 control-label">Name *</label>

                                    <div class="col-sm-10"><input value=""  type="text" name="Name" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                
                                
								<div class="form-group"><label class="col-sm-2 control-label">Description *</label>

                                    <div class="col-sm-10"><input value=""  type="text" name="Description" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
								
								
								
<div class="form-group"><label class="col-sm-2 control-label">Picture *</label>

                                    <div class="col-sm-10"><input value="" type="file" name="file" class="form-control"></div>
                                </div>
                                <div class="hr-line-dashed"></div>					
						                       




 <div class="form-group"><label class="col-sm-2 control-label">Quantity *</label>

                                    <div class="col-sm-10"><input value=""  type="number" min="1" name="Quantity" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
								
								
								

                                <div class="form-group"><label class="col-sm-2 control-label">Price *</label>

                                    <div class="col-sm-10"><input value=""  type="number" min="1" name="Price" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                             
                                
                                
                                  <div class="form-group"><label class="col-sm-2 control-label">Color *</label>

                                    <div class="col-sm-10"><input value=""  type="text" name="Color" class="form-control" required></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                
                                
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                        <button class="btn btn-white" type="reset">Cancel</button>
                                        <button class="btn btn-primary" type="submit" name="Submit">Add</button>
                                    </div>
                                </div>
                            </form>
                  
                  
                  
                  
              
                        </div>
                        
                        
                        
                        
                        
                        
                        
                        
                    </div>
                </div>
             
                
                <div class="footer">
                   
                    <div>
                       <center>Fashe © 2020. All Rights Reserved.</center>
                    </div>
                </div>
            </div>
        </div>

        </div>
       



        </div>
    </div>

     <!-- Mainly scripts -->
    <script src="../js/jquery-2.1.1.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="../js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Flot -->
    <script src="../js/plugins/flot/jquery.flot.js"></script>
    <script src="../js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="../js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="../js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="../js/plugins/flot/jquery.flot.pie.js"></script>

    <!-- Peity -->
    <script src="../js/plugins/peity/jquery.peity.min.js"></script>
    <script src="../js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="../js/inspinia.js"></script>
    <script src="../js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="../js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="../js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="../js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="../js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="../js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="../js/plugins/toastr/toastr.min.js"></script>


      
    <script src="../js/plugins/jeditable/jquery.jeditable.js"></script>

    <script src="../js/plugins/dataTables/datatables.min.js"></script>
    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                   
 
 /*                   {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }    */
                   
                ]

            });

            /* Init DataTables */
            var oTable = $('#editable').DataTable();

            /* Apply the jEditable handlers to the table */
            oTable.$('td').editable( '../example_ajax.php', {
                "callback": function( sValue, y ) {
                    var aPos = oTable.fnGetPosition( this );
                    oTable.fnUpdate( sValue, aPos[0], aPos[1] );
                },
                "submitdata": function ( value, settings ) {
                    return {
                        "row_id": this.parentNode.getAttribute('id'),
                        "column": oTable.fnGetPosition( this )[2]
                    };
                },

                "width": "90%",
                "height": "100%"
            } );


        });

        function fnClickAddRow() {
            $('#editable').dataTable().fnAddData( [
                "Custom row",
                "New row",
                "New row",
                "New row",
                "New row" ] );

        }
    </script>
</body>
</html>
