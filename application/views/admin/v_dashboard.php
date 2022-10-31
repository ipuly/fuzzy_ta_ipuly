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
        <title>Dashboard</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="<?php echo base_url('assets/plugins/bootstrap/css/bootstrap.min.css')?> " rel="stylesheet">
        <link href="<?php echo base_url('assets/plugins/font-awesome/css/font-awesome.min.css')?> " rel="stylesheet">
        <link href="<?php echo base_url('assets/plugins/icomoon/style.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('ssets/plugins/uniform/css/default.css" rel="stylesheet')?>"/>
        <link href="<?php echo base_url('assets/plugins/switchery/switchery.min.css')?>" rel="stylesheet"/>
        <link href="<?php echo base_url('assets/plugins/nvd3/nv.d3.min.css')?>" rel="stylesheet">  
      
        <!-- Theme Styles -->
        <link href="<?php echo base_url('assets/css/ecaps.min.css')?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/custom.css')?>" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>

        <form id="form_logout" enctype="multipart/form-data">
            <div class="modal fade" id="modal_logout" tabindex="-1" role="dialog" aria-labelledby="myModal_disable" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="tvDelete">Apakah yakin ingin keluar?</h4>                            
                        </div>
                                                    
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                            <button type="submit" id="btnIya" class="btn btn-danger">Iya</button>
                        </div>                    
                    </div>
                </div>
            </div>
        </form>
        
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar">
                <a class="logo-box" href="index.html">
                    <span>Toko Melati</span>
                    <i class="icon-radio_button_unchecked" id="fixed-sidebar-toggle-button"></i>
                    <i class="icon-close" id="sidebar-toggle-button-close"></i>
                </a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                            <li class="active-page">
                                <a href="<?php echo base_url('index.php/admin')?>">
                                    <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                                </a>
                            </li>                          
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-folder"></i><span>Master data</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li><a href="<?php echo base_url('index.php/admin/index_barang')?>">Data Barang</a></li>

                                    <li><a href="<?php echo base_url('index.php/admin/index_brand')?>">Data Brand</a></li>

                                    <li><a href="<?php echo base_url('index.php/admin/index_kategori')?>">Data Kategori</a></li>
                                </ul>
                            </li>  
                            <li>
                                <a href="<?php echo base_url('index.php/admin/index_derajat')?>">
                                    <i class="menu-icon icon-sort"></i><span>Derajat Keanggo..</span>
                                </a>
                            </li>                           
                            <li>
                                <a href="<?php echo base_url('index.php/admin/index_rules')?>">
                                    <i class="menu-icon icon-book"></i><span>Rules</span>
                                </a>
                            </li>
                            <li>
                                <a href="<?php echo base_url('index.php/admin/index_rekomendasi')?>">
                                    <i class="menu-icon icon-star"></i><span>Hasil rekomendasi</span>
                                </a>
                            </li>
                            <li>
                                <a data-target="#modal_logout" data-toggle="modal" class="MainNavText" 
                                   id="MainNavHelp" href="#modal_logout">
                                    <i class="menu-icon fa fa-sign-out"></i><span>Logout</span>
                                </a>
                            </li>
                            
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </div><!-- /Page Sidebar -->
            
            <!-- Page Content -->
            <div class="page-content">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="search-form">
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input" placeholder="Cari Sesuatu...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <div class="logo-sm">
                                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                                    <a class="logo-box" href="index.html"><span>Toko Melati</span></a>
                                </div>
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                            
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fa fa-bars"></i></a></li>
                                    <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fa fa-expand"></i></a></li>                                    
                                </ul>
                            </div><!-- /.navbar-collapse -->
                            
                        </div><!-- /.container-fluid -->
                    </nav>
                </div><!-- /Page Header -->

                <!-- Page Inner -->
                <div class="page-inner">
                    <div class="page-title">
                        <h3 class="breadcrumb-header">Dashboard</h3>
                    </div>
                    <div id="main-wrapper">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-white stats-widget">
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <span id="tvJumlah_barang" class="stats-number"></span>
                                            <p class="stats-info">Jumlah Barang</p>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-white stats-widget">
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <span id="tvJumlah_rules" class="stats-number"></span>
                                            <p class="stats-info">Jumlah Rules</p>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-white stats-widget">
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <span id="tvJumlah_brand" class="stats-number"></span>
                                            <p class="stats-info">Jumlah brand</p>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="panel panel-white stats-widget">
                                    <div class="panel-body">
                                        <div class="pull-left">
                                            <span id="tvJumlah_kategori" class="stats-number"></span>
                                            <p class="stats-info">Jumlah Kategori</p>
                                        </div>                                       
                                    </div>
                                </div>
                            </div>
                        </div><!-- Row -->
                        
                     
                    </div><!-- Main Wrapper -->
                    </div><!-- /Page Inner -->
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <script src="<?php echo base_url('assets/plugins/jquery/jquery-3.1.0.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/uniform/js/jquery.uniform.standalone.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/switchery/switchery.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/d3/d3.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/nvd3/nv.d3.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/flot/jquery.flot.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/flot/jquery.flot.time.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/flot/jquery.flot.symbol.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/flot/jquery.flot.resize.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/flot/jquery.flot.tooltip.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/flot/jquery.flot.pie.min.js')?>"></script>
        <script src="<?php echo base_url('assets/plugins/chartjs/chart.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/ecaps.min.js')?>"></script>
        <script src="<?php echo base_url('assets/js/pages/dashboard.js')?>"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                jumlah_barang();
                jumlah_rules();
                jumlah_brand();
                jumlah_kategori();

                function jumlah_barang(){
                    $.ajax({                
                        url: "<?php echo base_url('index.php/Admin/jumlah_barang')?>",
                        type: "get",
                        async : true,
                        dataType : 'json',
                      success: function(data) {                    
                        $('#tvJumlah_barang').text(data[0].jml_barang);
                      },
                      error: function(xhr) {
                        alert(xhr);
                      }
                    });
                }

                function jumlah_rules(){
                    $.ajax({                
                        url: "<?php echo base_url('index.php/Admin/jumlah_rules')?>",
                        type: "get",
                        async : true,
                        dataType : 'json',
                      success: function(data) {                    
                        $('#tvJumlah_rules').text(data[0].jmlRules);
                      },
                      error: function(xhr) {
                        alert(xhr);
                      }
                    });
                }

                function jumlah_brand(){
                    $.ajax({                
                        url: "<?php echo base_url('index.php/Admin/jumlah_brand')?>",
                        type: "get",
                        async : true,
                        dataType : 'json',
                      success: function(data) {                    
                        $('#tvJumlah_brand').text(data[0].jml_brand);
                      },
                      error: function(xhr) {
                        alert(xhr);
                      }
                    });
                }

                function jumlah_kategori(){
                    $.ajax({                
                        url: "<?php echo base_url('index.php/Admin/jumlah_kategori')?>",
                        type: "get",
                        async : true,
                        dataType : 'json',
                      success: function(data) {                    
                        $('#tvJumlah_kategori').text(data[0].jml_kategori);
                      },
                      error: function(xhr) {
                        alert(xhr);
                      }
                    });
                }                                      

                $('#btnIya').on('click', function(){  
                    $.ajax({
                        type: 'GET',
                        url: '<?php echo base_url('index.php/Admin/unsetSession')?>',
                        success: function(msg) {
                            window.location.href="<?php echo base_url('index.php/login')?>";
                        }
                    });                                      
                });


            });
        </script>
    </body>
</html>