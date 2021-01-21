<?php
$sorgu = "
 SELECT * FROM yorumlar 
 WHERE konu_id = '".$_GET['konu_id']."'
 ";
$statement = $connect->prepare($sorgu);
$statement->execute(
	array(
	':konu_id' => $_GET["konu_id"]
	)
);
$count = $statement->rowCount();
if($count > 0){
	$result = $statement->fetchAll();{
		foreach($result as $row){
			if($row["yorum_durum"] == '1'){
?>
<div class="card card-lg">
	<div class="card-body">
		<div class="h5"><?php echo $row['yorum_yazar_kullanici_adi'];?></div>
		<span><?php echo $row['yorum'];?></span>
	</div>
</div>
<?php

			}
		}
	}
}