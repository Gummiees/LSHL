<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	require ('login_function.php');
	require ('mysqli_connect.php');
	list ($check, $data) = check_login($dbc, $_POST['email'], $_POST['pass']);
	
	if ($check) {
		setcookie ('user_id', $data['user_id']);
		setcookie ('username', $data['username']);
		redirect_user('index.php?log=1');
			
	} else {
		$errors = $data;
	}
	mysqli_close($dbc);
}
include ('login_page.php');
?>