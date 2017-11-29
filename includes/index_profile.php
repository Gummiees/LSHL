<?php
$q = "SELECT username, image FROM users WHERE user_id=$id";
$r = @mysqli_query ($dbc, $q);
$num = mysqli_num_rows($r);
$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
echo '<div class="user-info">
	<div class="row">
		<div class="col-sm-3 img-profile">
			<img src="'.$row['image'].'" alt="'.$row['username'].' profile image" class="img-thumbnail">
		</div>
		<div class="col-sm-9">
			<div class="row username-profile">'.$row['username'].'</div>';

$q = "SELECT AVG(value) AS average, COUNT(value) AS total FROM stars WHERE seller_id=$id GROUP BY value";		
$r = @mysqli_query ($dbc, $q);
$num = mysqli_num_rows($r);
echo '<div class="row rate-profile" style="font-size: 1.5em;">';
if ($num == 1) {
	//hay valoraciones
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	$avg = $row['average'];
	if (isset($_COOKIE['user_id'])) {
		echo '<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" aria-hidden="true" id="0" onmouseover="fill(this)" href="index.php?id='.$id.'&stars=1"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="1" aria-hidden="true" onmouseover="fill(this)" href="index.php?id='.$id.'&stars=2"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="2" aria-hidden="true" onmouseover="fill(this)" href="index.php?id='.$id.'&stars=3"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="3" aria-hidden="true" onmouseover="fill(this)" href="index.php?id='.$id.'&stars=4"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="4" aria-hidden="true" onmouseover="fill(this)" href="index.php?id='.$id.'&stars=5"></a><script>';
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
		echo '<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" aria-hidden="true" id="0" href="index.php?id='.$id.'&stars=1"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="1" aria-hidden="true" href="index.php?id='.$id.'&stars=2"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="2" aria-hidden="true" href="index.php?id='.$id.'&stars=3"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="3" aria-hidden="true" href="index.php?id='.$id.'&stars=4"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="4" aria-hidden="true" href="index.php?id='.$id.'&stars=5"></a><script>';
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
	echo '</script>
	<small style="margin-left: 10px;">('.$row['average'].')</small></div>
	<div class="row"><small>'.$row['total'].' votes</small></div>';
} else {
	if (isset($_COOKIE['user_id'])) {
		echo '<a class="fa fa-star" style="color:#8E44AD;text-decoration:none;" aria-hidden="true" id="0" onmouseover="fill(this)" href="index.php?id='.$id.'&stars=1"></a>
			<a class="fa fa-star" style="color:#8E44AD;text-decoration:none;" id="1" aria-hidden="true" onmouseover="fill(this)" href="index.php?id='.$id.'&stars=2"></a>
			<a class="fa fa-star-half-o" style="color:#8E44AD;text-decoration:none;" id="2" aria-hidden="true" onmouseover="fill(this)" href="index.php?id='.$id.'&stars=3"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="3" aria-hidden="true" onmouseover="fill(this)" href="index.php?id='.$id.'&stars=4"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="4" aria-hidden="true" onmouseover="fill(this)" href="index.php?id='.$id.'&stars=5">';
	} else {
		echo '<a class="fa fa-star" style="color:#8E44AD;text-decoration:none;" aria-hidden="true" id="0" href="index.php?id='.$id.'&stars=1"></a>
			<a class="fa fa-star" style="color:#8E44AD;text-decoration:none;" id="1" aria-hidden="true" href="index.php?id='.$id.'&stars=2"></a>
			<a class="fa fa-star-half-o" style="color:#8E44AD;text-decoration:none;" id="2" aria-hidden="true" href="index.php?id='.$id.'&stars=3"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="3" aria-hidden="true" href="index.php?id='.$id.'&stars=4"></a>
			<a class="fa fa-star-o" style="color:#8E44AD;text-decoration:none;" id="4" aria-hidden="true" href="index.php?id='.$id.'&stars=5"></a>';
	}
	echo '<small>0 votes</small></div>';
}

$q = "SELECT username, description, telephone, email FROM users WHERE user_id=$id";
$r = @mysqli_query ($dbc, $q);
$num = mysqli_num_rows($r);
$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
echo '<div class="row desc-profile">'.$row['description'].'</div>
			<div class="row email-profile" style="margin-top: 20px;">
				<i>Email: '.$row['email'].'</i>
			</div>
			<div class="row tel-profile">
				<i>Telephone: '.$row['telephone'].'</i>
			</div>
			<div class="row desc-profile">
				<b>Selling '.$num.' figures!</b>
			</div>
		</div>
	</div>
</div>
	<div class="row username-title">
		<div class="col-sm-12 text-center">
			<p><i>'.$row['username'].' </i> is selling</p>
		</div>
	</div>';
?>

<script>
	function fill (x) {
		for (var i=0; i < 5; i++) {
			document.getElementById(''+i+'').classList.remove('fa-star');
			document.getElementById(''+i+'').classList.add('fa-star-o');
		}
		for (var i=0; i < 5; i++) {
			if (i <= x.id) {
				document.getElementById(''+i+'').classList.remove('fa-star-o');
				document.getElementById(''+i+'').classList.add('fa-star');
			}
		}
	}
		
</script>