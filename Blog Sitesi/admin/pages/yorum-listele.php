<?php include 'ust.php'; 
error_reporting(E_ALL & ~E_NOTICE);
?>

                <!-- /.navbar-top-links -->

<?php include 'sidebar.php'; ?>


            <!-- Page Content -->
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                              <br><br><br>      
                            <?php
                            extract($_GET); 
                            if ($sonuc == "bos") { ?>
                                    <div class="alert alert-warning">
                                        <b>Dikkat! Lütfen boş alan bırakmayınız...</b>
                                    </div>
                            <?php } 
                            else if($sonuc == "no"){ ?>
                                <div class="alert alert-danger">
                                        <b>Güncelleme BaşarısızZZ!</b>
                                    </div>
                            

                            <?php } elseif($sonuc == "yes"){ ?>
                                <div class="alert alert-success">
                                        <b>Tebrikler! Güncellendi...</b>
                                    </div>
                            

                            <?php } ?>
                            <div class="panel panel-default">
                                <div class="panel-heading"> 
                                    <i class="fa fa-comments" > Yorumlar</i>
                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    
                                        <table  width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Ekleyen</th>
                                                    <th style="text-align: center">Yazı</th>
                                                    <th>Tarih</th>
                                                    <th>Durum</th>
                                                    <th style="text-align: center">İşlemler</th>
                                                 </tr>
                                            </thead>    
                                            <tbody>

                                                <?php 
                                                $yorumlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_id ");
                                                $yorumlar->execute();
                                                $y_cek = $yorumlar->fetchALL(PDO::FETCH_ASSOC);
                                                $y_say = $yorumlar->rowCount();
                                                if ($y_say) {
                                                    foreach ($y_cek as $row) {

                                                        ?>

                                                        <tr class="odd gradeX">
                                                    <td><?php echo $row["yorum_id"]; ?></td>
                                                    <td><?php echo $row["yorum_ekleyen"]; ?></td>
                                                    <td><?php echo $row["yorum_icerik"]; ?></td>
                                                    <td><?php echo $row["yorum_tarih"]; ?></td>
                                                    <td style="text-align: center;">
                                                        <?php 
                                                        if ($row["yorum_durum"]==1) {
                                                            echo "<span class='fa fa-check-circle text-success'> </span>";
                                                        }
                                                        else {
                                                            echo "<span class='fa fa-times-circle text-danger'> </span>";
                                                        }

                                                        ?>

                                                    </td>

                                                       
                                                    <td><center>
                                                        <a href="yorum-duzenle.php?yorum_id=<?php echo $row["yorum_id"]; ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Düzenle</button></a> 
                                                        <a href="islem.php?yorumsil_id=<?php echo $row["yorum_id"]; ?>"><button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Sil</button></a>
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