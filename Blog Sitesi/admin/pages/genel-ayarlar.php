

<?php include 'ust.php'; 
error_reporting(E_ALL & ~E_NOTICE);

?>

                <!-- /.navbar-top-links -->

<?php include 'sidebar.php'; ?>

<?php 

$ayarlar = $db->prepare("SELECT * FROM ayarlar");
$ayarlar->execute();
$ayarcek = $ayarlar->fetch(PDO::FETCH_ASSOC);

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
                                        <b>Güncelleme Başarısız!</b>
                                    </div>
                            

                            <?php } elseif($update == "yes"){ ?>
                                <div class="alert alert-success">
                                        <b>Tebrikler! Güncellendi...</b>
                                    </div>
                            

                            <?php } ?>
                            <div class="panel panel-default">
                                
                                
                                <div class="panel-heading">
                                    <i class="fa fa-cog fa-fw"></i> Genel Ayarlar
                                </div>
                                <div class="panel-body">
                                    <form action="yenislem.php" method="POST">
                                                <div class="form-group">
                                                    <label>Site Title</label>
                                                    <input class="form-control" name="site_title" value="<?php echo $ayarcek["site_title"]; ?> ">
                                                </div>

                                               
                                                <div class="form-group">
                                                    <label>Site Url</label>
                                                    <input class="form-control" name="site_url" value="<?php echo $ayarcek["site_url"]; ?> ">
                                                </div>

                                                

                                    <button type="submit" name="genel_ayarlar" class="btn btn-primary btn-block">Güncelle</button>
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