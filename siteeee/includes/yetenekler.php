<section style="padding: 4rem 0;" id="yetenekler">
	<div class="container align-self-start">
		<div class="row">
			<div class="row justify-content-center">
				<div class="col-12 col-md-8">
					<div class="card card-lg">
						<div class="card-body">
							<div class="mb-3">
								<h1 class="text-center">Ben kimim, neler yaparım?</h1>
								<div class="lead text-center">Mesleğimle ilgili bir eğitim almadan sektörde kendimi alaylı olarak geliştirdim. Bilişim sektörüne girdiğim 2008 yılından bu yana birçok kişisel ve kurumsal web projesini tamamladım.

İş hayatımda son derece özverili ve disiplinli çalışan biriyim. Özenli çalıştığım sürece tüm işlerimin başarıyla sonuçlanacağını biliyorum.</div>
								<?php
								  $query = "
								  SELECT * FROM yetenekler  
								  ORDER BY yetenek_id DESC
								  ";
								  $statement = $connect->prepare($query);
								  $statement->execute();
								  $result = $statement->fetchAll();
								  foreach($result as $row){
								  	if($row['yetenek_durum'] == '1'){
								  		
								?>
								<div class="mt-3">
									<?php echo $row['yetenek'];?>
									<div class="progress">
									  <div class="progress-bar" role="progressbar" style="width: <?php echo $row['yetenek_seviye'];?>%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"><?php echo $row['yetenek_seviye'];?>%</div>
									</div>
								</div>
								<?php
								  	}
								  }

								  ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>