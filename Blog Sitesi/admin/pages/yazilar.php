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
                                    <i class="fa fa-list" > Yazılar</i>
                                    <a href="yazi-ekle.php" class="btn btn-primary btn-xs pull-right"><i class="fa fa-plus"></i>Yazı Ekle</a>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Fotoğraf</th>
                                                    <th>Başlık</th>
                                                    <th width="250px" height="auto">İçerik</th>
                                                    <th>Tarih</th>
                                                    <th>Kategori</th>
                                                    <th>Okunma</th>
                                                    <th></th>
                                                   


                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                $yazilar = $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id ORDER BY  yazi_id DESC");
                                                $yazilar->execute();
                                                $yazi_cek = $yazilar->fetchALL(PDO::FETCH_ASSOC);
                                                $yazi_say = $yazilar->rowCount();
                                                if ($yazi_say) {
                                                    foreach ($yazi_cek as $row) {
                                                        ?>

                                                        <tr class="odd gradeX">
                                                    <td><?php echo $row["yazi_id"]; ?></td>
                                                    <td><img width="100" height="50" src="../../img/<?php echo $row["yazi_foto"]; ?>"></td>
                                                    <td class="center"><?php echo $row["yazi_title"]; ?></td>
                                                    <td><?php echo $row["yazi_icerik"]; ?></td>
                                                    <td class="center"><?php echo $row["yazi_tarih"]; ?></td>
                                                    <td class="center"><?php echo $row["kategori_title"]; ?></td>
                                                    <td class="center"><?php echo $row["yazi_okunma"]; ?></td>
                                                    <td><center>
                                                        <a href="yazi-duzenle.php?yazi_id=<?php echo $row["yazi_id"]; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Düzenle</button></a> 
                                                        <a href="islem.php?yazisil_id=<?php echo $row["yazi_id"]; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"> </i> Sil</button></a>
                                                        </center>
                                                    </td>

                                                </tr>
                                                        <?php


                                                    }
                                                }else{
                                                    echo "<td colspan='7'>yok</td>";
                                                }

                                                 ?>
                                                
                                           
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    
                                <!-- /.panel-body -->
                            </div>
                             
                        
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