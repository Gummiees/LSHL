<?php
include ('includes/header.php');
?>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="jumbotron text-center col-sm-7">
	  <h1>Love Second Hand Live!</h1> 
	  <p>The best and biggest website to buy or sell figures online.</p>
	</div>
	<div class="col-sm-4">
	  <img src="images/logo.png" alt="Logo" class="logo">
	</div>
</div>

<?php
require ('mysqli_connect.php');
if (isset($_GET['q'])) {
	$search = $_GET['q'];
	$q = "SELECT U.user_id, U.username, F.name, F.description, F.price, F.images, F.status, F.figure_id FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id WHERE F.name LIKE '%$search%' OR U.username = '$search' ORDER BY F.published DESC";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		$cont = 4;
		echo "<div class='row username-title'><p>Results for your search '".$_GET['q']."':</p></div>";
		echo '<div class="row"><div class="col-sm-1"></div><div class="col-sm-10 cards-container">';
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			include ('includes/show_card.php');
		}
		mysqli_free_result ($r);
	} else {
		 echo "<div class='alert alert-danger alert-dismissible show' role='alert'>Your search featured no results.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}
} else if (isset($_GET['fid'])) {
	$figure_id = $_GET['fid'];
	$q = "SELECT U.user_id, U.username, F.name, F.description, F.price, F.images, F.status FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id WHERE F.figure_id = $figure_id ORDER BY F.published DESC";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		$cont = 0;
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			include('includes/show_product.php');
		}
		mysqli_free_result ($r);
	}
} else if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$q = "SELECT U.user_id, U.username, U.description AS user_desc, U.image AS profile_pic, U.telephone, U.email, F.name, F.description, F.price, F.images, F.status, F.figure_id FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id WHERE U.user_id=$id ORDER BY F.published DESC";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		$cont = 0;
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		$images = explode(",", $row['images']);
		echo '<div class="user-info"><div class="row"><div class="col-sm-3 img-profile"><img src="'.$row['profile_pic'].'" alt="'.$row['username'].' profile image" class="img-thumbnail"></div><div class="col-sm-9"><div class="row username-profile">'.$row['username'].'</div><div class="row desc-profile">'.$row['user_desc'].'</div><div class="row email-profile" style="margin-top: 20px;"><i>Email: '.$row['email'].'</i></div><div class="row tel-profile"><i>Telephone: '.$row['telephone'].'</i></div><div class="row desc-profile"><b>Selling '.$num.' figures!</b></div></div></div></div><div class="row username-title"><p><i>'.$row['username'].' </i> is selling</p></div>';
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
				echo '</div><a class="carousel-control-prev" href="#carouselExampleIndicators'.$cont.'" role="button" data-slide="prev"><span class="carousel-control-prev-icon" aria-hidden="true"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carouselExampleIndicators'.$cont.'" role="button" data-slide="next"><span class="carousel-control-next-icon" aria-hidden="true"></span><span class="sr-only">Next</span></a></div>';
			echo '</div><div class="col-sm-8 product-text"><div class="row product-title">'.$row['name'].'</div><hr><div class="row product-desc text-justify">'.$row['description'].'</div><hr><div class="row product-footer"><div class="col-sm-6 text-left product-price">'.$row['price'].'€</div><div class="col-sm-6 text-right product-seller"><a href="index.php?id='.$row['user_id'].'">'.$row['username'].'</a></div></div></div></div>';
		}
		$cont++;
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			include('includes/show_product.php');
		}
		mysqli_free_result ($r);
	} else {
		 echo "<div class='alert alert-danger alert-dismissible show' role='alert'>Your search featured no results.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}
}else {
	$q = "SELECT U.user_id, U.username, F.name, F.description, F.price, F.images, F.status, F.figure_id
	FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id ORDER BY F.published DESC";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		$cont = 4;
		echo '<div class="row"><div class="col-sm-1"></div><div class="col-sm-10 cards-container">';
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
		include ('includes/show_card.php');
		}
		echo '</div><div class="col-sm-1"></div></div>';
		mysqli_free_result ($r);
	} else {
		 echo "<div class='alert alert-danger alert-dismissible show' role='alert'>There are currently no registered figures.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}
}
?>
<?php
include ('includes/footer.html');
?>

