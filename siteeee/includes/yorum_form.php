<?php
$mesaj = '';



if(isset($_POST['yorum_yap'])){
	$yorum = trim($_POST["yorum"]);
	if(empty($yorum)){
		$mesaj = '<div class="alert alert-danger" role="alert">Geçerli bir yorum gir!</div>';
	}
	else{
		$mesaj = '';
	}
	if($mesaj == ''){
		$veri = array(
			':yorum'  => $yorum,
			':konu_id'  => $_GET['konu_id'],
			':yorum_yazar_id'  => $_SESSION['user_id'],
			':yorum_yazar_kullanici_adi'  => $_SESSION['uye_kullanici_adi'],
			':yorum_durum'  => '1'
		);
		$sorgu = "
    	INSERT INTO yorumlar 
    	(yorum, konu_id, yorum_yazar_id, yorum_yazar_kullanici_adi, yorum_durum) 
    	VALUES (:yorum, :konu_id, :yorum_yazar_id, :yorum_yazar_kullanici_adi, :yorum_durum)
    	";
    	$statement = $connect->prepare($sorgu);
    	if($statement->execute($veri)){
    		$mesaj = '<div class="alert alert-success" role="alert">Kayıt başarılı</div>';
    	}else{
    		$mesaj = '<div class="alert alert-danger" role="alert">Kayıt başarısız</div>';
    	}
	}
}
?>

<?php
if(isset($_SESSION['user_id'])){
?>
	
<div class="card card-lg mt-3">
	<div class="card-body">
		<form method="post" id="yorum_yap">
			<?php echo $mesaj;?>
			<div class="form-floating mb-3">
				<textarea class="form-control" placeholder="Geçerli bir yorum gir" id="yorum" name="yorum"></textarea>
				<label for="yorum">Yorum</label>
			</div>
			<div class="mb-3">
				<button type="submit" name="yorum_yap" id="yorum_yap" class="btn btn-lg d-block w-100 btn-primary">Yorum yap</button>
			</div>
		</form>
	</div>
</div>
<?php
}
else{
?>
<div class="card card-lg mt-3">
	<div class="card-body">
		<div class="alert alert-warning" role="alert">
  			Yorum yapmak için giriş yapın.
		</div>
	</div>
</div>

<?php
}
?>