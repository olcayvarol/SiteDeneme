<section id="blog" style="padding: 4rem 0;background-color: #f0f2f4;">
	<div class="container align-self-start">
		<div class="row">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8">
					<?php
					if(isset($_GET['konu_id'])){
						$sorgu = "
					 	SELECT * FROM konular 
					    WHERE konu_id = :konu_id
					 	";
					 	$statement = $connect->prepare($sorgu);
						$statement->execute(
						  array(
						      ':konu_id' => $_GET["konu_id"]
						     )
						);
						$count = $statement->rowCount();
						if($count > 0){
							$result = $statement->fetchAll();
							foreach($result as $row){
								if($row["konu_yayin_durumu"] == '1'){

					?>
					<div class="card card-lg">
						<div class="card-body">
							<div class="mb-3">
								<a class="text-primary" href="icerik.php?konu_id=<?php echo $row['konu_id'];?>"><h1 class="h3 mb-2"><?php echo $row['konu_baslik'];?></h1></a>
								<span><?php echo $row['konu_icerik'];?></span>
							</div>
						</div>
					</div>
					<?php
								}
							}
						}
					}
					else{
						header('location:index.php');
					}
					?>
					<?php 
						include_once "yorum_form.php";
						include_once "yorumlar.php";
					?>
				</div>
			</div>
		</div>
	</div>









  </section>