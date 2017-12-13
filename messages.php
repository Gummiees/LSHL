<?php
include('includes/print_messages.php');
require ('mysqli_connect.php');
include ('includes/header.php');

if (isset($_COOKIE['username'])) {
  $uid = $_COOKIE['username'];
  $pass = $_COOKIE['pass'];
  $q = "SELECT user_id FROM users WHERE username='$uid' AND pass='$pass'";
  $r = @mysqli_query ($dbc, $q);
  if (mysqli_num_rows($r) != 1) {
    redirect_user('logout.php?hacked=1');
  }
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	$did = $row['user_id'];
  $q = "SELECT message_id, origin_id, title, description, viewed, date FROM messages WHERE destiny_id='$did'";
  $r = @mysqli_query($dbc, $q);
  $num = @mysqli_num_rows($r);
  include('includes/show_messages_top.php');
  if ($num > 0) {
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		for ($i=0; $row != NULL; $i++) {
			include ('includes/show_message.php');
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		}
	} else echo print_message('info', 'You have no messages.');
  include('includes/show_messages_foot.php');

} else echo print_message('danger', 'You must be logged in to see your messages.');
include ('includes/footer.html');
mysqli_close($dbc);
?>