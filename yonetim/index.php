<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i> Ana Sayfa</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Anasayfa</a></li>					
					</ol>
				</div>
			</div>
              <!-- page start-->
              <div class="row">
              <a href="kitap_verilecek_uye.php">
              	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-book"></i>
						<div class="count">Kitap</div>
						<div class="title">Verme</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
			</a>
			     <a href="kitap_alinacak_uye.php">
              	<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
					<div class="info-box green-bg">
						<i class="fa fa-check"></i>
						<div class="count">Kitap</div>
						<div class="title">Alma</div>						
					</div><!--/.info-box-->			
				</div><!--/.col-->
			</a>
				
			</div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      <?php include("parca/footer.php"); ?>
 <?php } else { echo "Erişim Engellendi...!!!"; } ?>