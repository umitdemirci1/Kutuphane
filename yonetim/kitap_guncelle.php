<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Kitap Güncelleme</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Ana Sayfa</a></li>					
					</ol>
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Kitap Güncelleme Formu
                          </header>
            <div class="panel-body">
						  <!-- page start-->
						  
						    <?php //alındı
								$KitapID=$_GET['KitapID'];						  
								$kitap_bilgi_sor=$db->prepare("SELECT * FROM kategoritablo INNER JOIN kitaplartablo ON kitaplartablo.KategoriID = kategoritablo.KategoriID where kitaplartablo.KitapID=?");
								$kitap_bilgi_sor->execute(array($KitapID));
								$kitap_bilgi_cek=$kitap_bilgi_sor->fetch(PDO::FETCH_ASSOC);					   
							?>
							
				<form class="form-horizontal" method="post" action="islemler/tum_islemler.php?KitapID=<?php echo  $KitapID ; ?>">
						 
						 <div class="form-group">
							  <label class="control-label col-lg-2" for="inputSuccess">Kategori Seçin:</label>
							  <div class="col-lg-6">
					
					<select name="KategoriID" class="form-control m-bot15">
						
		<option value="<?php echo $kitap_bilgi_cek['KategoriID']; ?>"><?php echo $kitap_bilgi_cek['KategoriAdi']; ?></option>
			<?php
			$kategorileri_sor=$db->prepare("SELECT * FROM kategoritablo ORDER BY KategoriID DESC");
			$kategorileri_sor->execute();
			while($kategorileri_cek=$kategorileri_sor->fetch(PDO::FETCH_ASSOC))
			{ ?>
						<?php if($kategorileri_cek['KategoriID']!=$kitap_bilgi_cek['KategoriID']){ ?>
							<option value="<?php echo $kategorileri_cek['KategoriID']; ?>">
							<?php echo $kategorileri_cek['KategoriAdi'];?></option>
						<?php } ?>
		<?php } ?>
					</select>
					
						</div>
						  </div>
							<div class="form-group">
								  <label class="col-sm-2 control-label">Kitap Adı:</label>
								  <div class="col-sm-6">
									  <input type="text" required name="KitapAdi" value="<?php echo $kitap_bilgi_cek['KitapAdi']; ?>" class="form-control">
								  </div>
							</div>
						 <div class="form-group">
								  <label class="col-sm-2 control-label">Stok Adeti:</label>
								  <div class="col-sm-2">
									  <input type="number" name="StokSayisi"  value="<?php echo $kitap_bilgi_cek['StokSayisi']; ?>" required class="form-control">
								  </div>
						 </div> 
							<div class="form-group">
								  
									<textarea name="KitapAciklamasi" cols="150" rows="15"><?php echo $kitap_bilgi_cek['KitapAciklamasi']; ?></textarea>
								  
							</div>
					
						
						 <button type="submit" name="kitap_guncelle" class="btn btn-primary">Kitabı Güncelle</button>              	
						 

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