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
	$q = "SELECT U.user_id, U.username, F.name, F.description, F.price, F.image, F.status FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id WHERE F.name LIKE '%$search%' ORDER BY F.published DESC";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			if (1 == $row['status']) {
				echo '<div class ="row product"><div class="product-img-div col-sm-4"><img src="'.$row['image'].'" alt="'.$row['name'].'" class="product-image"></div><div class="col-sm-8 product-text"><div class="row product-title">'.$row['name'].'</div><hr><div class="row product-desc text-justify">'.$row['description'].'</div><hr><div class="row product-footer"><div class="col-sm-6 text-left product-price">'.$row['price'].'€</div><div class="col-sm-6 text-right product-seller"><a href="index.php?id='.$row['user_id'].'">'.$row['username'].'</a></div></div></div></div>';
			}
		}
		mysqli_free_result ($r);
	} else {
		echo '<p class="error">Your search featured no results.</p>';
	}
} else if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$q = "SELECT U.user_id, U.username, U.description AS user_desc, U.image AS profile_pic, U.telephone, U.email, F.name, F.description, F.price, F.image, F.status FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id WHERE U.user_id=$id ORDER BY F.published DESC";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		echo '<div class="user-info"><div class="row"><div class="col-sm-3 img-profile"><img src="'.$row['profile_pic'].'" alt="'.$row['username'].' profile image" class="img-thumbnail"></div><div class="col-sm-9"><div class="row username-profile">'.$row['username'].'</div><div class="row desc-profile">'.$row['user_desc'].'</div><div class="row email-profile" style="margin-top: 20px;"><i>Email: '.$row['email'].'</i></div><div class="row tel-profile"><i>Telephone: '.$row['telephone'].'</i></div><div class="row desc-profile"><b>Selling '.$num.' figures!</b></div></div></div></div>';
		echo '<div class="row text-center username-title"><i>'.$row['username'].' </i> is selling</div>';
		if (1 == $row['status']) {
			echo '<div class ="row product"><div class="product-img-div col-sm-4"><img src="'.$row['image'].'" alt="'.$row['name'].'" class="product-image"></div><div class="col-sm-8 product-text"><div class="row product-title">'.$row['name'].'</div><hr><div class="row product-desc text-justify">'.$row['description'].'</div><hr><div class="row product-footer"><div class="col-sm-6 text-left product-price">'.$row['price'].'€</div><div class="col-sm-6 text-right product-seller"><a href="index.php?id='.$row['user_id'].'">'.$row['username'].'</a></div></div></div></div>';
		}
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			if (1 == $row['status']) {
				echo '<div class ="row product"><div class="product-img-div col-sm-4"><img src="'.$row['image'].'" alt="'.$row['name'].'" class="product-image"></div><div class="col-sm-8 product-text"><div class="row product-title">'.$row['name'].'</div><hr><div class="row product-desc text-justify">'.$row['description'].'</div><hr><div class="row product-footer"><div class="col-sm-6 text-left product-price">'.$row['price'].'€</div><div class="col-sm-6 text-right product-seller"><a href="index.php?id='.$row['user_id'].'">'.$row['username'].'</a></div></div></div></div>';
			}
		}
		mysqli_free_result ($r);
	} else {
		echo '<p class="error">Your search featured no results.</p>';
	}
}else {
	$q = "SELECT U.user_id, U.username, F.name, F.description, F.price, F.image, F.status FROM figures AS F
	INNER JOIN users AS U ON U.user_id = F.user_id ORDER BY F.published DESC";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		$cont = 3;
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			if (1 == $row['status']) {
				//echo '<div class ="row product"><div class="product-img-div col-sm-4"><img src="'.$row['image'].'" alt="'.$row['name'].'" class="product-image"></div><div class="col-sm-8 product-text"><div class="row product-title">'.$row['name'].'</div><hr><div class="row product-desc text-justify">'.$row['description'].'</div><hr><div class="row product-footer"><div class="col-sm-6 text-left product-price">'.$row['price'].'€</div><div class="col-sm-6 text-right product-seller"><a href="index.php?id='.$row['user_id'].'">'.$row['username'].'</a></div></div></div></div>';
				if ($cont%3==0) {
					echo '<div class="card-deck">';
				}
				echo '<div class="card"><img class="card-img-top" src="'.$row['image'].'" alt="'.$row['name'].'"><div class="card-body"><h4 class="card-title">'.$row['name'].'</h4></div><div class="card-footer"><small class="text-muted"><a href="index.php?id='.$row['user_id'].'">'.$row['username'].'</a></small></div></div>';
				if ($cont%3==2) {
					echo '</div>';
				}
				$cont++;
			}
		}
		mysqli_free_result ($r);
	} else {
		echo '<p class="error">There are currently no registered figures.</p>';
	}
}
?>
<?php
include ('includes/footer.html');
?>

  