<?php

if (!isset($_SESSION)) {
  session_start();
}
$_SESSION['KullaniciAdi'] = NULL;

unset($_SESSION['KullaniciAdi']);

session_destroy();

header('Location: ../index.php');


?>
