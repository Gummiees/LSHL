<?php 
if (1 == $row['status']) {
	$images = explode(",", $row['images']);
	if ($cont%4==0) {
		echo '<div class="card-deck" style="margin-top: 10px;">';
	}
	echo '<div class="card">';
	echo '<div id="carouselExampleIndicators'.($cont - 4).'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators">';
	foreach ($images as $key => $img) {
		if ($key == 0) echo '<li data-target="#carouselExampleIndicators'.($cont - 4).'" data-slide-to="'.$key.'" class="active"></li>';
		else echo '<li data-target="#carouselExampleIndicators'.($cont - 4).'" data-slide-to="'.$key.'"></li>';
	}
	echo '</ol><div class="carousel-inner" role="listbox">';
	foreach ($images as $key => $img) {
		if ($key == 0) echo '<div class="carousel-item active"><img class="d-block img-fluid" src="'.$img.'" alt="First slide"></div>';
		else echo '<div class="carousel-item"><img class="d-block img-fluid" src="'.$img.'" alt="Second slide"></div>';
	}
	echo '</div>
		<a class="carousel-control-prev" href="#carouselExampleIndicators'.($cont - 4).'" role="button" data-slide="prev">
			<span class="fa fa-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#carouselExampleIndicators'.($cont - 4).'" role="button" data-slide="next">
			<span class="fa fa-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
	<div class="card-body">
		<div class="card-title">
			<a href="index.php?fid='.$row['figure_id'].'">
				<h4 class="text-center">'.$row['name'].'</h4>
			</a>
		</div>
	</div>
	<div class="card-footer">
		<small>
			<a href="profile.php?username='.$row['username'].'">'.$row['username'].'</a>
		</small>
	<div class="card-price">
		<b>'.$row['price'].'€</b>
	</div>
</div></div>';
	if ($cont%4==3) {
		echo '</div>';
	}
	$cont++;
}
?>