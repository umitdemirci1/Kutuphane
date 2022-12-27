<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Kategori Listesi</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Ana Sayfa</a></li>					
					</ol>
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Kategori Listesi
                          </header>
                          <div class="panel-body">
						  <!-- page start-->
						<table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th width="85%">Kategori Adı</th>
                                 <th width="15%">İşlemler</th>
                              </tr>
                              <?php
							    $kategorileri_sor=$db->prepare("SELECT * FROM kategoritablo ORDER BY KategoriID DESC");
								$kategorileri_sor->execute();
								while($kategorileri_cek=$kategorileri_sor->fetch(PDO::FETCH_ASSOC)){
							   ?>
                              <tr>                                 
                                 <td><?php echo $kategorileri_cek['KategoriAdi']; ?></td>
                                 <td>
	 <a class="btn btn-success" href="kategori_guncelle.php?KategoriID=<?php echo $kategorileri_cek['KategoriID']; ?>">Güncelle</a>
                                 <a class="btn btn-danger" href="islemler/tum_islemler.php?KategoriID=<?php echo $kategorileri_cek['KategoriID']; ?>&katesil=katesil">Sil</a>                                
                                </td>
                              </tr> 
                              <?php } ?>                             
                           </tbody>
                        </table>
						  <!-- page end-->
					 	</div>
             	 </div>
            </div>
             
          </section>
      </section>
      <!--main content end-->
      <?php include("parca/footer.php"); ?>
 <?php } else { echo "Erişim Engellendi...!!!"; } ?>