<?php

function print_message($type, $message) {
	return "<div class='alert alert-$type alert-dismissible show' role='alert'>$message<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
}
?>