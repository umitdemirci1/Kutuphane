<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Kategori Güncelleme</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Ana Sayfa</a></li>					
					</ol>
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Kategori Güncelleme Formu
                          </header>
                          <div class="panel-body">
						  <!-- page start-->
						  <?php
							$KategoriID = $_GET['KategoriID'];
							$idyegore_kate_sor=$db->prepare("SELECT * FROM kategoritablo WHERE KategoriID=?");
							$idyegore_kate_sor->execute(array($KategoriID));
							$idyegore_kate_cek=$idyegore_kate_sor->fetch(PDO::FETCH_ASSOC);
						  ?>
						  <form class="form-horizontal" action="islemler/tum_islemler.php?KategoriID=<?php echo $KategoriID; ?>" method="post">
							
							<div class="form-group">
								  <label class="col-sm-2 control-label">Kategori Adı</label>
								  <div class="col-sm-6">
									  <input type="text" name="KategoriAdi" required value="<?php echo $idyegore_kate_cek['KategoriAdi']; ?>" class="form-control">
								  </div>
							</div>
						 
						 <button  name="kategori_guncelle"  type="submit" class="btn btn-primary">Kategoriyi Güncelleme</button>              	
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