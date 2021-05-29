<?php include 'ust.php'; 
?>

<div id="columns" class="container">
	<!-- Column 1 -->
	<div id="column-1">
		<!-- <div class="page-subject"> İletişim </div> -->
		<div class="page-cont box-shadow">
		<div id="page">
		<form id="mesajForm"  action="" method="post" onsubmit="return false;">
			<p class="cont">Lütfen aşağıdaki alanları eksiksiz doldurunuz.</p>
			<div class="fieldset">
				<input type="text" name="isim" placeholder="Adınız Soyadınız" value="" />
			</div>
			<div class="fieldset">
				<input type="text" name="email" placeholder="Email Adresiniz" value=""/>
			</div>
			<div class="fieldset">
				<input type="text" name="konu" placeholder="Mesaj Konusu" value="" />
			</div>
			<div style="clear:both;"></div>
			<div class="fieldset-textarea">
				<textarea name="aciklama"  placeholder="Mesajınız" rows="10"></textarea>
			</div>
			<button type="submit" class="submit" onclick="mesajGonder();" style="float:right; margin-right:3%; margin-top:3%; margin-bottom:5%;">Gönder</button>
		</form>
		</div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<!-- Column 1 END -->

	<script>
		function mesajGonder(){
			var degerler = $("#mesajForm").serialize();

			$.ajax({
				type : "POST",
				url : "mesajgonder.php",
				data : degerler,
				success : function(sonuc){
					if (sonuc=="bos") {
						swal("Lütfen boş bırakmayınız!","warning");
					}else if (sonuc=="no") {
						swal("Hata","Mesaj gönderilirken bir hata oluştu","error");
					}else if (sonuc=="yes") {
						swal({ 
							title : "Tebrikler",
							text : "Mesaj Gönderildi",
							type : "success",
							html : true,
							timer : 2000
						},function(){
							location.reload();
						});
					}
				}
			});
		}

	</script>
	<!-- Column 2 -->
	<?php include 'sag.php'; ?>
	<!-- Column 2 END -->
	<div style="clear:both;"></div>
</div><br><br><br><br><br><br><br>
<!-- Footer -->
<?php include 'alt.php'; ?>