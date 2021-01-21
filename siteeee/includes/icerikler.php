<section id="blog" style="padding: 4rem 0;background-color: #f0f2f4;">

	<div class="container align-self-start">
		<div class="row">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8">
					<div class="card card-lg">
						<div class="card-body">
							<div class="mb-3">
								<h1 class="text-primary">Son gönderiler</h1>
							</div>
							<?php
							  $query = "
							  SELECT * FROM konular  
							  ORDER BY konu_id DESC 
							  LIMIT 15
							  ";
							  $statement = $connect->prepare($query);
							  $statement->execute();
							  $result = $statement->fetchAll();
							  foreach($result as $row){
							  	if($row['konu_yayin_durumu'] == '1'){
							  		
							?>
							<div class="mb-3">
								<a class="text-dark" href="icerik.php?konu_id=<?php echo $row['konu_id'];?>"><h1 class="h3 mb-2"><?php echo $row['konu_baslik'];?></h1></a>
								<span><?php echo substr($row['konu_icerik'], 0, 350);?>...</span>
								<a class="h6 text-dark" href="icerik.php?konu_id=<?php echo $row['konu_id'];?>">Devamını gör</a>
							</div>
							<?php
							  	}
							  }

							?>

							<?php
							if(!isset($_SESSION['user_id'])){
							?>
							<div class="mb-3">
								<h4 class="text-danger">Yorum yapabilmek için giriş yapın</h4>
							</div>
							<?php }
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>




  </section>