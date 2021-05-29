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
                            if($sonuc == "no"){ ?>
                                <div class="alert alert-danger">
                                        <b>Mesaj Silinemedi!</b>
                                    </div>
                            

                            <?php } elseif($sonuc == "yes"){ ?>
                                <div class="alert alert-success">
                                        <b>Mesaj Silindi!</b>
                                    </div>
                            

                            <?php } ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"> 
                                    <i class="fa fa-envelope" > Mesajlar</i>
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Gönderen Ad Soyad</th>
                                                    <th>Gönderen E-Mail</th>
                                                    <th>Konu</th>
                                                    <th>Tarih</th>
                                                    <th>Mesaj</th>
                                                    <th>İşlemler</th>
                                                    
                                                   


                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php 
                                                $mesajlar = $db->prepare("SELECT * FROM mesajlar ORDER BY  mesaj_id DESC");
                                                $mesajlar->execute();
                                                $m_cek = $mesajlar->fetchALL(PDO::FETCH_ASSOC);
                                                $m_say = $mesajlar->rowCount();
                                                if ($m_say) {
                                                    foreach ($m_cek as $row) {
                                                        ?>

                                                        <tr class="odd gradeX">
                                                    <td><?php echo $row["mesaj_id"]; ?></td>
                                                    <td class="center"><?php echo $row["mesaj_gonderenisim"]; ?></td>
                                                    <td class="center"><?php echo $row["mesaj_gonderenmail"]; ?></td>
                                                       <td class="center"><?php echo $row["mesaj_konu"]; ?></td>
                                                       <td class="center"><?php echo $row["mesaj_tarih"]; ?></td>
                                                       <td class="center"><?php echo $row["mesaj_aciklama"]; ?></td>

                                                       
                                                    <td><center>
                                                        
                                                        <a href="islem.php?mesajsil_id=<?php echo $row["mesaj_id"]; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a>
                                                        </center>
                                                    </td>

                                                </tr>
                                                        <?php


                                                    }
                                                }else{
                                                    echo "<td colspan='7'>Henüz Mesaj Yok...</td>";
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