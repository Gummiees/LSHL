<?php
	function check_cookie() {
    if (isset($_COOKIE['username'])) {
      $uid = $_COOKIE['username'];
      $pass = $_COOKIE['pass'];
      $q = "SELECT COUNT(user_id) AS total FROM users WHERE username='$uid' OR pass='$pass'";
  		$dbc = @mysqli_connect ('localhost', 'root', '', 'u787804074_lshl');
      $r = @mysqli_query ($dbc, $q);
      $num = mysqli_num_rows($r);
      if ($num == 1) return true;
      require ('includes/login_function.php');
      redirect_user('logout.php?hacked=1');
    } else return false;
  }
?>