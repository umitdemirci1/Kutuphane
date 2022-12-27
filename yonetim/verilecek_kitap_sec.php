<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Verilecek Kitap</h3>
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
							
							@$OgrenciAdi=$_GET['OgrenciAdi'];//@ işareti uyarı gizler
							@$OgrenciTc=$_GET['OgrenciTc'];								  
															  
							if(empty($_GET['aranan_kelime'])){ ?>
						  <form class="form-horizontal" method="get" >
							<div class="form-group">
                                      <label class="col-lg-2 control-label">Seçilen Üye</label>
                                      <div class="col-lg-10">
                                          <p class="form-control-static"><i style="color:blue;"><?php echo $OgrenciAdi ;?></i></p>
                                      </div>
                                  </div>
							<div class="form-group">
								  <label class="col-sm-2 control-label">Kitap Ara</label>
								  <div class="col-sm-6">
									  <input type="text" name="aranan_kelime" placeholder="kitabı ara" required class="form-control">
								  </div>
							</div>	
							<input type="hidden" name="OgrenciAdi" value="<?php echo $OgrenciAdi; ?>">
							<input type="hidden" name="OgrenciTc" value="<?php echo $OgrenciTc; ?>">					
							<div class="col-lg-8">
							
							<button style="float:right;" type="submit" class="btn btn-primary">Kitabı Bul</button>  
							</div>             	
						</form>
						<?php } if(isset($_GET['aranan_kelime'])) {
							
							$aranan_kelime=$_GET['aranan_kelime'];
							@$OgrenciAdi=$_GET['OgrenciAdi'];
							@$OgrenciTc=$_GET['OgrenciTc'];
						?>	
						  
						<form class="form-horizontal" method="get">
						
							<div class="form-group">
								  <label class="col-sm-2 control-label">Kitap Ara</label>
								  <div class="col-sm-6">
									  <input type="text" name="aranan_kelime" placeholder="kitabın adı" value="<?php echo $aranan_kelime; ?>" required class="form-control">
								  </div>
							</div>
							<input type="hidden" name="OgrenciAdi" value="<?php echo $OgrenciAdi; ?>">
							<input type="hidden" name="OgrenciTc" value="<?php echo $OgrenciTc; ?>">						
							<div class="col-lg-8">
							<button style="float:right;" type="submit" class="btn btn-primary">Kitabı Bul</button>  
							</div>             	
						</form> 
							  <div style="clear: both;"></div>
						  Bulunan Kitap
						 <table class="table table-striped table-advance table-hover">
                           <tbody>
                              <tr>
                                 <th width="15%">Kitap Adı</th>
                                 <th width="15%">Kitap Stok</th> 
                                 <th width="15%">Kitabı Alacak Üye</th>
								 <th width="25%">Üyenin T.C'si</th>
                                 <th width="30%">İşlemler</th>
                              </tr>
                              <?php 
								
								$arananibul=$db->prepare("SELECT * FROM kitaplartablo WHERE KitapAdi LIKE '%$aranan_kelime%'");
								$arananibul->execute();
								while($gelenler=$arananibul->fetch(PDO::FETCH_ASSOC)){ ?>
                              
							  <tr>                                 
                                 <td><?php echo $gelenler['KitapAdi'];?></td>
                                 <th><?php echo $gelenler['GuncelStokSayisi'];?></th>
                           		 <th><?php echo $OgrenciAdi;?></th>
								 <th><?php echo $OgrenciTc;?></th>
                                 <td>
                                 <a class="btn btn-success" 
								 href="islemler/tum_islemler.php?kitabi_ver=ver&OgrenciTc=<?php echo $OgrenciTc;
								 ?>&KitapID=<?php echo $gelenler['KitapID'];?>">Kitabı ver</a>                           
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