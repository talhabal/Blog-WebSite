<?php include 'ust.php'; 
		$yazi_id = $_GET["yazi_id"];

		$yazilar = $db->prepare("SELECT * FROM yazilar INNER JOIN kategoriler ON kategoriler.kategori_id = yazilar.yazi_kategori_id WHERE yazi_id=?");
		$yazilar->execute(array($yazi_id));
		$yazi_cek = $yazilar->fetch(PDO::FETCH_ASSOC);


$okunma = @$_COOKIE[$yazi_cek["yazi_id"]];
if (!$okunma) {
	$okunma = $db->prepare("UPDATE yazilar SET yazi_okunma = ".$yazi_cek["yazi_okunma"]."+1 WHERE  yazi_id=?");
	$okunma ->execute(array($yazi_id));
	setcookie(''.$yazi_cek["yazi_id"],"_",time()+1);
}

?>

<div id="columns" class="container">
	<!-- Column 1 -->
	<div id="column-1">
		<!-- Post -->
		<div class="post">
			<div class="post-header">
				<h1><?php echo $yazi_cek["yazi_title"]; ?></h1>
			</div>
			<div class="post-meta">
				<p>
					
					<span> <i class="mdi mdi-pound-box"></i> <a href="kategori-listele.php?kategori_id=<?php echo $yazi_cek["kategori_id"]; ?>">
						<?php echo $yazi_cek["kategori_title"]; ?></a></span>




					<span><i class="mdi mdi-calendar-clock"></i> <?php echo $yazi_cek["yazi_tarih"]; ?></span>
					
					<span style="border:0;"><i class="mdi mdi-eye"></i><?php echo $yazi_cek["yazi_okunma"]; ?></span>
				</p>
			</div>
			<div class="post-thumbnail">
				<a width="140" height="50"><img   src="img/<?php echo $yazi_cek["yazi_foto"]; ?>"   ></a>
			</div>
			<div class="post-text">
				
				<?php echo $yazi_cek["yazi_icerik"]; ?>
			</div>
			<div style="clear:both;"></div>
			
			
		</div>
		<!-- Post -->
		<!-- Related Post-->
		
		<!-- Related Post End -->
		
		<!-- Yorumlar-->
				<div class="related-post">
					<h2>Yapılan Yorumlar</h2>

					<?php 
					$yorumlar = $db->prepare("SELECT * FROM yorumlar WHERE yorum_yazi_id=? AND yorum_durum=?");
					$yorumlar->execute(array($yazi_id, 1));
					$yorum_listele = $yorumlar->fetchAll(PDO::FETCH_ASSOC);
					$yorum_say = $yorumlar->rowCount();
					if ($yorum_say) {
						foreach ($yorum_listele as $row) { ?>
							
						<div class="sidebar-post" style="height: auto;">
							<div class="sidebar-post-info">
								<b style="text-transform: capitalize;"><?php echo $row["yorum_ekleyen"]; ?></b><br><br>
								<span style="float:left;"><?php echo $row["yorum_tarih"]; ?></span><br>
							</div>
							<div class="sidebar-post-meta">
								<p><big><i> <?php echo $row["yorum_icerik"]; ?></i></big></p>
							</div>
							
						</div>
						
						<?php } } else {
						echo "Bu yazıya hiç yorum yapılmamış.Hadi ilk yorumu sen yap...";
					}

					?>

					</div>	
					<!-- Yorumlar End -->
		
		<!-- Yorum Yap-->
					<div class="related-post" style="padding-bottom: 0;">
						<h2>Yorum Yap</h2>
						<div id="page" style="padding: 0; margin-left: 15px; width: 100%;">
							<form action="" method="post" id="yorumForm" onsubmit="return false;">
								<p class="cont">Lütfen aşağıdaki alanları eksiksiz doldurunuz.</p>
								<input type="hidden" name="yorum_yazi_id" value="<?php echo $yazi_id; ?>">
								<div class="fieldset">
									<input type="text" name="yorum_ekleyen" placeholder="Adınız Soyadınız" value="" />
								</div>
								<div class="fieldset">
									<input type="email" name="yorum_eposta" placeholder="Email Adresiniz" value="" />
								</div>
								
								<div style="clear:both;"></div>
								<div class="fieldset-textarea">
									<textarea name="yorum_icerik" rows="10" placeholder="Yorumunuzz..."></textarea>
								</div>
								<button type="submit"  onclick="yorumGonder();" class="submit" style="float:right; margin-right:3%; margin-top:3%; margin-bottom:5%;">Gönder</button>
							</form>
						</div>
					</div>
					<!-- Yorum Yap End -->
					<script>
						function yorumGonder(){
							var degerler = $("#yorumForm").serialize();
							$.ajax({
							type : "POST",
							url : "yorum-yap.php",
							data : degerler,
							success : function(sonuc){
								if (sonuc=="bos") {
									swal("Dikkat!","Lütfen boş alan bırakmayınız!","warning");
								}
								else if (sonuc=="no") {
									swal("Hata!","Yorum yapılırken bir hata oluştu!","error");
								}
								else if (sonuc=="yes") {
									swal({
										title:"Tebrikler!",
										text : "Yorumunuz Başarıyla Gönderildi!",
										type : "success",
										html : true,
										timer :4000},
										function(){
											location.reload();
										});
								}
							}
						});
					}
										
								
					</script>

	</div>
	
	<!-- Column 1 END -->
	<!-- Column 2 -->
<?php include 'sag.php'; ?>
	<!-- Column 2 END -->
	<div style="clear:both;"></div>

</div>
<!-- Footer -->
<?php include 'alt.php'; ?>