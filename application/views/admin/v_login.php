<!DOCTYPE html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="skcats">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Login</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="../assets/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
      
        <!-- Theme Styles -->
        <link href="../assets/css/ecaps.css" rel="stylesheet">
        <link href="../assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>        

        <!-- Page Container -->
        <div class="page-container">
                <!-- Page Inner -->
                <div class="page-inner login-page">
                    <div id="main-wrapper" class="container-fluid">
                        <div class="row">                            
                            <div class="col-sm-6 col-md-3 login-box">
                                <h4 class="login-title">Sign in to your account</h4>
                                <form id="form_login" enctype="multipart/form-data" action="javascript:void(0);">
                                    <div class="form-group">
                                        <label>Email address</label>
                                        <input type="email" class="form-control" id="txtEmail" name="txtEmail">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" id="txtPassword" name="txtPassword">
                                    </div>
                                    <button type="submit" id="btnLogin" class="btn btn-primary">Login</button>
                                    <br>
                                    <a id="btnForgot" class="forgot-link">Forgot password?</a>
                                </form>
                            </div>
                        </div>
                    </div>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../assets/js/ecaps.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
        <script src="../assets/js/sweetalert.min.js"></script>            

        <script type="text/javascript">
            $(document).ready(function(){                 	

            	$('#form_login').submit(function(event){
            		event.preventDefault();             		

            		$.ajax({                
                        url: "<?php echo base_url('index.php/Login/auth')?>",
                        method:"POST",
	                    data:new FormData(this),
	                    contentType:false,
	                    processData:false,
	                    dataType : 'json',			                                
                      success: function(data) {                                        
                      	if (data.result == 0) {
                      		swal("Gagal Login!", "Email atau password salah!", "error");
                      	}else{
                      		window.location.href = "<?php echo base_url('index.php/admin')?>";
                      	}
                      },
                      error: function(xhr) {
                        alert(xhr);
                      }
                    });

            	});    

            });
        </script>

    </body>
</html>