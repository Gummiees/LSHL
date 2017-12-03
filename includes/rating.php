<?php
echo '<div class="row rate-profile" style="font-size: 1.5em;">';
if ($num == 1) {
	//hay valoraciones
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	$avg = $row['average'];
	if (isset($_COOKIE['username']) && $_COOKIE['username']!=$id) {
		echo '<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" aria-hidden="true" id="0" onmouseover="fill(this)" href="profile.php?username='.$id.'&stars=1"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="1" aria-hidden="true" onmouseover="fill(this)" href="profile.php?username='.$id.'&stars=2"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="2" aria-hidden="true" onmouseover="fill(this)" href="profile.php?username='.$id.'&stars=3"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="3" aria-hidden="true" onmouseover="fill(this)" href="profile.php?username='.$id.'&stars=4"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="4" aria-hidden="true" onmouseover="fill(this)" href="profile.php?username='.$id.'&stars=5"></a><script>';
		if ($avg <= 0.5) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star-half-o');";
		} else if ($avg <= 1) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');";
		} else if ($avg <= 1.5) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star-half-o');";
		} else if ($avg <= 2) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');";
		} else if ($avg <= 2.5) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star-half-o');";
		} else if ($avg <= 3) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star');";
		} else if ($avg <= 3.5) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star');
		document.getElementById(''+3+'').classList.remove('fa-star-o');
		document.getElementById(''+3+'').classList.add('fa-star-half-o');";
		} else if ($avg <= 4) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star');
		document.getElementById(''+3+'').classList.remove('fa-star-o');
		document.getElementById(''+3+'').classList.add('fa-star');";
		} else if ($avg <= 4.5) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star');
		document.getElementById(''+3+'').classList.remove('fa-star-o');
		document.getElementById(''+3+'').classList.add('fa-star');
		document.getElementById(''+4+'').classList.remove('fa-star-o');
		document.getElementById(''+4+'').classList.add('fa-star-half-o');";
		} else {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star');
		document.getElementById(''+3+'').classList.remove('fa-star-o');
		document.getElementById(''+3+'').classList.add('fa-star');
		document.getElementById(''+4+'').classList.remove('fa-star-o');
		document.getElementById(''+4+'').classList.add('fa-star');";
		}
	} else {
		echo '<i class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" aria-hidden="true" id="0"></i>
			<i class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="1" aria-hidden="true"></i>
			<i class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="2" aria-hidden="true"></i>
			<i class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="3" aria-hidden="true"></i>
			<i class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="4" aria-hidden="true"></i><script>';
		if ($avg <= 0.5) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star-half-o');";
		} else if ($avg <= 1) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');";
		} else if ($avg <= 1.5) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star-half-o');";
		} else if ($avg <= 2) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');";
		} else if ($avg <= 2.5) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star-half-o');";
		} else if ($avg <= 3) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star');";
		} else if ($avg <= 3.5) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star');
		document.getElementById(''+3+'').classList.remove('fa-star-o');
		document.getElementById(''+3+'').classList.add('fa-star-half-o');";
		} else if ($avg <= 4) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star');
		document.getElementById(''+3+'').classList.remove('fa-star-o');
		document.getElementById(''+3+'').classList.add('fa-star');";
		} else if ($avg <= 4.5) {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star');
		document.getElementById(''+3+'').classList.remove('fa-star-o');
		document.getElementById(''+3+'').classList.add('fa-star');
		document.getElementById(''+4+'').classList.remove('fa-star-o');
		document.getElementById(''+4+'').classList.add('fa-star-half-o');";
		} else {
			echo "document.getElementById(''+0+'').classList.remove('fa-star-o');
		document.getElementById(''+0+'').classList.add('fa-star');
		document.getElementById(''+1+'').classList.remove('fa-star-o');
		document.getElementById(''+1+'').classList.add('fa-star');
		document.getElementById(''+2+'').classList.remove('fa-star-o');
		document.getElementById(''+2+'').classList.add('fa-star');
		document.getElementById(''+3+'').classList.remove('fa-star-o');
		document.getElementById(''+3+'').classList.add('fa-star');
		document.getElementById(''+4+'').classList.remove('fa-star-o');
		document.getElementById(''+4+'').classList.add('fa-star');";
		}
	}
	echo '</script></div>
	<div class="row"><small>'.$row['average'].' average based on '.$row['total'].' votes.</small></div>';
} else {
	if (isset($_COOKIE['username']) && $_COOKIE['username']!=$id) {
		echo '<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" aria-hidden="true" id="0" onmouseover="fill(this)" href="profile.php?username='.$id.'&stars=1"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="1" aria-hidden="true" onmouseover="fill(this)" href="profile.php?username='.$id.'&stars=2"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="2" aria-hidden="true" onmouseover="fill(this)" href="profile.php?username='.$id.'&stars=3"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="3" aria-hidden="true" onmouseover="fill(this)" href="profile.php?username='.$id.'&stars=4"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="4" aria-hidden="true" onmouseover="fill(this)" href="profile.php?username='.$id.'&stars=5"></a>';
	} else {
		echo '<i class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" aria-hidden="true" id="0"></i>
			<i class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="1" aria-hidden="true"></i>
			<i class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="2" aria-hidden="true"></i>
			<i class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="3" aria-hidden="true"></i>
			<i class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="4" aria-hidden="true"></i>';
	}
	echo '</script></div><div class="row"><small>No votes yet.</small></div>';
}
?>