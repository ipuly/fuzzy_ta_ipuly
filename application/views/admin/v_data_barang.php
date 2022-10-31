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
        <title>Konfigurasi data barang</title>

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
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

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
                        <h3 class="modal-title">Tambah barang</h3>  
                    </div>
                    <div class="modal-body">
                        <form id="form_add" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fnama">Nama barang</label>
                                <input type="text" id="nama_barang" class="form-control" name="nama_barang" 
                                autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="ftahun">Kategori</label>
                                <select class="form-control" id="kategori_dropdown" name="kategori_dropdown">
                                <option value="-1">Pilih Kategori</option>
                                </select>
                                <span id="state_loader"></span>
                            </div>

                            <div class="form-group">
                                <label for="fbrand">Brand</label>
                                <select class="form-control" id="brand_dropdown" name="brand_dropdown">
                                <option value="-1">Pilih Brand</option>
                                </select>
                                <span id="state_loader"></span>
                            </div>

                            <div class="form-group">
                                <label for="fharga">Harga</label>
                                <input type="text" id="harga" class="form-control" name="harga" autocomplete="off">
                            </div>
                            
                            <div class="progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progress-bar" area-valuenow="35" area-valuemin="0" area-valuemax="100" style="width: 35%;">
                                    Kecil
                                </div>
                                <div class="progress-bar progress-bar-warning progress-bar-striped active" role="progress-bar" area-valuenow="70" area-valuemin="0" area-valuemax="100" style="width: 35%;">
                                    Sedang
                                </div>
                                <div class="progress-bar progress-bar-danger progress-bar-striped active" role="progress-bar" area-valuenow="100" area-valuemin="0" area-valuemax="100" style="width: 30%;">
                                    Besar
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fnama">Ukuran</label>               
                                <input id="ukuran" name="ukuran" type="range" value="24" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                                <output>24</output>
                            </div> 

                            <div class="form-group">
                                <label for="ftahun">Tahun Produksi</label>
                                <input type="text" id="tahun" class="form-control" name="tahun" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="fstok">Stok</label>
                                <input type="text" id="stok" class="form-control" name="stok" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" rows="4" name="deskripsi" autocomplete="off"></textarea>
                            </div>                   
                            
                            </br></br>
                                        
                            <h6> Gambar 1 </h6>
                            <input type="file" name="foto1" id="foto1" /></p><br />
                            <input type="hidden" name="action" id="action" value="insert" />
                            <input type="hidden" name="foto1_id" id="foto1_id" />

                            <!-- <h6> Gambar 2 </h6>
                            <input type="file" name="foto2" id="foto2" /></p><br />
                            <input type="hidden" name="action" id="action" value="insert" />
                            <input type="hidden" name="foto2_id" id="foto2_id" />

                            <h6> Gambar 3 </h6>
                            <input type="file" name="foto3" id="foto3" /></p><br />
                            <input type="hidden" name="action" id="action" value="insert" />
                            <input type="hidden" name="foto3_id" id="foto3_id" /> -->
                            <!-- <img id="imgPreview" src="#" width="100" /> -->
                                                                    
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
                        <h3 class="modal-title">Ubah barang</h3>  
                    </div>
                    <div class="modal-body">
                        <form id="form_ubah" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="fnama">Nama barang</label>
                                <input type="text" id="nama_barang_ubah" class="form-control" name="nama_barang_ubah" 
                                autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="ftahun">Kategori</label>
                                <select class="form-control" id="kategori_dropdown_ubah" name="kategori_dropdown_ubah">
                                <option value="-1">Pilih Kategori</option>
                                </select>
                                <span id="state_loader"></span>
                            </div>

                            <div class="form-group">
                                <label for="fbrand">Brand</label>
                                <select class="form-control" id="brand_dropdown_ubah" name="brand_dropdown_ubah">
                                <option value="-1">Pilih Brand</option>
                                </select>
                                <span id="state_loader"></span>
                            </div>

                            <div class="form-group">
                                <label for="fharga">Harga</label>
                                <input type="text" id="harga_ubah" class="form-control" name="harga_ubah" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="fnama">Ukuran</label>                                
                                <input id="ukuran_ubah" name="ukuran_ubah" type="range" min="1" max="100" oninput="this.nextElementSibling.value = this.value">
                                <output id="ukuran_ubah_output">24</output>
                            </div> 

                            <div class="form-group">
                                <label for="ftahun">Tahun Produksi</label>
                                <input type="text" id="tahun_ubah" class="form-control" name="tahun_ubah" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="fstok">Stok</label>
                                <input type="text" id="stok_ubah" class="form-control" name="stok_ubah" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Keterangan</label>
                                <textarea class="form-control" id="keterangan_ubah" rows="4" name="keterangan_ubah" autocomplete="off"></textarea>
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

        <!-- Modal Hapus -->
        <div class="modal fade" id="myModal_hapus" tabindex="-1" role="dialog" aria-labelledby="myModal_disable" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="tvDisable">Apakah yakin ingin hapus barang ini?</h4>
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
                            <li class="active-page">
                                <a href="javascript:void(0)">
                                    <i class="menu-icon icon-folder"></i><span>Master data</span><i class="accordion-icon fa fa-angle-left"></i>
                                </a>
                                <ul class="sub-menu">
                                    <li class="active-page"><a href="<?php echo base_url('index.php/admin/index_barang')?>">Data Barang</a></li>

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
                        <h3 class="breadcrumb-header">Master data barang</h3>
                    </div>
                    <div id="main-wrapper">
  
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-white">                                
                                <div class="panel-body">                                    
                                     <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus"></i> Tambah barang </button>
                                       <div class="table-responsive">
                                        <table id="tblBarang" class="display table" style="width: 100%; cellspacing: 0;">
                                            <thead>
                                                <tr>
                                                    <th class="center">NO</th>
                                                    <th class="center">Nama Barang</th>
                                                    <th class="center">Kategori</th>
                                                    <th class="center">Brand</th>
                                                    <th class="center">Thn Produksi</th>
                                                    <th class="center">Harga</th>
                                                    <th class="center">Ukuran</th>
                                                    <th class="center">Stok</th>
                                                    <th class="center">gambar</th>
                                                    <th class="center">keterangan</th>
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

                data_barang();
                fetch_kategori();
                fetch_brand();

                function fetch_kategori(){
                    var select = document.getElementById('kategori_dropdown');
                    var select_ubah = document.getElementById('kategori_dropdown_ubah');                    
                    $.ajax({
                        url  : "<?php echo base_url('index.php/admin/fetch_kategori')?>",           
                        method:"GET",                        
                        async : true,
                        dataType : 'json',
                        success:function(data){ 
                            for(i=0; i<data.length; i++) {                                
                                $(select).append('<option value=' + data[i].id_kategori + '>' + data[i].nama_kategori + '</option>');
                                $(select_ubah).append('<option value=' + data[i].id_kategori + '>' + data[i].nama_kategori + '</option>');
                            }
                        },
                        error: function(jqxhr, status, exception) {
                             alert('Exception:', exception);
                        }
                    });
                }  

                function fetch_brand(){
                    var select = document.getElementById('brand_dropdown');
                    var select_ubah = document.getElementById('brand_dropdown_ubah');                    
                    $.ajax({
                        url  : "<?php echo base_url('index.php/admin/fetch_brand')?>",           
                        method:"GET",                        
                        async : true,
                        dataType : 'json',
                        success:function(data){ 
                            for(i=0; i<data.length; i++) {                                
                                $(select).append('<option value=' + data[i].id_brand + '>' + data[i].nama_brand + '</option>');
                                $(select_ubah).append('<option value=' + data[i].id_brand + '>' + data[i].nama_brand + '</option>');
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
                        url  : "<?php echo base_url('index.php/admin/tambah_barang')?>",           
                        method:"POST",
                        data:new FormData(this),
                        contentType:false,
                        processData:false,
                        dataType : 'json',
                        success:function(data){                           
                            $('#myModal').modal('hide');
                            swal("Berhasil!", "Sukses tambah barang", "success");
                            data_barang();                 
                        },
                        error: function(jqxhr, status, exception) {
                             swal('Exception:', exception, "failed");
                        }
                    });
                }); 

                function data_barang(){
                    $.ajax({                
                        type  : 'GET',
                        url   : '<?php echo base_url('index.php/admin/show_barang')?>',
                        async : true,
                        dataType : 'json',
                        success : function(data){
                            var html = '';
                            var i;
                            for(i=0; i<data.length; i++){                              
                                html += '<tr>'+
                                        '<td class="mdl-data-table__cell--non-numeric" >'+(i+1)+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].nama_barang+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].nama_kategori+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].nama_brand+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].tahun_produksi+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].harga+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].ukuran+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].stok+'</td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric"><img src="../../assets/uploads/'+data[i].gambar1+'" width="80" width="80"> </td>'+
                                        '<td style="text-align:center; class="mdl-data-table__cell--non-numeric">'+data[i].keterangan+'</td>'+
                                        '<td style="text-align:center;">'+
                                        // '<button type="button" class="btn btn-success m-b-sm edt" id="'+data[i].id_pengusaha+'"data-toggle="modal" data-target="#myModal_edit"><i class="fa fa-edit"></i>Ubah</button>'+
                                        // '&nbsp;'+
                                        '<button type="button" class="btn btn-success m-b-sm ubah" id="'+data[i].id_barang+'"  "data-toggle="modal" data-target="#myModal_edit"><i class="fa fa-edit"></i> </button>'+
                                        '&nbsp'+                                       
                                        '<button type="button" class="btn btn-danger m-b-sm hapus" id="'+data[i].id_barang+'"  "data-toggle="modal" data-target="#myModal_hapus"><i class="fa fa-trash"></i> </button>'+
                                        '</td>'+                        
                                        '</tr>';                                              

                            }    
                                
                            $('#showdata').html(html); 
                            $("#tblBarang").DataTable();                   
                        }
                    });
                }

                $(document).on('click', '.ubah', function(){
                  id_edit = $(this).attr('id');                  
                  $.ajax({
                      type : "POST",
                      url  : "<?php echo base_url('index.php/admin/get_barang_id')?>",
                      dataType : "JSON",
                      data : {id_edit:id_edit},
                      success: function(data){
                       $.each(data,function(id_barang, nama_barang, id_kategori, id_brand, harga, tahun_produksi, stok,keterangan){
                           $('#myModal_edit').modal('show');

                           $("#mydropdownlist").val("thevalue");                             
                           $("#kategori_dropdown_ubah").val(data[0].id_kategori).change();                         
                           $("#brand_dropdown_ubah").val(data[0].id_brand).change();
                           // $('[name="pass_id_edit"]').val(data.id_alat_berat);
                           $('[name="nama_barang_ubah"]').val(data[0].nama_barang);
                           $('[name="harga_ubah"]').val(data[0].harga);
                           $('[name="tahun_ubah"]').val(data[0].tahun_produksi);                           
                           $('[name="stok_ubah"]').val(data[0].stok);
                           $('[name="keterangan_ubah"]').val(data[0].keterangan);
                           $("#ukuran_ubah").val(data[0].ukuran)
                           $("#ukuran_ubah_output").val(data[0].ukuran);
                       });                     
                      }
                  });                
                });

                $('#form_ubah').submit(function(event){  
                  event.preventDefault();   
                  var data = new FormData(this);
                  data.append("id_barang", id_edit);   
                  $.ajax({
                       url  : "<?php echo base_url('index.php/admin/ubah_barang')?>",           
                       method:"POST",
                       data: data,
                       contentType:false,
                       processData:false,
                      success:function(data){                
                        data_barang();                
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

                $(document).on('click', '.hapus', function(){
                  id_edit = $(this).attr('id');                  
                  $('#myModal_hapus').modal('show');               
                });

                $('#btnHapus').on('click', function(event){             
                    event.preventDefault();                      
                    $.ajax({
                        type : "POST",
                        url  : "<?php echo base_url('index.php/admin/hapus_barang')?>",
                        data: {id_edit: id_edit},                        
                        dataType : 'json',
                        success:function(data){                                   
                            $('#myModal_hapus').modal('hide');
                            swal("Berhasil!", "Berhasil Hapus data!", "success");                            
                            data_barang();
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