<?php
require ('includes/login_function.php');
include ('includes/header.php');
include('includes/print_messages.php');
setcookie ('username', '', time()-3600);
redirect_user('index.php?log=2');
include ('includes/footer.html');
?>