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
        <title>Derajat Keanggotaan</title>

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

        <!-- modal Add -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Tambah derajat keanggotaan</h3>  
                    </div>
                    <div class="modal-body">
                        <form id="form_add" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fid">id derajat</label>
                                <input type="text" id="id_derajat" class="form-control" name="id_derajat" 
                                autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="fnama">Nama derajat</label>
                                <input type="text" id="nama_derajat" class="form-control" name="nama_derajat" 
                                autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="fparameter">Parameter</label>
                                <select class="form-control" id="parameter_dropdown" name="parameter_dropdown">
                                <option value="-1">Pilih Parameter</option>
                                </select>
                                <span id="state_loader"></span>
                            </div>

                            <div class="form-group">
                                <label for="fbatasatas">Batas atas</label>
                                <input id="batas_atas" name="batas_atas" type="range" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                                <output id="batas_atas_label">24</output>
                            </div>

                            <div class="form-group">
                                <label for="fbatasbawah">Batas bawah</label>
                                <input id="batas_bawah" name="batas_bawah" type="range" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                                <output id="batas_bawah_label">24</output>
                            </div>
                                                                    
                        <div class="modal-footer">                    
                            <button type="button" id="btnCancel_add" onreset="resetHandler();" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="input" value="Upload" id="btnInput">Input</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End modal -->

        <!-- modal Ubah -->
        <div class="modal fade" id="myModal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Ubah derajat keanggotaan</h3>  
                    </div>
                    <div class="modal-body">
                        <form id="form_ubah" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fnama">Nama derajat</label>
                                <input type="text" id="nama_derajat_ubah" class="form-control" name="nama_derajat_ubah" 
                                autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="fparameter">Parameter</label>
                                <select class="form-control" id="parameter_dropdown_ubah" name="parameter_dropdown_ubah">
                                <option value="-1">Pilih Parameter</option>
                                </select>
                                <span id="state_loader"></span>
                            </div>

                            <div class="form-group">
                                <label for="fbatasatas">Batas atas</label>
                                <input id="batas_atas_ubah" name="batas_atas_ubah" type="range" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                                <output id="batas_atas_label_ubah">24</output>
                            </div>

                            <div class="form-group">
                                <label for="fbatasbawah">Batas bawah</label>
                                <input id="batas_bawah_ubah" name="batas_bawah_ubah" type="range" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                                <output id="batas_bawah_label_ubah">24</output>
                            </div>              
                                                                    
                        <div class="modal-footer">                    
                            <button type="button" id="btnCancel_add" onreset="resetHandler();" class="btn btn-danger" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary" name="ubah" value="Upload" id="btnUbah">Ubah</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End modal -->

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
                            <li class="active-page">
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
                        <h3 class="breadcrumb-header">Derajat Keanggotaan</h3>
                    </div>
                    <div id="main-wrapper">
  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-white">                                
                                <div class="panel-body">                                    
                                     <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Derajat keanggotaan </button>
                                       <div class="table-responsive">
                                        <table id="tblDerajat" class="display table" style="width: 100%; cellspacing: 0;">
                                            <thead>
                                                <tr>
                                                    <th class="center">NO</th>
                                                    <th class="center">ID DK</th>
                                                    <th class="center">Nama DK</th>
                                                    <th class="center">Batas atas</th>
                                                    <th class="center">Batas bawah</th>
                                                    <th class="center">Parameter</th>
                                                    <th class="center">Aksi</th>
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
                var id_edit = "";

                data_derajat();
                fetch_parameter();                

                function fetch_parameter(){
                    var select = document.getElementById('parameter_dropdown');
                    var select_ubah = document.getElementById('parameter_dropdown_ubah');                    
                    $.ajax({
                        url  : "<?php echo base_url('index.php/admin/fetch_parameter')?>",           
                        method:"GET",                        
                        async : true,
                        dataType : 'json',
                        success:function(data){ 
                            for(i=0; i<data.length; i++) {                                
                                $(select).append('<option value=' + data[i].id_parameter + '>' + data[i].nama_parameter + '</option>');
                                $(select_ubah).append('<option value=' + data[i].id_parameter + '>' + data[i].nama_parameter + '</option>');
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
                        url  : "<?php echo base_url('index.php/admin/tambah_derajat')?>",           
                        method:"POST",
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        dataType : 'json',
                        success:function(data){                           
                            $('#myModal').modal('hide');
                            swal("Berhasil!", "Sukses tambah derajat", "success");
                            data_derajat();                 
                        },
                        error: function(jqxhr, status, exception) {
                             swal('Exception:', exception, "failed");
                        }
                    });
                }); 

                function data_derajat(){
                    $.ajax({                
                        type  : 'GET',
                        url   : '<?php echo base_url('index.php/admin/fetch_derajat')?>',
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var i;
                            for(i=0; i<data.length; i++){                              
                                html += '<tr>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric" >'+(i+1)+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].id_dk+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].nama_dk+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].batas_atas+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].batas_bawah+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].nama_parameter+'</td>'+
                                        '<td style="text-align:center;">'+                                        
                                        '<button type="button" class="btn btn-success m-b-sm ubah" id="'+data[i].id_dk+'"  "data-toggle="modal" data-target="#myModal_edit"><i class="fa fa-edit"></i> </button>'+                                       
                                        '</td>'+                        
                                        '</tr>';                                              

                            }    
                                
                            $('#showdata').html(html); 
                            $("#tblDerajat").DataTable();                   
                        }
                    });
                }

                $(document).on('click', '.ubah', function(){
                  id_edit = $(this).attr('id');  
                  $.ajax({
                      type : "POST",
                      url  : "<?php echo base_url('index.php/admin/get_derajat_id')?>",
                      dataType : "JSON",
                      data : {id_edit:id_edit},                      
                      success: function(data){
                       $.each(data,function(id_dk,nama_dk,batas_atas,batas_bawah,id_parameter){
                           $('#myModal_edit').modal('show');
                           
                           $("#parameter_dropdown_ubah").val(data[0].id_parameter).change();                         
                           $('[name="nama_derajat_ubah"]').val(data[0].nama_dk);

                           $("#batas_atas_ubah").val(data[0].batas_atas);
                           $("#batas_atas_label_ubah").val(data[0].batas_atas);
                           $("#batas_bawah_ubah").val(data[0].batas_bawah);
                           $("#batas_bawah_label_ubah").val(data[0].batas_bawah);                           
                       });                     
                      }
                  });                
                });

                $('#form_ubah').submit(function(event){  
                  event.preventDefault();   
                  var data = new FormData(this);
                  data.append("id_derajat", id_edit);   
                  $.ajax({
                       url  : "<?php echo base_url('index.php/admin/ubah_derajat')?>",           
                       method:"POST",
                       data: data,
                       contentType:false,
                       processData:false,
                      success:function(data){                
                        data_derajat();                
                        $('#myModal_edit').modal('hide');
                        swal({
                          title: "Konfirmasi",
                          text: "Sukses update",
                          icon: "success",
                          button: "oke",
                        });
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