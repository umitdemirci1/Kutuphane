<?php session_start();
include("db_baglan.php");

//login işlem Başlangıç s
if(isset($_POST['login']))
{	
	
	$uyeadi=$_POST["KullaniciAdi"];
	$password=$_POST["KullaniciSifre"];
	if($uyeadi && $password)
	{
		
		$kullanicisor=$db->prepare("SELECT * FROM kullanici WHERE KullaniciAdi=? and KullaniciSifre=?");
		$kullanicisor->execute(array($uyeadi,$password));
		$kullanici_cek=$kullanicisor->fetch(PDO::FETCH_ASSOC);
		
		$say=$kullanicisor->rowCount();		
		if($say>0){
			session_start();
			$_SESSION["KullaniciAdi"] = $uyeadi;
			header('Location: ../index.php?giris=basarili');
		}else{
			header('Location: ../../login.html?giris=yanlis');
		}
	}else{
		header('Location: ../../login.html?durum=no');
	}	

}
//login işlem  bitiş 
/*--------------------------------------------------------------------------------------*/
//kategori eklme
if(isset($_POST['kategori_ekle'])){
	
	$KategoriAdi=$_POST["KategoriAdi"];

	
	$sql= "INSERT INTO kategoritablo(KategoriAdi) VALUES (?)";
	$kategori_insert=$db->prepare($sql)->execute(array($KategoriAdi));	
	if($kategori_insert){
		
		header("location: ../kategori_ekle.php?aktif=kateislemleri");
	}else{
		header("location: ../adres?durum=no");
	}	
}
//kategori ekleme bitiş

//kategori güncelleme işlemleri başlangıç
if(isset($_POST['kategori_guncelle'])){
		
	$KategoriAdi=$_POST["KategoriAdi"];
	$KategoriID=$_GET['KategoriID'];
		
	$sql= "UPDATE kategoritablo SET KategoriAdi = ? WHERE KategoriID = ?";
	$update=$db->prepare($sql)->execute(array($KategoriAdi,$KategoriID));	
	if($update){		
		
	 header("location: ../kategori_listesi.php");
		   
	}else{
		header("location: ../kategori_listesi.php");
	}	
}
//kategori güncelleme işlemleri bitiş

//kategori silme işlemleri
if(isset($_GET['katesil'])){		
		$KategoriID=$_GET["KategoriID"];
		

		$sql ="DELETE FROM kategoritablo WHERE KategoriID = ?";
		$delete=$db->prepare($sql)->execute([$KategoriID]);
		if($delete){		
			header("location: ../kategori_listesi.php");
		}else{
			header("location: ../kategori_listesi.php");
		}		
	}
//kategori silme bitir
/*-------------------------------------------------------------------------------------------------------------*/
// $bugununtarihi=date('d.m.Y');

//üye ekleme
if(isset($_POST['uye_ekle'])){ //eksik

	$ogrenciadi=$_POST["ogrenciadi"];
	$ogrencimail=$_POST["ogrencimail"];
	$ogrencitc=$_POST["ogrencitc"];
	$ogrencino=$_POST["ogrencino"];

	
		$varmi=$db->prepare("SELECT * FROM ogrencitablo WHERE OgrenciTc=? or OgrenciNo=?");
		$varmi->execute(array($ogrencitc,$ogrencino));
		$kullanici_cek=$varmi->fetch(PDO::FETCH_ASSOC);
		
		$say2=$varmi->rowCount();		
		if($say2>0){
			header("location: ../uye_ekle.php?ogrenciadi=$ogrenciadi&ogrencimail=$ogrencimail&ogrencitc=$ogrencitc&ogrencino=$ogrencino&tcvar=var");
		}
		else {
			$sql= "INSERT INTO ogrencitablo(OgrenciAdi,OgrenciEposta,OgrenciTc,OgrenciNo) VALUES (?,?,?,?)";
			$uye_insert=$db->prepare($sql)->execute(array($ogrenciadi,$ogrencimail,$ogrencitc,$ogrencino));	
				if($uye_insert){
									header("location: ../uye_ekle.php?aktif=uyeislemleri");
								}
				else{
						header("location: ../uye_ekle.php?durum=no");
					}					
		}

}
//üye ekleme işlemi bitti

//üye güncelleme
if(isset($_POST['uye_guncelle'])){ 
		
	$OgrenciTc=$_GET['OgrenciTc']; //iki farklı tc değişkeni var. İlki sorgudan alınan ikincisi ise veri tabanında değiştirmek için tutulanıdır. 
		
	$ogrenciadi=$_POST["ogrenciadi"];
	$ogrencimail=$_POST["ogrencimail"];
	$ogrencitc=$_POST["ogrencitc"];
	$ogrencino=$_POST["ogrencino"];
	
	$sql= "UPDATE ogrencitablo SET OgrenciAdi = ?, OgrenciEposta=?, OgrenciTc=?, OgrenciNo=?  WHERE OgrenciTc = ?";
	$update=$db->prepare($sql)->execute(array($ogrenciadi,$ogrencimail,$ogrencitc,$ogrencino,$OgrenciTc));	
	if($update){		
		
	 header("location: ../uyeler_listesi.php");
		   
	}else{
		header("location: ../uyeler_listesi.php?durum=basarisiz");
	}	
}
//üye güncelleme bitti

//üye silme
	if(isset($_GET['uyesil'])){		
		$OgrenciTc=$_GET['OgrenciTc'];

		$sql ="DELETE FROM ogrencitablo WHERE OgrenciTc = ?";
		$delete=$db->prepare($sql)->execute([$OgrenciTc]);
		if($delete){		
			header("location: ../uyeler_listesi.php");
		}else{
			header("location: ../uyeler_listesi.php?islem=basarisiz");
		}		
	}
//üye silme bitti
/*-------------------------------------------------------------------------------------------------------------*/

//kullanıcı  ekleme
if(isset($_POST['kullanici_ekle'])){ 
	$KullaniciAdi=$_POST['KullaniciAdi'];
	$KullaniciSifre=$_POST['KullaniciSifre'];
	
	$sql= "INSERT INTO kullanici (KullaniciAdi,KullaniciSifre) VALUES (?,?)";
	$kullanici_ekle=$db->prepare($sql)->execute(array($KullaniciAdi,$KullaniciSifre));	
	if($kullanici_ekle){
		
		header("location: ../kullanici_listesi.php?aktif=yonetim");
	}else{
		header("location: ../kullanici_listesi.php?aktif=yonetim&durum=no");
	}	
}
//kullanıcı ekleme işlemi bitti

//kullanıcı güncelleme
if(isset($_POST['kullanici_guncelle'])){ 
	$KullaniciID=$_GET['KullaniciID'];	
	
	$KullaniciAdi=$_POST['KullaniciAdi'];
	$KullaniciSifre=$_POST['KullaniciSifre'];
	
	
	$sql= "UPDATE kullanici SET KullaniciAdi = ?, KullaniciSifre=?  WHERE KullaniciID = ?";
	$update=$db->prepare($sql)->execute(array($KullaniciAdi,$KullaniciSifre,$KullaniciID));	
	if($update){		
		
	 header("location: ../kullanici_listesi.php?aktif=yonetim");
		   
	}else{
		header("location: ../kullanici_listesi.php?aktif=yonetim&durum=no");
	}	
}
//kullanıcı güncelleme bitti

//kullanıcı silme
	if(isset($_GET['kullanicisil'])){		
		$KullaniciID=$_GET['KullaniciID'];	

		$sql ="DELETE FROM kullanici WHERE KullaniciID = ?";
		$delete=$db->prepare($sql)->execute([$KullaniciID]);
		if($delete){		
			header("location: ../kullanici_listesi.php?aktif=yonetim");
		}else{
			header("location: ../kullanici_listesi.php?aktif=yonetim");
		}		
	}
//kullanıcı silme bitti

/*-------------------------------------------------------------------------------------------------------------*/
//kitap  ekleme
if(isset($_POST['kitap_ekle'])){ 
	$StokSayisi=$_POST['StokSayisi'];
	$GuncelStokSayisi=$StokSayisi;
	$KitapAciklamasi=$_POST['KitapAciklamasi'];
	$KategoriID=$_POST['KategoriID'];
	$KitapAdi=$_POST['KitapAdi'];
	
	$sql= "INSERT INTO kitaplartablo (KategoriID,KitapAdi,KitapAciklamasi,StokSayisi,GuncelStokSayisi) VALUES (?,?,?,?,?)";
	$kitap_ekle=$db->prepare($sql)->execute(array($KategoriID,$KitapAdi,$KitapAciklamasi,$StokSayisi,$GuncelStokSayisi));
	
	if($kitap_ekle)
	{
		header("location: ../kitap_listesi.php?aktif=kitapislemleri");								
	}else{
		header("location: ../kitap_listesi.php?aktif=kitapislemleri&durum=no");
	}	
		
	
	
}
//kitap ekleme işlemi bitti

//kitap güncelleme
if(isset($_POST['kitap_guncelle'])){ 
	$KitapID=$_GET['KitapID'];
	$StokSayisi=$_POST['StokSayisi'];
	
	$KategoriID=$_POST['KategoriID'];
	$KitapAdi=$_POST['KitapAdi'];
	$KitapAciklamasi=$_POST['KitapAciklamasi'];
	
	
	$sql= "UPDATE kitaplartablo SET KategoriID = ?, KitapAdi=?, StokSayisi=?, KitapAciklamasi=?  WHERE KitapID = ?";
	$update=$db->prepare($sql)->execute(array($KategoriID,$KitapAdi,$StokSayisi,$KitapAciklamasi,$KitapID));	
	if($update)
	{	
		header("location: ../kitap_listesi.php?aktif=kitapislemleri");	   
	}else{
		header("location: ../kitap_listesi.php?aktif=kitapislemleri&durum=no");
	}	
}
//kitap güncelleme bitti

//kitap silme
	if(isset($_GET['kitap_sil'])){		
		$KitapID=$_GET['KitapID'];	

		$sql ="DELETE FROM kitaplartablo WHERE KitapID = ?";
		$delete=$db->prepare($sql)->execute([$KitapID]);
		if($delete){
			$sql ="DELETE FROM kitapstoktablosu WHERE KitapID = ?";
			$stok_delete=$db->prepare($sql)->execute([$KitapID]);
			if($stok_delete){
				header("location: ../kitap_listesi.php?aktif=kitapislemleri");
			}
			else{
				header("location: ../kitap_listesi.php?aktif=kitapislemleri&durum=no");
			}
			
		}else{
			header("location: ../kitap_listesi.php?aktif=kitapislemleri&durum=no");
		}		
	}
//kitap silme bitti

/*-------------------------------------------------------------------------------------------------------------*/


//kitap ver işlemleri başlangıç
if(isset($_GET['kitabi_ver'])){ 
		
	$OgrenciTc=$_GET['OgrenciTc'];
	$KitapID=$_GET['KitapID'];
	/*tarih */
	$KitapAlinmaTarihi=date('d.m.Y');	    
	$tarihicevir=strtotime($KitapAlinmaTarihi);
	$teslimedilmesigerekentarih=strtotime("+10 day", $tarihicevir);	
	$KitapTeslimTarihi=date('d.m.Y', $teslimedilmesigerekentarih);
	/*tarih*/
	$KitapDurum=1;
	
	$sql= "INSERT INTO alinankitaplar (OgrenciTc,KitapID,KitapAlinmaTarihi,KitapTeslimTarihi,KitapDurum) VALUES (?,?,?,?,?)";
	$alinan_ekle=$db->prepare($sql)->execute(array($OgrenciTc,$KitapID,$KitapAlinmaTarihi,$KitapTeslimTarihi,$KitapDurum));
	
	if($alinan_ekle)
	{
		$kitap_bilgi_sor=$db->prepare("SELECT * FROM kitaplartablo WHERE KitapID=?");
		$kitap_bilgi_sor->execute(array($KitapID));
		$kitap_bilgi_cek=$kitap_bilgi_sor->fetch(PDO::FETCH_ASSOC);
		$GuncelStokSayisi=$kitap_bilgi_cek['GuncelStokSayisi'];
		
		$Son_GuncelStokSayisi=$GuncelStokSayisi-1;
		$sql= "UPDATE kitaplartablo SET GuncelStokSayisi=? WHERE KitapID = ?";
		$update=$db->prepare($sql)->execute(array($Son_GuncelStokSayisi,$KitapID));	


		
		header("location: ../index.php");
	}else{
		header("location: ../index.php?durum=no");
	}	
		
	
	
}

//kitap ver işlemleri bitiş

//kitap teslim alam işlemleri başlangıç
if(isset($_GET['kitabi_al'])){ 
		
	$OgrenciTc=$_GET['OgrenciTc'];
	$KitapID=$_GET['KitapID'];
	
	$KitapDurum=2;
	
	$sql= "UPDATE alinankitaplar SET KitapDurum=? WHERE KitapID=? ";
	$alinan_ekle=$db->prepare($sql)->execute(array($KitapDurum,$KitapID));

	if($alinan_ekle)
	{
		$kitap_bilgi_sor=$db->prepare("SELECT * FROM kitaplartablo WHERE KitapID=?");
		$kitap_bilgi_sor->execute(array($KitapID));
		$kitap_bilgi_cek=$kitap_bilgi_sor->fetch(PDO::FETCH_ASSOC);
		$GuncelStokSayisi=$kitap_bilgi_cek['GuncelStokSayisi'];
		$Son_GuncelStokSayisi=$GuncelStokSayisi+1;
		
		$sql= "UPDATE kitaplartablo SET GuncelStokSayisi=? WHERE KitapID = ?";
		$update=$db->prepare($sql)->execute(array($Son_GuncelStokSayisi,$KitapID));	


		
		header("location: ../index.php");
	}else{
		header("location: ../index.php?durum=no");
	}	
		
	
	
}
//kitap teslim alam işlemleri bitiş











?>