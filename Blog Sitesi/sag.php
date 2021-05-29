<div id="column-2">
		<div class="sidebar">
    		<h4>ADMİN GİRİŞİ</h4>

    		<ul class="social list">


    				<li class="border" style="margin-left: 90px; font-size: 20px;">
          			<a href="admin/pages/login.php"><b>  PANEL</b>
            <i class="fa fa-user fa-fw "  style="float:left;color: black;"></i>
            
    		</ul>
    	</div>
		
		
		  <div class="sidebar">
    		<h4>KATEGORİLER</h4>

    		
            
            

    		<ul class="social list">
	
        
		
		<?php 
		$kategoriler = $db->prepare("SELECT * FROM kategoriler ");
		$kategoriler->execute();
		$kategori_listele = $kategoriler->fetchALL(PDO::FETCH_ASSOC);
		foreach ($kategori_listele as $row) { ?>
			<li class="border" style="text-align:right;">
          <a href="kategori-listele.php?kategori_id=<?php echo $row["kategori_id"]; ?>">
            <i class="mdi mdi-pound-box mdi-24px"  style="float:left; margin-right: 5px; color: lightblue;"></i>
            <span style="float:left;"> <?php echo $row["kategori_title"]; ?></span>
            <?php 
            	$yazilar = $db->prepare("SELECT * FROM yazilar WHERE yazi_kategori_id=?");
				$yazilar->execute(array($row["kategori_id"]));
				$yazi_listele = $yazilar->fetchALL(PDO::FETCH_ASSOC);
				$yazi_say = $yazilar->rowCount();
            ?>
            <span style="padding-left: 3px; padding-right: 3px; background-color: lightblue; color: white; border-radius: 5px;"> <?php echo $yazi_say; ?></span>
          </a>
        </li>
		<?php }
		?>


    </ul>

  </div>
		
		
	</div>