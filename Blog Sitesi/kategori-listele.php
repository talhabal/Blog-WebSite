<?php include 'ust.php'; 
$kategori_id = $_GET["kategori_id"];
$kategoriler = $db->prepare("SELECT * FROM  kategoriler WHERE kategori_id=?");
$kategoriler->execute(array($kategori_id));
$kategori_cek = $kategoriler->fetch(PDO::FETCH_ASSOC);

?>

<div id="columns" class="container">
	<!-- Column 1 -->
	<div id="column-1">
		<div class="page-subject">
			<?php echo $kategori_cek["kategori_title"]; ?>
		</div>
		<?php  
		$yazilar = $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id WHERE yazi_kategori_id=?");
		$yazilar->execute(array($kategori_id));
		$yazi_listele = $yazilar->fetchALL(PDO::FETCH_ASSOC);
		foreach ($yazi_listele as $row) { ?>

		<div class="post-column">
			<a href="post.php?yazi_id=<?php echo $row["yazi_id"]; ?>">
				<img src="img/<?php echo $row["yazi_foto"]; ?>"  width="440px" height="260px"/>
			</a>
			<div class="post-column-bottom">
				<h1><a href="post.php?yazi_id=<?php echo $row["yazi_id"]; ?>" title="<?php echo $row["yazi_title"]; ?>"></a></h1>
				<div class="post-column-meta">
					<span><a href="kategori-listele.php?kategori_id=<?php echo $row["kategori_id"];?>" title="<?php echo $row["kategori_title"]; ?>"> 
					<i class="mdi mdi-pound-box"></i><?php echo $row["kategori_title"]; ?></a></span>
					<span><i class="mdi mdi-calendar-clock"></i> <?php echo $row["yazi_tarih"]; ?></span>
					<span><i class="mdi mdi-comment"></i> 30 Yorum </span>
					<span style="border:0;"><i class="mdi mdi-eye"></i>  <?php echo $row["yazi_okunma"]; ?></span>
				</div>
			</div>
		</div>
<?php }?>
		


		<div style="clear:both;"></div>
		
	</div>
	<!-- Column 1 END -->
	<!-- Column 2 -->
	
	<!-- Column 2 END -->
	<div style="clear:both;"></div>
</div>
<!-- Footer -->
<?php include 'alt.php'; ?>
<!-- Footer  END -->
