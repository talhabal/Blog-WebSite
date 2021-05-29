<?php include 'ust.php'; ?>
                <!-- /.navbar-top-links -->

<?php include 'sidebar.php'; ?>
            

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                       
                        <div class="col-lg-12">
                            <h1  class="page-header">
                            YÖNETİM PANELİ
                            </h1>                               
                        </div>
                        
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-comments fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">

                                            <?php 
                                            $yorumlar = $db->prepare("SELECT * FROM yorumlar");
                                            $yorumlar->execute(array());
                                            $yorumlar->fetchALL(PDO::FETCH_ASSOC);
                                            $say = $yorumlar->rowCount();
                                            ?>


                                            <div class="huge"><?php echo $say; ?></div>
                                            <div>Yorumlar</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="yorum-listele.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Tümünü Gör</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-green">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-list fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php 
                                            $yazilar = $db->prepare("SELECT * FROM yazilar");
                                            $yazilar->execute(array());
                                            $yazilar->fetchALL(PDO::FETCH_ASSOC);
                                            $say = $yazilar->rowCount();
                                            ?>
                                            <div class="huge"><?php echo $say; ?></div>
                                            <div>Yazılar</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="yazilar.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Tümünü Gör</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-yellow">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-folder-open fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php 
                                            $kategoriler = $db->prepare("SELECT * FROM kategoriler");
                                            $kategoriler->execute(array());
                                            $kategoriler->fetchALL(PDO::FETCH_ASSOC);
                                            $say = $kategoriler->rowCount();
                                            ?>
                                            <div class="huge"><?php echo $say; ?></div>
                                            <div>Kategoriler</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="kategoriler.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Tümünü Gör</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-red">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-envelope fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <?php 
                                            $mesajlar = $db->prepare("SELECT * FROM mesajlar");
                                            $mesajlar->execute(array());
                                            $mesajlar->fetchALL(PDO::FETCH_ASSOC);
                                            $say = $mesajlar->rowCount();
                                            ?>
                                            <div class="huge"><?php echo $say ?></div>
                                            <div>Mesajlar</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="mesajlar.php">
                                    <div class="panel-footer">
                                        <span class="pull-left">Tümünü Gör</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                  
                        <!-- /.col-lg-8 -->
       
                        </div>
                        <!-- /.col-lg-4 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <?php include 'alt.php'; ?>