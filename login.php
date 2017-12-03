<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('mysqli_connect.php');
	require ('includes/login_function.php');
	list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
	
	if ($check) {
		setcookie ('username', $data['username']);
		setcookie ('pass', $data['pass']);
		redirect_user('index.php?log=1');
			
	} else {
		$errors = $data;
	}
	mysqli_close($dbc);
}
include ('includes/login_page.php');
?>