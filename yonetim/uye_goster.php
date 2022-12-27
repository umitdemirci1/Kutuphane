<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Kitap Teslim Edecek Üye</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Ana Sayfa</a></li>					
					</ol>
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Kitap Verme Formu
                          </header>
                          <div class="panel-body">
              <!-- page start-->
              <?php 
															  
					$OgrenciTc=$_GET['OgrenciTc'];
					$OgrenciAdi=$_GET['OgrenciAdi'];	
					$uyeyi_sor=$db->prepare("SELECT * FROM ogrencitablo WHERE OgrenciTc=? ");
					$uyeyi_sor->execute(array($OgrenciTc));
					$uyeyi_cek=$uyeyi_sor->fetch(PDO::FETCH_ASSOC);
															  
			  ?>
      			<div id="profile" class="tab-pane active">
                                    <section class="panel">
                                      <div class="bio-graph-heading">
                                                Üye Bilgileri
                                      </div>
                                      <div class="panel-body bio-graph-info">
                                          <h1>Üye Bilgisi</h1>
                                          <div class="row">
                                              <div class="bio-row">
                                                  <p><span>Adı Soyadı </span>: <?php echo $uyeyi_cek['OgrenciAdi']; ?> </p>
                                              </div>                                          
                                             
                                              <div class="bio-row">
                                                  <p><span>T.C </span>: <?php  echo $uyeyi_cek['OgrenciTc'];  ?></p>
                                              </div>
                                               <div class="bio-row">
                                                  <p><span>NO </span>: <?php echo $uyeyi_cek['OgrenciNo']; ?></p>
                                              </div>
                                              <div class="bio-row">
                                                  <p><span>E-Posta </span>: <?php echo  $uyeyi_cek['OgrenciEposta'];  ?></p>
                                              </div>
                                           
                                          </div>
                                      </div>
                                    </section>
                                      <section>
                                          <div class="row">                                              
                                          </div>
                                      </section>
                                  </div>
                             <h4 style="color: green;">Üyede Şuan Bulunan Kitaplar</h4>     
                         <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th width="25%">Kitap Adı</th>
                                 <th width="15%">Teslim Alınan Tarih</th>
                                 <th width="15%">Verilmesi Gerekn Tarih</th>
                                 <th width="25%">Durum</th>                                  
                                 <th width="15%">İşlemler</th>
                              </tr>
                              <?php //iki tablodan veri almak için inner join var
								$kitap_bilgi_sor=$db->prepare("SELECT * FROM alinankitaplar 
								INNER JOIN kitaplartablo ON alinankitaplar.KitapID = kitaplartablo.KitapID 
								INNER JOIN ogrencitablo ON ogrencitablo.OgrenciTc = alinankitaplar.OgrenciTc 
								WHERE ogrencitablo.OgrenciTc=? ORDER BY 
								alinankitaplar.KitapDurum ASC");
								$kitap_bilgi_sor->execute(array($OgrenciTc));
								while($kitap_bilgi_cek=$kitap_bilgi_sor->fetch(PDO::FETCH_ASSOC)){						   
							   ?>
                              <tr>
                                 <td><?php echo $kitap_bilgi_cek['KitapAdi']; ?></td>
                                 <td><?php echo $kitap_bilgi_cek['KitapAlinmaTarihi']; ?></td>
                                 <td><?php echo $kitap_bilgi_cek['KitapTeslimTarihi']; ?></td>                             
								 <td><?php if($kitap_bilgi_cek['KitapDurum']==1){ ?><h4 style="color: red;">Verilmedi</h4>  
								 <?php } else { ?><h4 style="color: green;">Verildi</h4><?php } ?></td>       
                                 <td>
                                 <?php if($kitap_bilgi_cek['KitapDurum']==1){ ?>
                                 <a class="btn btn-success" href="islemler/tum_islemler.php?kitabi_al=al&KitapID=<?php 
								 echo $kitap_bilgi_cek['KitapID']; ?>&OgrenciTc=<?php echo $kitap_bilgi_cek['OgrenciTc']; 
								 ?>">Teslim AL</a>
                                 <?php } else { ?><a class="btn btn-success disabled" href="" >Teslim AL</a><?php } ?>                                 
                               
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