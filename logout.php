<?php
require ('login_function.php');
include ('includes/header.php');
setcookie ('user_id', '', time()-3600);
setcookie ('first_name', '', time()-3600);
redirect_user('index.php?log=2');
include ('includes/footer.html');
?>