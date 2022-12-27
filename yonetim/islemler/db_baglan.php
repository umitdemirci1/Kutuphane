<?php
$host ='localhost';
$dbn ='kutuphane';
$user ='root';
$pass ='';
$charset ='Utf8';
$baglantiyol="mysql:host=$host;dbname=$dbn;charset=$charset";
try{
$db= new PDO($baglantiyol,$user,$pass);
	//echo "bağlantı başarlı ";
}
catch(PDOException $e){
	echo $e->getMessage();//bağlanmamış ise hata mesajı
}
?>