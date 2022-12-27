<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Üye Güncelleme</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Ana Sayfa</a></li>					
					</ol>
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Üye Güncelleme Formu
                          </header>
                          <div class="panel-body">
						  <!-- page start-->
						   <?php
								$OgrenciTc=$_GET['OgrenciTc'];
							    $ogrenci_sor=$db->prepare("SELECT * FROM ogrencitablo WHERE OgrenciTc=? ");
								$ogrenci_sor->execute(array($OgrenciTc));
								$ogrenci_cek=$ogrenci_sor->fetch(PDO::FETCH_ASSOC);
							   ?>
						  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="islemler/tum_islemler.php?OgrenciTc=<?php echo $OgrenciTc; ?>">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Üye Adı <span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="cname" name="ogrenciadi" minlength="1" maxlength="26" type="text" value="<?php echo $ogrenci_cek['OgrenciAdi']; ?>" required /><!-- value inputun içindeki değer demekmiş. Biz de degerin içini veri tabanından gelen değeri yazıyoruz -->
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Üye E-Mail <span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class="form-control " id="cemail" value="<?php echo $ogrenci_cek['OgrenciEposta']; ?>" type="email" name="ogrencimail" maxlength="40" required />
                                          </div>
                                      </div>                                     
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Üye T.C <span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="subject" value="<?php echo $ogrenci_cek['OgrenciTc']; ?>" name="ogrencitc"  maxlength="11" type="number" required />
                                          </div>
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Üye No</label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="subject" value="<?php echo $ogrenci_cek['OgrenciNo']; ?>" name="ogrencino" maxlength="11" type="number" required />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button class="btn btn-primary" name="uye_guncelle" type="submit">Üyeyi Güncelle</button>
                                          </div>
                                      </div>
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