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
						  
							<?php if(empty($_GET['aranan_kelime'])){ //aranan öğrenci henüz yoksa ?>
						 
						<form class="form-horizontal" method="get">
						
							<div class="form-group">
								  <label class="col-sm-2 control-label">Üye Ara</label>
								  <div class="col-sm-6">
									  <input type="text" name="aranan_kelime" 
									  placeholder="Üye adına, T.C numarasına veya öğrenci numarasına göre arayın"
									  required class="form-control">
								  </div>
							</div>					
							<div class="col-lg-8">
							<button style="float:right;" type="submit" class="btn btn-primary">Üyeyi Bul</button>  
							</div>             	
						</form>
						
							<?php } if(isset($_GET['aranan_kelime'])) {
							
							$aranan_kelime=$_GET['aranan_kelime'];
							?>	
						  
						  <form class="form-horizontal" method="get">
						
							<div class="form-group">
								  <label class="col-sm-2 control-label">Üye Ara</label>
								  <div class="col-sm-6">
									  <input type="text" name="aranan_kelime" value="<?php echo $aranan_kelime; ?>" 
									  required class="form-control">
								  </div>
							</div>					
							<div class="col-lg-8">
							<button style="float:right;" type="submit" class="btn btn-primary">Üyeyi Bul</button>  
							</div>             	
						</form> 
						  
							  <div style="clear: both;"></div>
						  Bulunan Üyeler
						 <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th width="25%">Üye Adı</th>
                                 <th width="20%">Üye T.C</th>
                                 <th width="20%">Üye No</th>
                                 <th width="20%">Üyede Bulunan Kitap Sayısı</th>
                                 <th width="15%">İşlemler</th>
                              </tr>
                            
							<?php 
								$arananibul=$db->prepare("SELECT * FROM ogrencitablo 
								WHERE OgrenciTc LIKE '%$aranan_kelime%' OR 
								OgrenciAdi LIKE '%$aranan_kelime%' OR
								OgrenciNo LIKE '%$aranan_kelime%' ORDER BY OgrenciNo DESC");
								$arananibul->execute();
								while($gelenler=$arananibul->fetch(PDO::FETCH_ASSOC)){ 
							?>
								
                              <tr>                                 
                                 <td><?php echo $gelenler['OgrenciAdi'];?></td>
                                 <th ><?php echo $gelenler['OgrenciTc'];?></th>
                                 <th ><?php echo $gelenler['OgrenciNo'];?></th>
                                
							<?php
								$OgrenciTc=$gelenler['OgrenciTc'];											  
								$aldigikitaplar=$db->prepare("SELECT * FROM alinankitaplar 
								WHERE OgrenciTc=? and KitapDurum=?");
								$aldigikitaplar->execute(array($OgrenciTc,1));
								$kitap_say=$aldigikitaplar->rowCount();
							?>
								  
                                 <th ><?php echo $kitap_say;?></th>
                                 
                                 <td>
                                 <a class="btn btn-success" href="uye_goster.php?OgrenciAdi=<?php 
								 echo $gelenler['OgrenciAdi'];?>&OgrenciTc=<?php echo $OgrenciTc; 
								 ?>">Üyeyi Göster</a>                           
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