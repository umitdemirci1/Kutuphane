<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Kullanıcı Listesi</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Ana Sayfa</a></li>					
					</ol>
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Kullanıcı Listesi
                          </header>
                          <div class="panel-body">
						  <!-- page start-->
							<table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th width="80%">Kullanıcı Adı</th>
                                                          
                                 <th width="20%">İşlemler</th>
                              </tr>
                           <?php
							    $kullanici_sor=$db->prepare("SELECT * FROM kullanici ORDER BY KullaniciID DESC");//order by ile ıd si büyükten küçüğe sıralar
								$kullanici_sor->execute();
								while($kullanici_cek=$kullanici_sor->fetch(PDO::FETCH_ASSOC)){
							   ?>
                              <tr>
                                 <td><?php echo $kullanici_cek['KullaniciAdi']; ?></td>
                                                    
                                 <td>                                 
                                 <a class="btn btn-success" href="kullanici_guncelle.php?KullaniciID=<?php echo $kullanici_cek['KullaniciID']; ?>">Güncelle</a>
                                 <a class="btn btn-danger" href="islemler/tum_islemler.php?kullanicisil=1&KullaniciID=<?php echo $kullanici_cek['KullaniciID']; ?>">Sil</a>
                               
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