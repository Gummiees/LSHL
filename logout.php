<?php
require ('includes/login_function.php');
include('includes/print_messages.php');
setcookie ('username', '', time()-3600);
setcookie ('pass', '', time()-3600);
if (isset($_GET['hacked'])) redirect_user('index.php?log=3');
redirect_user('index.php?log=2');
?>