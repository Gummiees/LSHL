<?php
$q = "SELECT user_id, image FROM users WHERE username='$id'";
$r = @mysqli_query ($dbc, $q);
$num = mysqli_num_rows($r);
if ($num > 0) {
	$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
	$uid = $row['user_id'];
	echo '<div class="user-info">
		<div class="row">
			<div class="col-sm-3 img-profile">
				<img src="'.$row['image'].'" alt="'.$id.' profile image" class="img-thumbnail">
			</div>
			<div class="col-sm-9">
				<div class="row"><div class="col-sm-9 username-profile">'.$id;
	if (isset($myprofile)) echo '<a href="edit_user.php" style="margin-left: 50px;"><span class="material-icons material-icon-link">mode_edit</span></a>';
	echo '</div></div>';
	$q = "SELECT seller_id, AVG(value) AS average, COUNT(value) AS total FROM stars WHERE seller_id=$uid GROUP BY seller_id";		
	$r = @mysqli_query ($dbc, $q);
	$num = mysqli_num_rows($r);
	include('includes/rating.php');
	$q = "SELECT description, telephone, email FROM users WHERE username='$id'";
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
	</div>';
	if (!isset($myprofile)) echo '<div class="row username-title"><div class="col-sm-12 text-center"><p><i>'.$id.' </i> is selling</p></div></div>';
} else {
  echo print_message('danger', 'The user does not exist.');
}
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
				document.getElementById(''+i+'').classList.remove('fa-star-half-o');
				document.getElementById(''+i+'').classList.add('fa-star');
			}
		}
	}
</script>