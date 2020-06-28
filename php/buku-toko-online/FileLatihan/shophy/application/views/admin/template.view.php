<!DOCTYPE html>
<html>
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title>Halaman Administrator</title>

<?php
//Memanggil function_html.php, file CSS dan library jQuery
   require_once ROOT."/application/functions/function_html.php";
   
   load_css('bootstrap/css/bootstrap.min.css');
   load_css('bootstrap-datepicker/css/bootstrap-datepicker3.min.css');
   load_css('dataTables/css/dataTables.bootstrap.min.css');
   load_css('css/admin.css');
   
   load_script('jquery/jquery-2.0.2.min.js');
?>   
   
</head>
<body>

<!-- Menu bar -->
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Administrator</a>
            <ul class="user-menu">
               <li class="dropdown pull-right">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                     <i class="glyphicon glyphicon-user"></i> 
                     User <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" role="menu">
<?php
//Membuat menu user
   create_menu("admin/profil", "file", "Profil");
   create_menu("admin/pengaturan", "cog", "Pengaturan");
   create_menu("admin/logout", "off", "Logout");
?>
                  </ul>
               </li>
            </ul>
         </div>
                     
      </div>
   </nav>
<!-- /Menu bar-->
      
<!-- Sidebar -->
   <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
      <ul class="nav menu">
<?php
//Membuat menu pada sidebar
   create_menu("admin", "dashboard", "Dashboard");
   create_menu("admin/kategori", "th-large", "Kategori");
   create_menu("admin/produk", "gift", "Produk");
   create_menu("admin/transaksi", "shopping-cart", "Transaksi");
   create_menu("admin/menu", "list", "Menu");
   create_menu("admin/informasi","info-sign", "Informasi");
   create_menu("admin/pesan","envelope", "Pesan");
   create_menu("admin/laporan","list-alt", "Laporan");
?>      
   
      </ul>
   </div>
<!-- /Sidebar-->

<!-- Content -->
   <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
      <div class="row">
         <ol class="breadcrumb">
            <li><a href="#"><i class="glyphicon glyphicon-home"></i></a></li>
            <li class="active"><?= $breadcrumb ?></li>
         </ol>
      </div>
   <?php
//Menampilkan konten halaman
      $view = new View($viewName);
      $view->bind('data', $data);
      $view->render();
   ?>      
   </div>
<!-- /Content-->

<?php
//Memanggil semua file javascript yang diperlukan
   load_script('bootstrap/js/bootstrap.min.js');
   load_script('bootstrap-datepicker/js/bootstrap-datepicker.min.js');
   load_script('dataTables/js/jquery.dataTables.min.js');
   load_script('dataTables/js/dataTables.bootstrap.min.js');
   load_script('tinymce/tinymce.min.js');
   load_script('chart/chart.min.js');
   load_script('js/tinymce.config.js');

//Memanggil file javascript untuk export laporan dengan dataTables
   load_script('dataTables/js/dataTables.buttons.min.js');  
   load_script('dataTables/js/buttons.bootstrap.min.js');  
   load_script('dataTables/js/jszip.min.js');
   load_script('dataTables/js/pdfmake.min.js');
   load_script('dataTables/js/vfs_fonts.js');
   load_script('dataTables/js/buttons.html5.min.js');
   load_script('dataTables/js/buttons.print.min.js');
 
?>
</body>
</html>
