<?php
include ('includes/header.php');
require ('mysqli_connect.php');
if (isset($_GET['log'])) {
	if ($_GET['log'] == 1) {
		echo "<div class='alert alert-success alert-dismissible show' role='alert'>Successfully logged in.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	} else {
		echo "<div class='alert alert-success alert-dismissible show' role='alert'>Successfully logged out.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}
}
if (isset($_GET['stars'])) {
	$stars = $_GET['stars'];
	$bid = $_COOKIE['user_id'];
	$sid = $_GET['id'];
	$s = $_GET['stars'];
	if ($sid != $bid) {
		$q = "SELECT star_id FROM stars WHERE (buyer_id='$bid' AND seller_id='$sid')";
    $r = @mysqli_query($dbc, $q);
    $num = @mysqli_num_rows($r);
    if ($num === 0) {
			$q = "INSERT INTO stars (buyer_id, seller_id, value) VALUES ('$bid', '$sid', '$s')";
			$r = @mysqli_query ($dbc, $q);
		  if ($r) {
		    echo "<div class='alert alert-success alert-dismissible show' role='alert'>Your rate has been successfully send.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		  } else {
		    echo "<div class='alert alert-danger alert-dismissible show' role='alert'>Something went wrong due to our system. Sorry for the inconvenience.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		      echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
		  }
		} else {
	    echo "<div class='alert alert-danger alert-dismissible show' role='alert'>You cannot vote twice the same seller.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		}
	} else {
	    echo "<div class='alert alert-danger alert-dismissible show' role='alert'>You cannot rate yourself.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	}
}

include('includes/jumbotron.html');
if (!isset($_GET['fid']) && !isset($_GET['id'])) {
	include('includes/search_bar.php');
}

if (isset($_GET['q'])) {
	$search = $_GET['q'];
	switch($_GET['s']) {
		case 'new':
			$order_p = 'newest published';
			$order = 'F.published DESC';
			break;
		case 'old':
			$order_p = 'oldest published';
			$order = 'F.published ASC';
			break;
		case 'low':
			$order_p = 'lowest price';
			$order = 'F.price ASC';
			break;
		case 'high':
			$order_p = 'highest price';
			$order = 'F.price DESC';
			break;
	}
	$q = "SELECT U.user_id, U.username, F.name, F.description, F.price, F.images, F.status, F.figure_id FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id WHERE F.name LIKE '%$search%' OR U.username = '$search' ORDER BY $order";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		$cont = 4;
		echo "<div class='row search-title'>
			<div class='col-sm-12 text-center'>
				<p>Results for your search '".$_GET['q']."' ordered by $order_p:</p>
			</div>
		</div>";
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
	include('includes/index_profile.php');
	$q = "SELECT U.username, U.user_id, F.name, F.description, F.price, F.images, F.status, F.figure_id FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id WHERE U.user_id=$id ORDER BY F.published DESC";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		$cont = 0;
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
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

mysqli_close($dbc);	
?>
<?php
include ('includes/footer.html');
?>

