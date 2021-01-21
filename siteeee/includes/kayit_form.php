<?php
$mesaj = '';
if(isset($_POST['kayit_form'])){
	
	$kayit_ad = trim($_POST["kayit_ad"]);
	$kayit_soyad = trim($_POST["kayit_soyad"]);
	$kayit_kullanici_adi = trim($_POST["kayit_kullanici_adi"]);
	$kayit_eposta = trim($_POST["kayit_eposta"]);
	$kayit_sifre = trim($_POST["kayit_sifre"]);
	$kayit_turu = trim($_POST["kayit_turu"]);

	if(empty($kayit_ad)){
		$mesaj = '<div class="alert alert-danger" role="alert">Geçerli bir ad gir!</div>';
	}
	else{
		if(empty($kayit_soyad)){
			$mesaj = '<div class="alert alert-danger" role="alert">Geçerli bir soyad gir!</div>';
		}else{
			if(empty($kayit_kullanici_adi)){
				$mesaj = '<div class="alert alert-danger" role="alert">Geçerli bir kullanıcı adı gir!</div>';
			}else{
				if(empty($kayit_eposta)){
					$mesaj = '<div class="alert alert-danger" role="alert">Geçerli bir e-posta gir!</div>';
				}else{
					$kontrol_sorgusu = "
				 	SELECT * FROM uyeler 
				 	WHERE uye_eposta = :kayit_eposta
				 	";
				 	$statement = $connect->prepare($kontrol_sorgusu);
				 	$veri_kontrol = array(
  					':kayit_eposta'  => $kayit_eposta
 					);
 					if($statement->execute($veri_kontrol)){
 						if($statement->rowCount() > 0){
 							$mesaj = '<div class="alert alert-danger" role="alert">E-posta zaten kullanılıyor!</div>';
 						}else{
 							if(empty($kayit_sifre)){
 								$mesaj = '<div class="alert alert-danger" role="alert">Geçerli bir şifre gir!</div>';
 							}else{
 								if(empty($kayit_turu)){
 									$mesaj = '<div class="alert alert-danger" role="alert">Hesap türünüzü seçin!</div>';
 								}else{
 									$mesaj = '';
 								}
 							}
 						}
 					}
				}
			}
		}
	}

	if($mesaj == ''){
		$veri = array(
			':kayit_ad'  => $kayit_ad,
			':kayit_soyad'  => $kayit_soyad,
			':kayit_kullanici_adi'  => $kayit_kullanici_adi,
			':kayit_eposta'  => $kayit_eposta,
			':kayit_sifre'  => password_hash($kayit_sifre, PASSWORD_DEFAULT),
			':kayit_turu'  => $kayit_turu,
			':uye_durum'  => '0'
		);

		$sorgu = "
    	INSERT INTO uyeler 
    	(uye_ad, uye_soyad, uye_kullanici_adi, uye_eposta, uye_sifre, uye_tur, uye_durum) 
    	VALUES (:kayit_ad, :kayit_soyad, :kayit_kullanici_adi, :kayit_eposta, :kayit_sifre, :kayit_turu, :uye_durum)
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

<section style="padding: 4rem 0;">
	<div class="container align-self-start">
		<div class="row mb-5">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8 col-lg-7">
					<div class="card card-lg text-center">
						<div class="card-body">
							<div class="mb-5">
								<h1 class="h2 mb-2">Hoş geldin</h1>
								<span>Devam etmek için kaydolun</span>
							</div>
							
							<div class="row no-gutters justify-content-center">

								<form class="text-left col-lg-8" method="post" id="kayit_form">
									<?php echo $mesaj; ?>
									<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for="first-name">Ad:
                          						<span class="text-danger">*</span>
                        					</label>
                        					<input class="form-control form-control-lg" type="text" name="kayit_ad" id="kayit_ad" placeholder="Ad">
										</div>
									</div>
									<div class="col-6">
										<div class="form-group">
											<label for="last-name">Soyad:
												<span class="text-danger">*</span>
											</label>
											<input class="form-control form-control-lg" type="text" name="kayit_soyad" id="kayit_soyad" placeholder="Soyad">
										</div>
									</div>
									</div>
									<div class="mb-3">
										<label for="login-email">Kullanıcı adı
											<span class="text-danger">*</span>
										</label>
										<input class="form-control form-control-lg" type="text" name="kayit_kullanici_adi" id="kayit_kullanici_adi" placeholder="Kullanıcı adı">
									</div>
									<div class="mb-3">
										<label for="login-email">E-posta adresi
											<span class="text-danger">*</span>
										</label>
										<input class="form-control form-control-lg" type="email" name="kayit_eposta" id="kayit_eposta" placeholder="E-posta">
									</div>
									<div class="mb-3">
										<label for="login-password">Şifre
											<span class="text-danger">*</span>
										</label>
										<input class="form-control form-control-lg" type="password" name="kayit_sifre" id="kayit_sifre" placeholder="Şifre">
									</div>
									<div class="mb-3">
										<label for="login-password">Hesap türü
											<span class="text-danger">*</span>
										</label>
										<select class="form-select form-select-lg" aria-label="Default select example" name="kayit_turu" id="kayit_turu">
											<option value="1">Yönetici</option>
											<option value="2">Yazar</option>
											<option value="3">Standart</option>
										</select>
									</div>
									<div class="mb-3 text-center">
										<button type="submit" name="kayit_form" id="kayit_form" class="btn btn-lg d-block w-100 btn-primary">Hesap oluştur</button>
									</div>
									<div class="mb-3 text-center">
										<span class="text-small">Zaten bir hesabın var mı?
											<a href="giris.php">Giriş yap</a>
										</span>
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