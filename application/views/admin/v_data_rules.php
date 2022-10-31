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
        <title>Inferensi sistem</title>

        <!-- Styles -->        
        <link href="../../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../../assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="../../assets/plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="../../assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
        <link href="../../assets/plugins/nvd3/nv.d3.min.css" rel="stylesheet">
        <link href="../../assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/> 
        <link href="../../assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/> 
        <link href="../../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>  
      
        <!-- Theme Styles -->
        <link href="../../assets/css/ecaps.min.css" rel="stylesheet">
        <link href="../../assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <!-- Modal Hapus -->
        <div class="modal fade" id="myModal_hapus" tabindex="-1" role="dialog" aria-labelledby="myModal_disable" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="tvDisable">Apakah yakin ingin hapus rules ini?</h4>
                    </div>
                                                
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" id="btnHapus" class="btn btn-danger">Hapus</button>
                    </div>                    
                </div>
            </div>
        </div>                                                          
        <!-- end hapus -->

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
                            <li>
                                <a href="<?php echo base_url('index.php/admin')?>">
                                    <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-folder"></i><span>Master data</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li ><a href="<?php echo base_url('index.php/admin/index_barang')?>">Data Barang</a></li>

                                    <li><a href="<?php echo base_url('index.php/admin/index_brand')?>">Data Brand</a></li>

                                    <li><a href="<?php echo base_url('index.php/admin/index_kategori')?>">Data Kategori</a></li>
                                </ul>
                            </li>                            
                            <li>
                                <a href="<?php echo base_url('index.php/admin/index_derajat')?>">
                                    <i class="menu-icon icon-sort"></i><span>Derajat Keanggo..</span>
                                </a>
                            </li>                           
                            <li class="active-page">
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
                        <h3 class="breadcrumb-header">Rules</h3>
                    </div>
                    <div id="main-wrapper">
                        <div class="row">                            
                            <div class="col-md-12">
                                <div class="panel panel-white">                                
                                    <div class="panel-body">

                                    <div class="mdl-card__title">
                                        <form id="form_add" method="post" enctype="multipart/form-data" class="form-inline">
                                          <div class="form-group mb-2">                                                
                                                <select class="form-control" id="linguistik1_dropdown" name="linguistik1_dropdown">
                                                <option value="-1">pilih linguistik 1</option>
                                                </select>
                                                <span id="state_loader"></span>
                                          </div>
                                          <div class="form-group mb-2">                                                
                                                <select class="form-control" id="linguistik2_dropdown" name="linguistik2_dropdown">
                                                <option value="-1">pilih linguistik 2</option>
                                                </select>
                                                <span id="state_loader"></span>
                                          </div>
                                          <div class="form-group mb-2">                                                
                                                <select class="form-control" id="linguistik3_dropdown" name="linguistik3_dropdown">
                                                <option value="-1">pilih linguistik 3</option>
                                                </select>
                                                <span id="state_loader"></span>
                                          </div>

                                          <div class="form-group mx-sm-3 mb-2">
                                                <select class="form-control" id="linguistik4_dropdown" name="linguistik4_dropdown">
                                                <option value="-1">pilih linguistik 4</option>
                                                </select>
                                                <span id="state_loader"></span>
                                          </div> 

                                          <div class="form-group mx-sm-3 mb-2">
                                                <select class="form-control" id="linguistik5_dropdown" name="linguistik5_dropdown">
                                                <option value="-1">Pilih defuzzification</option>
                                                </select>
                                                <span id="state_loader"></span>
                                          </div>                                          
                                          <button id="btnInput" name="btnInput" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan rules</button>                                            
                                        </form>
                                    </div>

                                    <br>
                                    
                                   <div class="table-responsive">
                                    <table id="tblRules" class="display table" style="width: 100%; cellspacing: 0;">
                                        <thead>
                                            <tr>
                                                <th style="text-align:center" class="center">NO</th>
                                                <th style="text-align:center" class="center">Kode rules</th>
                                                <th style="text-align:center" class="center">Harga</th>
                                                <th style="text-align:center" class="center">Brand</th>               
                                                <th style="text-align:center" class="center">Tahun produksi</th>
                                                <th style="text-align:center" class="center">Ukuran</th>
                                                <th style="text-align:center" class="center">Defuzzyfication</th>
                                                <th style="text-align:center" class="center">Aksi</th>                       
                                            </tr>
                                        </thead>                                        
                                        <tbody id="showdata">
                                        </tbody>
                                       </table>  
                                    </div>

                                    </div>                                
                                </div>                                
                            </div>                            
                        </div>
                    </div><!-- Main Wrapper -->

                </div><!-- /Page Inner -->


            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <script src="../../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../../assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="../../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="../../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../../assets/js/ecaps.min.js"></script>
        <script src="../../assets/js/pages/table-data.js"></script>
        <script src="../../assets/js/sweetalert.min.js"></script> 

        <script type="text/javascript">
            $(document).ready(function(){
                var id_derajat = [];                                

                data_rules();
                fetch_linguistik1();
                fetch_linguistik2();
                fetch_linguistik3();
                fetch_linguistik4(); 
                fetch_linguistik5();               

                function data_rules(){
                    $.ajax({                
                        type  : 'GET',
                        url   : '<?php echo base_url('index.php/admin/fetch_rules')?>',
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var i = 0;
                            var idx = 1;                            
                            var temp = [];
                            var id_defuzzy;
                            for(i=0; i<data.length; i++){
                                if((i+1)%4!=0){
                                    temp.push(data[i].nama_dk);                                    
                                    id_defuzzy = data[i].id_defuzzy;
                                }else{
                                    temp.push(data[i].nama_dk); 
                                    html += '<tr>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric" >'+idx+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].id_rules+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+temp[0]+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+temp[1]+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+temp[2]+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+temp[3]+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].defuzzy+'</td>'+
                                        // '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].nama_parameter+'</td>'+
                                        '<td style="text-align:center;">'+                                        
                                        '<button type="button" class="btn btn-danger m-b-sm hapus" id="'+data[i].id_rules+'"  "data-toggle="modal" data-target="#myModal_hapus"><i class="fa fa-trash"></i> </button>'+                                       
                                        '</td>'+                        
                                        '</tr>';                                    
                                    temp.length = 0;
                                    idx+=1;
                                }                            
                                
                            }    
                                
                            $('#showdata').html(html); 
                            // $("#tblRules").DataTable();                   
                        }
                    });
                }

                function fetch_linguistik1(){
                    var select1 = document.getElementById('linguistik1_dropdown');
                    $.ajax({
                        url  : "<?php echo base_url('index.php/admin/fetch_linguistik1')?>",           
                        method:"POST",                        
                        async : true,
                        dataType : 'json',
                        success:function(data){ 
                            for(i=0; i<data.length; i++) {                                
                                $(select1).append('<option value=' + data[i].id_dk + '>' + data[i].id_dk + "-" +data[i].nama_dk + '</option>');
                            }
                        },
                        error: function(jqxhr, status, exception) {
                             alert('Exception:', exception);
                        }
                    });
                }

                function fetch_linguistik2(){
                    var select1 = document.getElementById('linguistik2_dropdown');
                    $.ajax({
                        url  : "<?php echo base_url('index.php/admin/fetch_linguistik2')?>",           
                        method:"POST",                        
                        async : true,
                        dataType : 'json',
                        success:function(data){ 
                            for(i=0; i<data.length; i++) {                                
                                $(select1).append('<option value=' + data[i].id_dk + '>' + data[i].id_dk + "-" +data[i].nama_dk + '</option>');
                            }
                        },
                        error: function(jqxhr, status, exception) {
                             alert('Exception:', exception);
                        }
                    });
                }

                function fetch_linguistik3(){
                    var select1 = document.getElementById('linguistik3_dropdown');
                    $.ajax({
                        url  : "<?php echo base_url('index.php/admin/fetch_linguistik3')?>",           
                        method:"POST",                        
                        async : true,
                        dataType : 'json',
                        success:function(data){ 
                            for(i=0; i<data.length; i++) {                                
                                $(select1).append('<option value=' + data[i].id_dk + '>' + data[i].id_dk + "-" +data[i].nama_dk + '</option>');
                            }
                        },
                        error: function(jqxhr, status, exception) {
                             alert('Exception:', exception);
                        }
                    });
                }

                function fetch_linguistik4(){
                    var select = document.getElementById('linguistik4_dropdown');                    
                    $.ajax({
                        url  : "<?php echo base_url('index.php/admin/fetch_linguistik4')?>",           
                        method:"POST",                        
                        async : true,
                        dataType : 'json',
                        success:function(data){ 
                            for(i=0; i<data.length; i++) {                                
                                $(select).append('<option value=' + data[i].id_dk + '>' + data[i].id_dk + "-" +data[i].nama_dk + '</option>');
                            }
                        },
                        error: function(jqxhr, status, exception) {
                             alert('Exception:', exception);
                        }
                    });
                }    

                function fetch_linguistik5(){
                    var select = document.getElementById('linguistik5_dropdown');                    
                    $.ajax({
                        url  : "<?php echo base_url('index.php/admin/fetch_linguistik5')?>",           
                        method:"POST",                        
                        async : true,
                        dataType : 'json',
                        success:function(data){ 
                            for(i=0; i<data.length; i++) {                                
                                $(select).append('<option value=' + data[i].id_dk + '>' + data[i].id_dk + "-" +data[i].nama_dk + '</option>');
                            }
                        },
                        error: function(jqxhr, status, exception) {
                             alert('Exception:', exception);
                        }
                    });
                }          

                $('#form_add').submit(function(event){
                    event.preventDefault(); 
                    $.ajax({
                        url  : "<?php echo base_url('index.php/admin/tambah_rules')?>",           
                        method:"POST",
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        dataType : 'json',
                        success:function(data){      
                            data_rules();  
                            // $('#linguistik1_dropdown').prop('selectedIndex',0);                
                            // $('#linguistik2_dropdown').prop('selectedIndex',0);                
                            // $('#linguistik3_dropdown').prop('selectedIndex',0);                
                            // $('#linguistik4_dropdown').prop('selectedIndex',0);                
                            swal("Berhasil!", "Sukses tambah rules", "success");                            
                        },
                        error: function(jqxhr, status, exception) {
                             swal('Exception:', exception, "failed");
                        }
                    });
                }); 

                $(document).on('click', '.hapus', function(){
                  id_edit = $(this).attr('id');                  
                  $('#myModal_hapus').modal('show');               
                });

                $('#btnHapus').on('click', function(event){             
                    event.preventDefault();                      
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/admin/hapus_rules')?>",
                        data: {id_edit: id_edit},                        
                        dataType : 'json',
                        success:function(data){                                   
                            $('#myModal_hapus').modal('hide');
                            swal("Berhasil!", "Berhasil Hapus data!", "success");                            
                            data_rules();
                        },
                        error: function(jqxhr, status, exception) {
                             alert('Exception:', exception);
                        }
                    });
                                                                                  
                });

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