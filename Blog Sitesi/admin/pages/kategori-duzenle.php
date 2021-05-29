<?php include 'ust.php'; ?>
<?php include 'sidebar.php'; ?>

<?php 
$kategori_id = $_GET["kategori_id"];
$kategoriler = $db->prepare("SELECT * FROM kategoriler WHERE kategori_id=?");
$kategoriler->execute(array($kategori_id));
$kategoricek = $kategoriler->fetch(PDO::FETCH_ASSOC);
?>
        <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                              <br><br><br>      
                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <i class="fa fa-edit fa-fw"></i> Kategori Düzenle
                                </div>
                                <div class="panel-body">
                                    <form action="islem.php?kategori_id=<?php echo $kategoricek["kategori_id"]; ?>" method="POST" >
                                        <div class="form-group">

                                            
                                                    <label>Kategori Adı</label>
                                                    <input class="form-control" name="kategori_title" value="<?php echo $kategoricek["kategori_title"]; ?>">
                                        </div>                                                       
                                    <button type="submit" name="kategori_duzenle" class="btn btn-primary btn-block">Güncelle</button>
                               </form>
                                </div>
                        </div>
                </div>
             </div>
        </div>
        <?php include 'alt.php'; ?>