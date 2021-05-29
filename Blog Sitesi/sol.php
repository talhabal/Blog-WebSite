<div id="column-1">
	
		<?php 
		$yazilar = $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id");
		$yazilar->execute();
		$yazi_listele = $yazilar->fetchALL(PDO::FETCH_ASSOC);
		foreach ($yazi_listele as $row) {

		$yorumlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_yazi_id=? AND yorum_durum=?");
		$yorumlar->execute(array($row["yazi_id"],1));
		$yorumlar->fetchALL(PDO::FETCH_ASSOC);
		$say = $yorumlar->rowCount();



		 ?>
			<div class="post-column">
			<a href="post.php?yazi_id=<?php echo $row["yazi_id"]; ?>">
				<img src="img/<?php echo $row["yazi_foto"]; ?>" alt="<?php echo $row["yazi_title"]; ?>" width="440px" height="260px"/>
			</a>
			<div class="post-column-bottom">
				<h1><a href="post.php?yazi_id=<?php echo $row["yazi_id"]; ?>"><?php echo $row["yazi_title"]; ?></a></h1>
				<div class="post-column-meta">
					<span><a href="kategori-listele.php?kategori_id=<?php echo $row["kategori_id"]; ?> ">"><i class="mdi mdi-pound-box"></i> <?php echo $row["kategori_title"]; ?></a></span>
					<span><i class="mdi mdi-calendar-clock"></i> <?php echo $row["yazi_tarih"]; ?></span>
					<span><i class="mdi mdi-comment"></i> <?php echo $say ?> </span>
					<span style="border:0;"><i class="mdi mdi-eye"></i> <?php echo $row["yazi_okunma"]; ?> </span>
				</div>
			</div>
		</div>
		<?php }?>
		
		
		<div style="clear:both;"></div>
	
	</div>