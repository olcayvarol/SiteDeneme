<?php
$mesaj = '';
if(isset($_SESSION['user_id'])){
	if($_SESSION["uye_tur"] == '1' or $_SESSION["uye_tur"] == '2'){
		if(isset($_POST['icerik_olustur'])){
			$konu_baslik = trim($_POST["konu_baslik"]);
			$konu_icerik = trim($_POST["konu_icerik"]);
			$yayin_durumu = trim($_POST["yayin_durumu"]);
			if(empty($konu_baslik)){
				$mesaj = '<div class="alert alert-danger" role="alert">Geçerli bir konu başlığı gir!</div>';
			}
			else{
				if(empty($konu_icerik)){
					$mesaj = '<div class="alert alert-danger" role="alert">Geçerli bir içerik konusu gir!</div>';
				}
				else{
					if(empty($yayin_durumu)){
						$mesaj = '<div class="alert alert-danger" role="alert">Konu yayın durumunu seçin!</div>';
					}
					else{
						$mesaj = '';
					}
				}
			}

			if($mesaj == ''){
				$veri = array(
					':konu_baslik'  => $konu_baslik,
					':konu_icerik'  => $konu_icerik,
					':konu_yayin_durumu'  => $yayin_durumu,
					':konu_yazar_id'  => $_SESSION['user_id']
				);
				$sorgu = "
		    	INSERT INTO konular 
		    	(konu_baslik, konu_icerik, konu_yayin_durumu, konu_yazar_id) 
		    	VALUES (:konu_baslik, :konu_icerik, :konu_yayin_durumu, :konu_yazar_id)
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

<section style="padding: 7.5rem 0;">
	<div class="container align-self-start">
		<div class="row mb-5">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8">
					<div class="card card-lg text-center">
						<div class="card-body">
							<div class="mb-5">
								<h1 class="h2 mb-2">Merhaba,</h1>
								<span>İçerik oluşturmak için alanları doldur</span>
							</div>
							
							<div class="row no-gutters justify-content-center">

								<form class="text-left col-lg-8" method="post" id="icerik_olustur">
									<?php echo $mesaj; ?>
									<div class="mb-3">
										<label for="konu_baslik">Konu başlık
											<span class="text-danger">*</span>
										</label>
										<input class="form-control form-control-lg" type="text" name="konu_baslik" id="konu_baslik" placeholder="Konu başlık">
									</div>
									<div class="mb-3">
										<div class="form-floating">
											<textarea class="form-control" placeholder="Leave a comment here" id="konu_icerik" name="konu_icerik"></textarea>
											<label for="konu_icerik">İçerik gir</label>
										</div>
									</div>
									<div class="mb-3">
										<label for="login-password">Yayın durumu
											<span class="text-danger">*</span>
										</label>
										<select class="form-select form-select-lg" aria-label="Default select example" name="yayin_durumu" id="yayin_durumu">
											<option value="1">Yayınla</option>
											<option value="2">Yayınlama</option>
										</select>
									</div>
									<div class="mb-3 text-center">
										<button type="submit" name="icerik_olustur" id="icerik_olustur" class="btn btn-lg d-block w-100 btn-primary">İçerik oluştur</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<?php
	}
	else{
		$mesaj = '<div class="alert alert-danger" role="alert"><b>Standart kullanıcı! </b>İçerik girmek için yetkiniz yoktur</div>';
	}

?>
<section style="padding: 7.5rem 0;">
	<div class="container align-self-start">
		<div class="row mb-5">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8 col-lg-7">
					<div class="card card-lg text-center">
						<div class="card-body">
							<div class="mb-5">
								<h1 class="h2 mb-2">Hay aksi :(</h1>
								<span>Lütfen daha sonra tekrar dene...</span>
							</div>
							
							<div class="row no-gutters justify-content-center">

								<form class="text-left col-lg-8" method="post" id="icerik_olustur">
									<?php echo $mesaj; ?>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php
}else{
	header('location:giris.php');
}

?>