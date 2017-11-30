<?php
require ('login_function.php');
include ('includes/header.php');
setcookie ('username', '', time()-3600);
redirect_user('index.php?log=2');
include ('includes/footer.html');
?>