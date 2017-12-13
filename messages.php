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


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    var_dump($_POST['action']);
    if (!empty($_POST['message_id']) && $_POST['action'] == "viewed") {
      $mid = $_POST['message_id'];
      $q = "UPDATE messages SET viewed=1 WHERE message_id=$mid AND viewed=0";
      $r = @mysqli_query($dbc, $q);
      if (mysqli_affected_rows($dbc) != 1) {
        $q = "UPDATE messages SET viewed=0 WHERE message_id=$mid AND viewed=1";
        $r = @mysqli_query($dbc, $q);
      }
    } else if (!empty($_POST['message_id']) && $_POST['action'] == "del"){
      $mid = $_POST['message_id'];
      $q = "UPDATE messages SET view_destiny=0 WHERE message_id=$mid";
      $r = @mysqli_query($dbc, $q);
      if (mysqli_affected_rows($dbc) != 1) {
        echo print_message('danger', 'The user could not be deleted due to a system error');
        echo '<p>'.mysqli_error($dbc).'<br />Query: '.$q.'</p>';
      }
    }
  }

  $q = "SELECT message_id, origin_id, title, description, viewed, view_destiny, date FROM messages WHERE destiny_id=$did";
  $r = @mysqli_query($dbc, $q);
  $num = @mysqli_num_rows($r);
  include('includes/show_messages_top.php');
  if ($num > 0) {
		$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		for ($i=0; $row != NULL; $i++) {
      if ($row['view_destiny']==1) include ('includes/show_message.php');
			$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
		}
	} else echo print_message('info', 'You have no messages.');
  include('includes/show_messages_foot.php');

} else echo print_message('danger', 'You must be logged in to see your messages.');
include ('includes/footer.html');
mysqli_close($dbc);
?>