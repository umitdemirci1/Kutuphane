<!DOCTYPE html>
<?php
include("islemler/db_baglan.php");
?>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Kütüphane Otomasyonu</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
	<link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <!-- owl carousel -->
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
	<link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
	<link rel="stylesheet" href="css/fullcalendar.css">
	<link href="css/widgets.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
	<link href="css/xcharts.min.css" rel=" stylesheet">	
	<link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    
  </head>

  <body>
  <!-- container section start -->
  <section style="margin-top: -20px;" id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-placement="bottom"><i class="icon_menu"></i></div>
            </div>

            <!--logo start-->
               <a href="index.php" class="logo">Kütüphane <span class="lite">Otomasyonu</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
              <!-- <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Ara" type="text">
                        </form>
                    </li>                    
                </ul> -->
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                 
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="img/userr.jpg">
                            </span>
                            <span class="username">Admin</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>                     
                            <li>
                                <a href="cikis.php"><i class="fa fa-sign-out"></i>Çıkış</a>
                            </li>
                           
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li
                    <?php if(isset($_GET["aktif"])){}else{ ?>class="active"<?php } ?>
                     >
                      <a class="" href="index.php">
                          <i class="icon_house_alt"></i>
                          <span>Ana Sayfa</span>
                      </a>
                  </li>
                  <li class="sub-menu <?php if(isset($_GET['aktif'])){if($_GET['aktif']=='kitapislemleri'){ echo 'active'; }}?>">
                      <a href="javascript:;" class="">
                          <i class="fa fa-book"></i>
                          <span>Kitap İşlemleri</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                       <ul class="sub">
                          <li><a href="kitap_ekle.php?aktif=kitapislemleri">Kitap Ekle</a></li>
                          <li><a class="" href="kitap_listesi.php?aktif=kitapislemleri">Kitap Listesi</a></li> 
                                                  
                      </ul>
                  </li>
                   <li class="sub-menu <?php if(isset($_GET['aktif'])){if($_GET['aktif']=='uyeislemleri'){ echo 'active'; }}?>">
                      <a href="javascript:;" class="">
                           <i class="fa fa-users"></i>
                          <span>Üye İşlemleri</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="uye_ekle.php?aktif=uyeislemleri">Üye Ekleme</a></li>                          
                          <li><a class="" href="uyeler_listesi.php?aktif=uyeislemleri">Üyeler Listesi</a></li>
                      </ul>
                  </li>
                   			      
                    
                   <li class="sub-menu <?php if(isset($_GET['aktif'])){if($_GET['aktif']=='kateislemleri'){ echo 'active'; }}?>">
                      <a href="javascript:;" class="">
                         <i class="fa fa-bars"></i>
                          <span>Kategori İşlemleri</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                           <li><a class="" href="kategori_ekle.php?aktif=kateislemleri">Kategori Ekle</a></li>                          
                          <li><a class="" href="kategori_listesi.php?aktif=kateislemleri">Kategori Listesi</a></li> 
                      </ul>
                  </li>   
                  <li class="sub-menu <?php if(isset($_GET['aktif'])){if($_GET['aktif']=='yonetim'){ echo 'active'; }}?>">
                      <a href="javascript:;" class="">
                         <i class="fa fa-cogs"></i>
                          <span>Yönetim</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="kullanici_ekle.php?aktif=yonetim">Kullanıcı Ekle</a></li>                          
                          <li><a class="" href="kullanici_listesi.php?aktif=yonetim">Kullanıcı Listesi</a></li>
                      </ul>
                  </li> 
                  <li>
                      <a class="" style="background-color:#4E0708;" href="cikis.php">
                          <i class="fa fa-sign-out"></i>
                          <span>Çıkış</span>
                      </a>
                  </li>
              
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->