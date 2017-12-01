<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('includes/login_function.php');
	require ('mysqli_connect.php');
include('includes/print_messages.php');
	list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
	
	if ($check) {
		setcookie ('username', $data['username']);
		redirect_user('index.php?log=1');
			
	} else {
		$errors = $data;
	}
	mysqli_close($dbc);
}
include ('includes/login_page.php');
?>