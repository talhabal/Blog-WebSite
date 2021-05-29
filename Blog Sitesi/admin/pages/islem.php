 <?php include '../../sistem/baglan.php';
extract($_POST);



//yazi düzenle
if (isset($yazi_duzenle)) {
        $yazi_id = $_GET["yazi_id"]; 
        $yazilar = $db->prepare("UPDATE yazilar SET yazi_title=?, yazi_kategori_id=?, yazi_icerik=? WHERE yazi_id=?");
        $update = $yazilar->execute(array($yazi_title,$yazi_kategori_id,$yazi_icerik,$yazi_id));

        if ($update){
            header("Location: yazilar.php?update=yes");
        }else{
            header("Location: yazilar.php?update=no");
        }
        }    
 







//yazi sil
$yazisil_id = $_GET["yazisil_id"];
if (isset($yazisil_id))
$yazisil_id = $_GET["yazisil_id"]; {   
                $sil = $db->prepare("SELECT * FROM yazilar WHERE yazi_id=?");
                $sil->execute(array($yazi_id));
                $eski_resim = $sil->fetch(PDO::FETCH_ASSOC);
                $eski_resim["yazi_foto"];

                unlink("../../img/yazilar/".$eski_resim["yazi_foto"]);
                $delete = $db->prepare("DELETE FROM yazilar WHERE yazi_id=?");
                $silinecek = $delete->execute(array($yazisil_id));
                if ($silinecek){
                header("Location: yazilar.php?update=yes");
                }else{
                header("Location: yazilar.php?update=no");
                }
   
}




//yazı ekleme


if (isset($yazi_ekle)) 
{
        
        
                if (!$yazi_title || !$yazi_kategori || !$yazi_icerik) {
                    header("Location: yazilar.php?update=bos");
                }else{

                    $ayarlar = $db->prepare("INSERT INTO  yazilar SET  yazi_title=?, yazi_kategori_id=?, yazi_icerik=?");
                    $insert = $ayarlar->execute(array($yazi_title,$yazi_kategori,$yazi_icerik));
                    if ($insert) {
                        header("Location: yazilar.php?update=yes");
                    }else{
                        header("Location: yazilar.php?update=no");
                    }
                }
            }
        
//kategori ekle
    if (isset($kategori_ekle)) {
    if (!$kategori_title) {
        header("Location: kategoriler.php?sonuc=bos");
    }
    else{
        $ayarlar = $db->prepare("INSERT INTO kategoriler SET kategori_title=? ");
        $insert = $ayarlar->execute(array($kategori_title));
        if ($insert) {
            header("Location: kategoriler.php?sonuc=yes");
        }else{
              header("Location: kategoriler.php?sonuc=no");
        }
    }
}

//kategori düzenle
if (isset($kategori_duzenle)) {

        $kategori_id = $_GET["kategori_id"]; 
        $kategoriler = $db->prepare("UPDATE kategoriler SET kategori_title=? WHERE kategori_id=?");
        $update = $kategoriler->execute(array($kategori_title,$kategori_id));
        if ($update) {
            header("Location: kategoriler.php?sonuc=yes");
        }else{
              header("Location: kategoriler.php?sonuc=no");
        }
    }

//kategori sil

$kategorisil_id = $_GET["kategorisil_id"];
if (isset($kategorisil_id)) {

    
        $kategoriler = $db->prepare("DELETE FROM kategoriler WHERE kategori_id=?");
        $delete = $kategoriler->execute(array($kategorisil_id));
        if ($delete) {
            header("Location: kategoriler.php?sonuc=yes");
        }else{
              header("Location: kategoriler.php?sonuc=no");
        }
    }

//yorum güncellenme
   if (isset($yorum_duzenle)) {

        $yorum_id = $_GET["yorum_id"];    
        $yorumlar = $db->prepare("UPDATE yorumlar SET yorum_durum=? WHERE yorum_id=?");
        $update = $yorumlar->execute(array($yorum_durum,$yorum_id));
        if ($update) {
            header("Location: yorum-listele.php?sonuc=yes");
        }else{
              header("Location: yorum-listele.php?sonuc=no");
        }
    }
    //yorum silme


if (isset($_GET["yorumsil_id"])) {

    
        $yorumlar = $db->prepare("DELETE FROM yorumlar WHERE yorum_id=?");
        $delete = $yorumlar->execute(array($_GET["yorumsil_id"]));
        if ($delete) {
            header("Location: yorum-listele.php?sonuc=yes");
        }else{
              header("Location: yorum-listele.php?sonuc=no");
        }
    }

//mesaj silme
    if (isset($_GET["mesajsil_id"])) {

    
        $mesajlar = $db->prepare("DELETE FROM mesajlar WHERE mesaj_id=?");
        $delete = $mesajlar->execute(array($_GET["mesajsil_id"]));
        if ($delete) {
            header("Location: mesajlar.php?sonuc=yes");
        }else{
              header("Location: mesajlar.php?sonuc=no");
        }
    }

//giriş işlemi
    if (isset($giris)) {
        $admin_kadi = htmlspecialchars(trim($admin_kadi));
        $admin_sifre = htmlspecialchars(trim($admin_sifre));

        if (!$admin_kadi || !$admin_sifre) {
            header("Location: login.php?giris=bos");
            }else {
                    $query = $db->prepare("SELECT * FROM admin WHERE admin_kadi=? AND admin_sifre=?");
                    $query->execute(array($admin_kadi,$admin_sifre));
                    $admin_giris = $query->fetch(PDO::FETCH_ASSOC);

                    if ($admin_giris) {
                       $_SESSION["login"] = true;
                       $_SESSION["admin_kadi"] = $admin_giris["admin_kadi"];
                       $_SESSION["admin_id"] = $admin_giris["admin_id"];
                       header("Location: index.php");
                    }
                  }
    }


?>