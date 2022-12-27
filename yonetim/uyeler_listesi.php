<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Üyeler Listesi</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Anasayfa</a></li>					
					</ol>
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header style="height: 50px; padding-top: 5px;" class="panel-heading">
                           
                             <form class="form-inline" name="aranan_uye" method="get">
                                  <div class="form-group">
                                      
                                      <input type="text" required class="form-control" name="aranan_kelime" placeholder="Üye Arayın">
                                  </div>
                                
                                 
                                  <button type="submit" class="btn btn-primary">Ara</button>
                              </form>
                          </header>
                          <div class="panel-body">
						  <!-- page start-->
						  <?php if(empty($_GET['aranan_kelime'])){ ?>
							<table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th width="30%">Üyeler Adı</th>
                                 <th width="25%">Üye T.C</th>
                                 <th width="22%">Üye No</th>
                                 <th width="23%">İşlemler</th>
                              </tr>
                              <?php
							    $ogrenci_sor=$db->prepare("SELECT * FROM ogrencitablo ORDER BY OgrenciNo DESC");//order by ile id i büyükten küçüğe sıralar
								$ogrenci_sor->execute();
								while($ogrenci_cek=$ogrenci_sor->fetch(PDO::FETCH_ASSOC)){
							   ?>
                              <tr>
                                  <td><?php echo $ogrenci_cek['OgrenciAdi']; ?></td>
                                  <td><?php echo $ogrenci_cek['OgrenciTc']; ?></td>
                                  <td><?php echo $ogrenci_cek['OgrenciNo']; ?></td>
								  <td>
<a class="btn btn-info" href="uye_goster.php?OgrenciAdi=<?php echo $ogrenci_cek['OgrenciAdi']; ?>&OgrenciTc=<?php echo $ogrenci_cek['OgrenciTc']; ?>">Üyeyi Göster</a>
<a class="btn btn-success" href="uye_guncelle.php?OgrenciTc=<?php echo $ogrenci_cek['OgrenciTc']; ?>">Güncelle</a>
<a class="btn btn-danger" href="islemler/tum_islemler.php?uyesil=1&OgrenciTc=<?php echo $ogrenci_cek['OgrenciTc']; ?>">Sil</a>
								  </td>
                              </tr> 
                              <?php } ?>                             
                           </tbody>
                        </table>
                        <?php } if(isset($_GET['aranan_kelime'])){ ?>
                        <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th width="30%">Üyeler Adı</th>
                                 <th width="25%">Üye T.C</th>
                                 <th width="22%">Üye No</th>
                                 <th width="23%">İşlemler</th>
                              </tr>
                              <?php
								$aranan_kelime=$_GET['aranan_kelime'];
							    $ogrenci_sor=$db->prepare("SELECT * FROM ogrencitablo WHERE OgrenciTc LIKE '%$aranan_kelime%' OR OgrenciAdi LIKE '%$aranan_kelime%' OR OgrenciNo LIKE '%$aranan_kelime%' ORDER BY OgrenciNo DESC");//order by ile ıd si büyükten küçüğe sıralar ORDER BY tablo DESC
								$ogrenci_sor->execute();
								while($ogrenci_cek=$ogrenci_sor->fetch(PDO::FETCH_ASSOC)){
							   ?>
                              <tr>
                                  <td><?php echo $ogrenci_cek['OgrenciAdi']; ?></td>
                                  <td><?php echo $ogrenci_cek['OgrenciTc']; ?></td>
                                  <td><?php echo $ogrenci_cek['OgrenciNo']; ?></td>
								  <td>
<a class="btn btn-info" href="uye_goster.php?OgrenciAdi=<?php echo $ogrenci_cek['OgrenciAdi']; ?>&OgrenciTc=<?php echo $ogrenci_cek['OgrenciTc']; ?>">Üyeyi Göster</a>
<a class="btn btn-success" href="uye_guncelle.php?OgrenciTc=<?php echo $ogrenci_cek['OgrenciTc']; ?>">Güncelle</a>
<a class="btn btn-danger" href="islemler/tum_islemler.php?uyesil=1&OgrenciTc=<?php echo $ogrenci_cek['OgrenciTc']; ?>">Sil</a>
								  </td>
                              </tr> 
                              <?php } ?>                             
                           </tbody>
                        </table>
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