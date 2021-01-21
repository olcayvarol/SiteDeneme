<?php
include_once "includes/baglan.php";
session_start();
if(isset($_SESSION['user_id'])){
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-light" style="background-color: #0c457d!important;">
	<div class="container">
		<a class="navbar-brand" href="index.php" style="color:#fff;">Olcay VAROL</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
			<ul class="navbar-nav"></ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="index.php" class="nav-link">Anasayfa</a>
				</li>
				<li class="nav-item">
					<a href="icerik_ekle.php" class="nav-link">Yeni içerik</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo $_SESSION['uye_eposta'];?></a>
					<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
						<li><a class="dropdown-item" href="icerikler.php">İçerikler</a></li>
						<li><a class="dropdown-item" href="uyeler.php">Üyeler</a></li>
						<li><hr class="dropdown-divider"></li>
						<li><a class="dropdown-item text-danger" href="cikis.php">Çıkış yap</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<?php
}else{
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-light" style="background-color: #0c457d!important;">
	<div class="container">
		<a class="navbar-brand" href="index.php" style="color:#fff;">Olcay VAROL</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
			<ul class="navbar-nav"></ul>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="index.php" class="nav-link">Anasayfa</a>
				</li>
				<li class="nav-item">
					<a href="#yetenekler" class="nav-link">Hakkımda</a>
				</li>
				<li class="nav-item">
					<a href="#blog" class="nav-link">Blog</a>
				</li>
				<li class="nav-item">
					<a href="#yetenekler" class="nav-link">Yetenekler</a>
				</li>
				<li class="nav-item">
					<a href="#iletisim" class="nav-link">İletişim</a>
				</li>
				<li class="nav-item">
					<a href="giris.php" class="nav-link">Giriş yap</a>
				</li>
			</ul>
		</div>
	</div>
</nav>


<?php
}
?>