<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Üye Ekleme Formu</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Anasayfa</a></li>					
					</ol>
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Üye Ekleme Formu
                          </header>
                          <div class="panel-body">
						  <!-- page start-->
						  <?php
								if(empty($_GET['tcvar'])){
							  ?>
						  <form class="form-validate form-horizontal" id="feedback_form" method="post" action="islemler/tum_islemler.php">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Üye Adı <span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="cname" name="ogrenciadi" maxlength="30" type="text" required />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Üye E-Mail <span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class="form-control " id="cemail" type="email" maxlength="40" name="ogrencimail" required />
                                          </div>
                                      </div>                                     
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Üye T.C <span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="subject" name="ogrencitc" minlength="11" maxlength="11" type="number" required />
                                          </div>
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Üye No</label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="subject" name="ogrencino" type="number" minlength="11" maxlength="11" required />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button name="uye_ekle" class="btn btn-primary" type="submit">Üyeyi Ekle</button>
                                          </div>
                                      </div>
                                  </form>
                                  <?php } ?>
                                 <?php if(isset($_GET['tcvar'])) {
							  	$ogrenciadi=$_GET["ogrenciadi"];
								$ogrencimail=$_GET["ogrencimail"];
								$ogrencitc=$_GET["ogrencitc"];
								$ogrencino=$_GET["ogrencino"];
							  
							  ?> 
                          <form class="form-validate form-horizontal" id="feedback_form" method="post" action="islemler/tum_islemler.php">
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Üye Adı <span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="cname" name="ogrenciadi" maxlength="30" type="text" required value="<?php echo $ogrenciadi; ?>" />
                                          </div>
                                      </div>
                                      <div class="form-group ">
                                          <label for="cemail" class="control-label col-lg-2">Üye E-Mail <span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class="form-control " id="cemail" type="email" maxlength="40" name="ogrencimail" required value="<?php echo $ogrencimail; ?>" />
                                          </div>
                                      </div>                                     
                                      <div class="form-group ">
                                          <label for="cname" class="control-label col-lg-2">Üye T.C <span class="required">*</span></label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="subject" name="ogrencitc" minlength="12" maxlength="12" type="number" value="<?php echo $ogrencitc; ?>" required />
                                              <span style="color: red;" class="help-block">Bu T.C zaten kayıtlı!..</span>
                                          </div>
                                      </div>                                      
                                      <div class="form-group ">
                                          <label for="ccomment" class="control-label col-lg-2">Üye No</label>
                                          <div class="col-lg-6">
                                              <input class="form-control" id="subject" name="ogrencino" type="number" minlength="12" maxlength="12" value="<?php echo $ogrencino; ?>" required />
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button name="uye_ekle" class="btn btn-primary" type="submit">Üyeyi Ekle</button>
                                          </div>
                                      </div>
                                  </form>
                                  <?php } ?>
						  <!-- page end-->
					 	</div>
             	 </div>
            </div>
             
          </section>
      </section>
      <!--main content end-->
      <?php include("parca/footer.php"); ?>
  <?php } else { echo "Erişim Engellendi...!!!"; } ?>