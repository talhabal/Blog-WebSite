<?php 
include 'sistem/baglan.php';
extract($_POST);
	if ($_POST) { 
		if (!$yorum_ekleyen || !$yorum_eposta || !$yorum_icerik) {
			echo "bos";
					
		}
		else{


		$yorumlar = $db->prepare("INSERT INTO yorumlar SET yorum_ekleyen=?,yorum_eposta=?,yorum_icerik=?, yorum_yazi_id=?");
		$insert = $yorumlar->execute(array($yorum_ekleyen,$yorum_eposta,$yorum_icerik,$yorum_yazi_id));
		if ($insert) {
			echo "yes";
		}else
		{
			echo "no";
		}
 
}
}



?>