<?php
require ('mysqli_connect.php');
include('includes/header.php');
include('includes/print_messages.php');
if (isset($_GET['stars'])) {
	$stars = $_GET['stars'];
	$bid = $_COOKIE['username'];
	$sid = $_GET['username'];
	$s = $_GET['stars'];
	if ($sid != $bid) {
		$q = "SELECT user_id FROM users WHERE username='$bid'";
    $r = @mysqli_query($dbc, $q);
    $num = @mysqli_num_rows($r);
    if ($num == 1) {
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
			$bid = $row['user_id'];
			$q = "SELECT user_id FROM users WHERE username='$sid'";
	    $r = @mysqli_query($dbc, $q);
	    $num = @mysqli_num_rows($r);
    	if ($num == 1) {
				$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
				$sid = $row['user_id'];
				$q = "SELECT star_id FROM stars WHERE (buyer_id='$bid' AND seller_id='$sid')";
		    $r = @mysqli_query($dbc, $q);
		    $num = @mysqli_num_rows($r);
		    if ($num === 0) {
					$q = "INSERT INTO stars (buyer_id, seller_id, value) VALUES ('$bid', '$sid', '$s')";
					$r = @mysqli_query ($dbc, $q);
				  if ($r) {
				  	echo print_message('success', 'Your rate has been successfully send.');
				  } else {
		    		echo print_message('danger', 'Something went wrong due to our system. Sorry for the inconvenience.');
				    echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
				  }
	    	} else echo print_message('danger', 'You cannot vote twice the same seller.');
    	} else echo print_message('danger', 'The buyer username was not found.');	
		} else echo print_message('danger', 'Your username was not found.');
	} else echo print_message('danger', 'You cannot rate yourself.');
}
if (isset($_GET['username'])) {
	$id = $_GET['username'];
	include('includes/index_profile.php');
	$q = "SELECT U.username, F.name, F.description, F.price, F.images, F.status, F.figure_id FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id WHERE U.username='$id' ORDER BY F.published DESC";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		$cont = 0;
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			include('includes/show_product.php');
		}
		mysqli_free_result ($r);
	}
}else if (isset($_COOKIE['username'])) {
	$id = $_COOKIE['username'];
	$myprofile = 1;
	include('includes/index_profile.php');
	$q = "SELECT U.username, F.figure_id, F.name, F.description, F.price, F.images, F.status FROM figures AS F INNER JOIN users AS U ON U.user_id = F.user_id WHERE U.username = '$id' ORDER BY F.published DESC";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	if ($num > 0) {
		$cont = 0;
		while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
			include('includes/show_product.php');
		}
		mysqli_free_result ($r);
	}
} else echo print_message('danger', 'You must be logged in to see your profile.');

include('includes/footer.html');
mysqli_close($dbc);
?>