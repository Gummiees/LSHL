<?php
if (1 == $row['status']) {
	$images = explode(",", $row['images']);
	echo '<div class ="row product"><div class="product-img-div col-sm-4">';
	echo '<div id="carouselExampleIndicators'.$cont.'" class="carousel slide" data-ride="carousel"><ol class="carousel-indicators">';
	foreach ($images as $key => $img) {
		if ($key == 0) echo '<li data-target="#carouselExampleIndicators'.$cont.'" data-slide-to="'.$key.'" class="active"></li>';
		else echo '<li data-target="#carouselExampleIndicators'.$cont.'" data-slide-to="'.$key.'"></li>';
	}
	echo '</ol><div class="carousel-inner" role="listbox">';
	foreach ($images as $key => $img) {
		if ($key == 0) echo '<div class="carousel-item active"><img class="d-block img-fluid" src="'.$img.'" alt="First slide"></div>';
		else echo '<div class="carousel-item"><img class="d-block img-fluid" src="'.$img.'" alt="Second slide"></div>';
	}
	echo '</div>
	<a class="carousel-control-prev" href="#carouselExampleIndicators'.$cont.'" role="button" data-slide="prev">
		<span class="fa fa-chevron-left" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	<a class="carousel-control-next" href="#carouselExampleIndicators'.$cont.'" role="button" data-slide="next">
		<span class="fa fa-chevron-right" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
	</div>';
	echo '</div><div class="col-sm-8 product-text"><div class="row product-title"><div class="col-sm-10">'.$row['name'].'</div>';
	if (isset($myprofile)) echo '<div class="col-sm-2 text-right product-seller"><a href="edit_fig.php?fid='.$row['figure_id'].'"><span class="material-icons">mode_edit</span></a><a href="del_fig.php?fid='.$row['figure_id'].'"><span class="material-icons">delete_forever</span></a></div>';
	echo '</div><hr><div class="row product-desc text-justify">'.$row['description'].'</div><hr><div class="row product-footer"><div class="col-sm-6 text-left product-price">'.$row['price'].'€</div><div class="col-sm-6 text-right product-seller"><a href="profile.php?id='.$row['username'].'">'.$row['username'].'</a></div></div></div></div>';
}
$cont++;
?>