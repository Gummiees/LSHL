<?php
require ('mysqli_connect.php');
include ('includes/header.php');
include('includes/print_messages.php');

if (isset($_GET['log'])) {
	if ($_GET['log'] == 1 && isset($_COOKIE['username'])) echo print_message('success', 'Successfully logged in.');
	else if ($_GET['log'] == 2  && !isset($_COOKIE['username'])) echo print_message('success', 'Successfully logged out.');
	else if ($_GET['log'] == 3  && !isset($_COOKIE['username'])) echo print_message('danger', 'Logged out because someone was trying to hijack your account.');
	else if ($_GET['log'] == 4  && isset($_COOKIE['username'])) echo print_message('success', 'Your figure was Successfully deleted.');
}


include('includes/jumbotron.html');
if (!isset($_GET['fid']) && !isset($_GET['username'])) {
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
	$q = "SELECT U.username, F.name, F.description, F.price, F.images, F.status, F.figure_id FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id WHERE F.name LIKE '%$search%' OR U.username = '$search' ORDER BY $order";		
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
  	echo print_message('danger', 'Your search featured no results.');
	}
} else if (isset($_GET['fid'])) {
	$figure_id = $_GET['fid'];
	$q = "SELECT U.username, F.name, F.description, F.price, F.images, F.status FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id WHERE F.figure_id = $figure_id ORDER BY F.published DESC";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		$cont = 0;
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			include('includes/show_product.php');
		}
		mysqli_free_result ($r);
	}
} else {
	$q = "SELECT U.username, F.name, F.description, F.price, F.images, F.status, F.figure_id
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
  	echo print_message('danger', 'There are currently no registered figures.');
	}
}

mysqli_close($dbc);	
?>
<?php
include ('includes/footer.html');
?>

