<?php include 'ust.php'; ?>
<?php include 'sidebar.php'; ?>

<?php 

$yorum_id = $_GET["yorum_id"];
$yorumlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_id=?");
$yorumlar->execute(array($yorum_id));
$y_cek = $yorumlar->fetch(PDO::FETCH_ASSOC);
?>
        <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                              <br><br><br>      
                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-edit fa-fw"></i> Yorum Düzenle
                                </div>
                                <div class="panel-body">
                                    <form action="islem.php?yorum_id=<?php echo $y_cek["yorum_id"]; ?>" method="POST" >
                                        <div class="form-group">
                                            <label>Ekleyen</label>
                                            <input class="form-control" name="yorum_ekleyen" value="<?php echo $y_cek["yorum_ekleyen"]; ?>">
                                        </div>  

                                        <div class="form-group">
                                            <label>Tarih</label>
                                            <input class="form-control"  value="<?php echo $y_cek["yorum_tarih"]; ?>" disabled>
                                        </div>     

                                        <div class="form-group">
                                            <label>Durum</label>
                                            <select name="yorum_durum" class="form-control">
                                                <option value="1"<?php echo $y_cek["yorum_durum"]==1 ? "selected": null; ?> > ✅</option>
                                                <option value="0" <?php echo $y_cek["yorum_durum"]==0 ? "selected": null; ?> > ❌</option>
                                            </select>
                                        </div>      

                                                                                     
                                    <button type="submit" name="yorum_duzenle" class="btn btn-primary btn-block">Güncelle</button>
                               </form>
                                </div>
                        </div>
                </div>
             </div>
        </div>
        <?php include 'alt.php'; ?>