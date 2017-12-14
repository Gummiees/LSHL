<?php
$mid = $row['message_id'];
$t = $row['title'];
$d = $row['description'];
if (!$send) $v = $row['viewed'];
else $v = 1;
$date = $row['date'];

$q1 = "SELECT username FROM users WHERE user_id=$oid";
$r1 = @mysqli_query($dbc, $q1);
$n1 = @mysqli_num_rows($r1);
if ($n1 > 0) {
	$rw = mysqli_fetch_array($r1, MYSQLI_ASSOC);
	$oid = $rw['username'];

	$q1 = "SELECT username FROM users WHERE user_id=$did";
	$r1 = @mysqli_query($dbc, $q1);
	$n1 = @mysqli_num_rows($r1);
	if ($n1 > 0) {
		$rw = mysqli_fetch_array($r1, MYSQLI_ASSOC);
		$did = $rw['username'];
?>
<div class="card">
	<div id="<?php echo $i;?>" style="display: none;"><?php echo $mid;?></div>
	<div id="<?php echo 'd0o1'.$i;?>" style="display: none;"><?php echo $send;?></div>
  <div class="card-header" role="tab" id="<?php echo 'header'.$i;?>">
    <h5 class="mb-0">
    	<div class="row">
      	<div class="col-sm-10 messages-title">
        	<div class="row">
				    <div class="col-sm-3">
				    	<a href="profile.php?username=<?php if (!$send) echo $oid; else echo $did;?>"><span><?php if (!$send) echo $oid; else echo 'To: '.$did;?></span></a>
				    </div>
					    <div class="col-sm-7 title-name">
					    	<a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#<?php echo 'collapse'.$i;?>" aria-expanded="false" aria-controls="<?php echo 'collapse'.$i;?>">
					    		<span>
						    		<?php
						    			if (!$v) echo '<b>'.$t.'</b>';
						    			else echo $t;
						    		?>
				    			</span>
	        			</a>
				    	</div>
					    <div class="col-sm-2">
					    	<span class="badge"><?php echo date('H:i d/m/y', strtotime($date));?></span>
					    </div>
			  	</div>
	      </div>
	      <div class="col-sm-2 message-buttons" style="text-align: right;">
<?php if (!$send) { ?>
			    <a href="#" onclick="MarkAsViewed(<?php echo $i;?>)" data-toggle="tooltip" title="<?php
					    			if (!$v) echo 'Mark as viewed';
					    			else echo 'Mark as not viewed';
					    		?>">
					  <span class="material-icons">
			    		<?php
			    			if (!$v) echo 'mail';
			    			else echo 'drafts';
			    		?>
					  </span>
					</a>
	        <a href="new_message.php?destiny_user=<?php echo $oid;?>" data-toggle="tooltip" title="Reply"><span class="material-icons">reply</span></a>
<?php } ?>
	        <a href="#" onclick="DeleteMessage(<?php echo $i;?>)" data-toggle="tooltip" title="Delete"><span class="material-icons">delete_forever</span></a>
	      </div>
	   	</div>
    </h5>
  </div>
  <div id="<?php echo 'collapse'.$i;?>" class="collapse" role="tabpanel" aria-labelledby="<?php echo 'header'.$i;?>">
    <div class="card-block" style="margin: 20px; text-align: justify;">
    	<h5><?php echo $t;?></h5>
    	<?php echo $d;?>
    </div>
  </div>
</div>
<?php
	} else echo print_message('danger', 'The destiny user of the message was not found.');
} else echo print_message('danger', 'The origin user of the message was not found.');
?>