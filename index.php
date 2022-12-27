
      <?php include("parca/header.php"); ?>
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
		  <div class="row">
				<div class="col-lg-12">
					<h3 class="page-header"><i class="fa fa fa-bars"></i>Kitaplar Listesi</h3>
					
				</div>
			</div>
			<div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header style="height: 70px; padding-top: 2px;" class="panel-heading">
                            <form>                            	
						<div class="form-group">
						<label class="control-label col-lg-2" for="inputSuccess">Kategori Ara :</label>
							<div class="col-lg-3">
								<select onChange="window.location.href=this.value;" name="KategoriID" required class="form-control m-bot15">
								<option value="">Kategori Seçilmedi</option>
								
								<?php
								$kategorileri_sor=$db->prepare("SELECT * FROM kategoritablo ORDER BY KategoriID DESC");
								$kategorileri_sor->execute();
								while($kategorileri_cek=$kategorileri_sor->fetch(PDO::FETCH_ASSOC))
								{ ?>
							
								<option value="aranan.php?kategore=ara&KategoriID=<?php echo $kategorileri_cek['KategoriID']; ?>"><?php echo $kategorileri_cek['KategoriAdi']; ?></option>
								<?php } ?>
								
								</select>
							</div>
						</div>                            	
                            </form>                            
                    			<form class="form-inline" action="aranan.php"  method="get">
                                  <div class="form-group">
                                      
                                      <input type="text" required class="form-control" name="aranan_kelime" placeholder="Kitap Adı Yazın">
                                  </div>
                                
                                 
                                  <button type="submit" name="aranan_kitap" class="btn btn-primary">Ara</button>
                              </form>
                          </header>
                    
                          <div class="panel-body">
						  <!-- page start-->
						
					  	<h4>Tüm Kitaplar Listesi</h4>
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
                                 <a role="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $kitap_bilgi_cek['KitapID'] ?>"  >Kitap Bilgisi</a>
                                  </td>
                              </tr>
	<div class="modal fade" id="myModal<?php echo $kitap_bilgi_cek['KitapID']; ?>" tabindex="-1" role="dialog">
	  <div class="modal-dialog" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<h4 class="modal-title">Bilgi !</h4>
		  </div>
		  <div class="modal-body">
		  
		  <?php echo $kitap_bilgi_cek['KitapAciklamasi']; ?>
		
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>			
		  </div>
		</div>
	  </div>
	</div>
	<!-- Sentence düzenle -->
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
 