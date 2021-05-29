
<?php include 'ust.php'; 
error_reporting(E_ALL & ~E_NOTICE);

?>

                <!-- /.navbar-top-links -->

<?php include 'sidebar.php'; ?>

<?php 
$yazi_id = $_GET["yazi_id"];
$yazilar = $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id WHERE yazi_id=?");
$yazilar->execute(array($yazi_id));
$yazicek = $yazilar->fetch(PDO::FETCH_ASSOC);



?>
            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                              <br><br><br>      
                            <?php
                            extract($_GET); 
                            if ($update == "bos") { ?>
                                    <div class="alert alert-warning">
                                        <b>Dikkat! Lütfen boş alan bırakmayınız...</b>
                                    </div>
                            <?php } 
                            elseif($update == "no"){ ?>
                                <div class="alert alert-danger">
                                        <b>evettt değil Başarısız!</b>
                                    </div>
                            

                            <?php } elseif($update == "yes"){ ?>
                                <div class="alert alert-success">
                                        <b>evetti...</b>
                                    </div>
                            

                            <?php } ?>
                            <div class="panel panel-default">
                                
                                
                                <div class="panel-heading">
                                    <i class="fa fa-edit fa-fw"></i> Yazı Düzenle
                                </div>
                                <div class="panel-body">
                                    <form action="islem.php?yazi_id=<?php echo $yazi_id; ?>" method="POST" enctype="multipart/form-data">
                                            <br>
                                                

                                                <div class="form-group">
                                                  


                                                <div class="form-group">
                                                    <label>Yazı Başlık</label>
                                                    <input class="form-control" name="yazi_title" value="<?php echo $yazicek["yazi_title"]; ?> ">
                                                </div>

                                                 <div class="form-group">
                                                    <label>Kategori</label>

                                                    <input class="form-control" name="yazi_kategori_id" value="<?php echo $yazicek["yazi_kategori_id"]; ?> " >
                                                    
                                                </div>                                              
                                                

                                                <div class="form-group">
                                                    <label>Tarih</label>


                                                    <input class="form-control" name="yazi_tarih" value="<?php echo $yazicek["yazi_tarih"]; ?> " disabled>
                                                </div>

                                                 <div class="form-group">
                                                    <label>Okunma Sayısı</label>
                                                    <input class="form-control" name="yazi_okunma" value="<?php echo $yazicek["yazi_okunma"]; ?> " disabled>
                                                </div>

                                                

                                                <div class="form-group">
                                                    <label>İçerik</label>
                                                    <textarea name="yazi_icerik" class="ckeditor"><?php echo $yazicek["yazi_icerik"]; ?></textarea>
                                                </div>

                                                

                                    <button type="submit" name="yazi_duzenle" class="btn btn-primary btn-block">Güncelle</button>
                               </form>
                                </div>
                                <!-- /.panel-body -->
                             
                        
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        
        <?php include 'alt.php'; ?>