 <?php include '../../sistem/baglan.php';
extract($_POST);
if (isset($_POST["genel_ayarlar"])) {
	

	if (!$site_title || !$site_url) {
		header("Location:genel-ayarlar.php?update=bos");
	} else {
		$ayarlar = $db->prepare("UPDATE  ayarlar SET site_title=?, site_url=? WHERE site_id=?");
		$update = $ayarlar->execute(array($site_title,$site_url,1));
		if ($update) {
			
			header("Location:genel-ayarlar.php?update=yes");
		}
			else{
			header("Location:genel-ayarlar.php?update=no");
			}
		}
	}


$DosyaTuru = array("image/jpg","image/jpeg","image/png");
$DosyaUzanti = array("jpg","jpeg","png");

if (isset($yazi_ekle)) 
{
        
        
        $kaynak = $_FILES["yazi_foto"]["tmp_name"];
        $isim = $_FILES["yazi_foto"]["name"]; //dosya ismi
        $boyut = $_FILES["yazi_foto"]["size"]; // dosya boyutu
        $turu = $_FILES["yazi_foto"]["type"]; // dosya tipi

        $uzanti = substr($isim, strpos($isim, ".")+1); //Dosya uzantı bulma
        $resimAd = rand()."_".$isim; //
        $hedef = "../../img/yazilar/".$resimAd; // kayıt edilecek konum

        // $uzantı yani yüklenene resmi $dosyauzantı komutundaki dosyaların uzantısıyla sorgula kontrol etme kısmı sonrada $turu alıp $dosyaturu le sorgulayacak
        if ($kaynak) {            
            if (!in_array($uzanti, $DosyaUzanti) && !in_array($turu, $DosyaTuru)) { 
                header("Location: yazi-ekle.php?update=gecersizuzanti");
            
            } else {

                if (move_uploaded_file($kaynak, $hedef)) {
                    $yukle = $db->prepare("INSERT INTO yazilar SET yazi_foto=?,yazi_title=?,yazi_kategori_id=?,yazi_icerik=?");
                    $insert = $yukle->execute(array($resimAd,$yazi_title,$yazi_kategori,$yazi_icerik));

                    if ($insert) {
                        header("Location: yazi-ekle.php?update=yes");
                    }else{
                        header("Location: yazi-ekle.php?update=no");
                    }
                }
            }
        }
    }

	?>