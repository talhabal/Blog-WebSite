<?php 
include 'sistem/baglan.php';

extract($_POST);
if ($_POST) {

	 if (!$isim || !$email || !$konu || !$aciklama) {
	 	echo "bos";
	 }else{
	 	$mesajlar=$db->prepare("INSERT INTO mesajlar SET mesaj_gonderenisim=?,mesaj_gonderenmail=?,mesaj_konu=?,mesaj_aciklama=?");
	 	$insert = $mesajlar->execute(array($isim,$email,$konu,$aciklama));
	 	if ($insert) {
	 		echo "yes";
	 	}else{
	 		echo "no";
	 	}
	 }
};


?>