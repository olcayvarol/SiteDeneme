<?php
$mesaj = '';
if(isset($_POST['giris_form'])){
	$giris_eposta = trim($_POST["giris_eposta"]);
	$giris_sifre = trim($_POST["giris_sifre"]);
	if(empty($giris_eposta)){
		$mesaj = '<div class="alert alert-danger" role="alert">Geçerli bir e-posta gir!</div>';
	}else{
		if(empty($giris_sifre)){
			$mesaj = '<div class="alert alert-danger" role="alert">Geçerli bir şifre gir!</div>';
		}else{
			$mesaj = '';
		}
	}

	if($mesaj == ''){
		$sorgu = "
	 	SELECT * FROM uyeler 
	    WHERE uye_eposta = :giris_eposta
	 	";
	 	$statement = $connect->prepare($sorgu);
		$statement->execute(
		  array(
		      ':giris_eposta' => $_POST["giris_eposta"]
		     )
		);
		$count = $statement->rowCount();
		if($count > 0){
			$result = $statement->fetchAll();
			foreach($result as $row){
				if($row["uye_durum"] == '0'){
					if(password_verify($giris_sifre, $row['uye_sifre'])){
						$_SESSION['user_id'] = $row['uye_id'];
						$_SESSION['uye_ad'] = $row['uye_ad'];
						$_SESSION['uye_kullanici_adi'] = $row['uye_kullanici_adi'];
						$_SESSION['uye_soyad'] = $row['uye_soyad'];
						$_SESSION['uye_eposta'] = $row['uye_eposta'];
						$_SESSION['uye_tur'] = $row['uye_tur'];
						$_SESSION['uye_durum'] = $row['uye_durum'];
						header('location:index.php');
					}else{
						$mesaj = '<div class="alert alert-danger" role="alert">Hatalı bir şifre girdin</div>';
					}
				}
				else if($row["uye_durum"] == '1'){
					$mesaj = '<div class="alert alert-warning" role="alert">Hesabın askıya alınmıştır</div>';
				}
				else{
					$mesaj = '<div class="alert alert-danger" role="alert">Hesabın silinmiştir</div>';
				}
			}
		}else{
			$mesaj = '<div class="alert alert-danger" role="alert">Böyle bir e-posta adresine bulunamıyor</div>';
		}
	}
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
								<h1 class="h2 mb-2">Hoş geldin</h1>
								<span>Devam etmek için giriş yapın</span><br>
							</div>
							<div class="row no-gutters justify-content-center">
								<form class="text-left col-lg-8" method="post" id="giris_form">
									<?php echo $mesaj;?>
									<div class="mb-3">
										<label for="login-email">E-posta adresi
											<span class="text-danger">*</span>
										</label>
										<input class="form-control form-control-lg" type="email" name="giris_eposta" id="giris_eposta" placeholder="E-posta">
									</div>
									<div class="mb-3">
										<label for="login-password">Şifre
											<span class="text-danger">*</span>
										</label>
										<input class="form-control form-control-lg" type="password" name="giris_sifre" id="giris_sifre" placeholder="Şifre">
									</div>
									<div class="mb-3 text-center">
										<button type="submit" name="giris_form" id="giris_form" class="btn btn-lg d-block w-100 btn-primary">Giriş yap</button>
									</div>
									<div class="mb-3 text-center">
										<span class="text-small">Bir hesabın yok mu?
											<a href="kaydol.php">Hesap oluştur</a>
										</span><br><br>
										<span><b>Yönetici:</b></span>
										<span>olcayv0@gmail.com - Şifre: q1w2e3</span><br>
										<span><b>Yazar:</b></span>
										<span>ismetsongur@gmail.com - Şifre: q1w2e3</span><br>
										<span><b>Standart:</b></span>
										<span>test@gmail.com - Şifre: q1w2e3</span>
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