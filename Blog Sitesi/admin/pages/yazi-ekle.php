

<?php include 'ust.php'; 

?>
<?php include 'sidebar.php'; ?>

       
            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                              <br><br><br>      
                           
                            <div class="panel panel-default">
                                
                                
                                <div class="panel-heading">
                                    <i class="fa fa-edit fa-fw"></i> Yazı Ekle
                                </div>
                                <div class="panel-body">
                                    <form action="islem.php" method="POST" enctype="multipart/form-data">
                                        
                                        

                                        <div class="form-group">
                                                    <label>Yazı Başlık</label>
                                                    <input class="form-control" name="yazi_title" placeholder="Yazınızın Başlığını Giriniz...">
                                        </div>

                                        

                                               
                                        <div class="form-group">
                                                    <label>Kategori</label>
                                                    <select name="yazi_kategori" class="form-control">

                                                        <?php 
                                                        $kategoriler = $db->prepare("SELECT * FROM  kategoriler");
                                                        $kategoriler->execute();
                                                        $kategori_cek = $kategoriler->fetchALL(PDO::FETCH_ASSOC);
                                                        foreach ($kategori_cek as $row) { ?>
                                                            <option value="<?php echo $row["kategori_id"]; ?>"><?php echo $row["kategori_title"]; ?>
                                                            </option>
                                                        <?php } 
                                                        ?>
                                                        
                                                    </select>
                                        </div>

                                         

                                       

                                        <div class="form-group">
                                                    <label>İçerik</label>
                                                    <textarea name="yazi_icerik" class="ckeditor" placeholder="İçeriğinizi Giriniz..."></textarea>
                                        </div>


                                                

                                    <button type="submit" name="yazi_ekle" class="btn btn-primary btn-block">Ekle</button>
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