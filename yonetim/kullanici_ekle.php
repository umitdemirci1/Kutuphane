<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Kullanıcı Ekle</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Ana Sayfa</a></li>					
					</ol>
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Kullanıcı Ekleme Formu
                          </header>
                          <div class="panel-body">
						  <!-- page start-->
						  <form class="form-horizontal" action="islemler/tum_islemler.php" method="post">
						   
							<div class="form-group">
								  <label class="col-sm-2 control-label">Kullanıcı Adı</label>
								  <div class="col-sm-6">
									  <input type="text" required name="KullaniciAdi" class="form-control" maxlength="30">
								  </div>
							</div>
						 <div class="form-group">
								  <label class="col-sm-2 control-label">Kullanıcı Şifresi</label>
								  <div class="col-sm-6">
									  <input type="text" required name="KullaniciSifre" class="form-control" maxlength="16">
								  </div>
							</div> 
						 <button type="submit" name="kullanici_ekle" class="btn btn-primary">Yeni Kullanıcıyı Ekle</button>              	
						  </form>
						  <!-- page end-->
					 	</div>
             	 </div>
            </div>
             
          </section>
      </section>
      <!--main content end-->
      <?php include("parca/footer.php"); ?>
  <?php } else { echo "Erişim Engellendi...!!!"; } ?>