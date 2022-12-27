<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Kitaplar Listesi</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Anasayfa</a></li>					
					</ol>
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Kitap Listesi
                          </header>
                          <div class="panel-body">
						  <!-- page start-->
							<table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th width="48%">Kitap Adı</th>
                                 <th width="24%">Kategorisi</th>
                                 <th width="13%">StokSayısı</th>
                                 <th width="15%">İşlemler</th>
                              </tr>
                              <?php //iki tablodan veri almak için inner join var
								$kitap_bilgi_sor=$db->prepare("SELECT * FROM kitaplartablo INNER JOIN kategoritablo ON 
								kitaplartablo.KategoriID= kategoritablo.KategoriID ORDER BY KitapID DESC");
								$kitap_bilgi_sor->execute();
								while($kitap_bilgi_cek=$kitap_bilgi_sor->fetch(PDO::FETCH_ASSOC)){						   
							   ?>
                              <tr>
                                 <td><?php echo $kitap_bilgi_cek['KitapAdi']; ?></td>
                                 <td><?php echo $kitap_bilgi_cek['KategoriAdi']; ?></td>
                                 <td><?php echo $kitap_bilgi_cek['GuncelStokSayisi']; ?></td>
                                 <td>
                                 <a class="btn btn-success" href="kitap_guncelle.php?KitapID=<?php echo $kitap_bilgi_cek['KitapID']; ?>">Güncelle</a>
                                 <a class="btn btn-danger" href="islemler/tum_islemler.php?kitap_sil=1&KitapID=<?php echo $kitap_bilgi_cek['KitapID']; ?>">Sil</a>
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