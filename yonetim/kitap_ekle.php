<?php session_start(); if (isset($_SESSION["KullaniciAdi"])) { ?>
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>KİTAP EKLEME FORMU</h3>
					<ol class="breadcrumb">
						<li><i class="fa fa-home"></i><a href="index.php">Ana Sayfa</a></li>					
					</ol>
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             Kitap Ekleme Formu
                          </header>
                          <div class="panel-body">
						  <!-- page start-->
						  <form class="form-horizontal" action="islemler/tum_islemler.php" method="post">
						   <div class="form-group">
							  <label class="control-label col-lg-2" for="inputSuccess">Kategori Seçin:</label>
							  <div class="col-lg-6">
<select name="KategoriID" required class="form-control m-bot15">
<option value="">Kategori Seçilmedi</option>
<?php
$kategorileri_sor=$db->prepare("SELECT * FROM kategoritablo ORDER BY KategoriID DESC");
$kategorileri_sor->execute();
while($kategorileri_cek=$kategorileri_sor->fetch(PDO::FETCH_ASSOC))
{ ?>
<option value="<?php echo $kategorileri_cek['KategoriID']; ?>"><?php echo $kategorileri_cek['KategoriAdi']; ?></option>
<?php } ?>
</select>
							  </div>
						  </div>
							<div class="form-group">
								  <label class="col-sm-2 control-label">Kitap Adı</label>
								  <div class="col-sm-6">
									  <input type="text" required name="KitapAdi" class="form-control">
								  </div>
							</div>
						 <div class="form-group">
								  <label class="col-sm-2 control-label">Stok Adeti :</label>
								  <div class="col-sm-2">
									  <input type="number" name="StokSayisi" required class="form-control">
								  </div>
							</div>  
							
							
							<div id="editor" name="KitapAciklamasi" class="btn-toolbar cke_editable cke_editable_inline cke_contents_ltr"
							data-role="editor-toolbar" data-target="#editor" contenteditable="true" 
							tabindex="0" spellcheck="false" style="position: relative;" role="textbox" 
							aria-label="Zengin Metin Editörü, editor" title="Zengin Metin Editörü, editor" 
							aria-describedby="cke_48"><p><br></p></div>
							
							
							
						 <button type="submit" name="kitap_ekle" class="btn btn-primary">Yeni Kitabı Ekle</button>              	
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