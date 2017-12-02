<?php
include ('includes/header.php');
include('includes/print_messages.php');
require ('mysqli_connect.php');

if (check_cookie()) {
  $uid = $_COOKIE['username'];
  $q = "SELECT email, first_name, last_name, telephone, description FROM users WHERE username='$uid'";
  $r = @mysqli_query ($dbc, $q);
  $num = mysqli_num_rows($r);
  $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
  $email = $row['email'];
  $fn = $row['first_name'];
  $ln = $row['last_name'];
  $t = $row['telephone'];
  $d = $row['description'];

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();
    if (!empty($_POST['pwd1']) && !empty($_POST['pwd2'])) {
        if (strlen($_POST['pwd1']) < 5) {
          $errors[] = 'The password is too short.';
        } else if ($_POST['pwd1'] == $_POST['pwd2']) {
          $inserts = "pass=SHA1('".mysqli_real_escape_string($dbc, trim($_POST['pwd1']))."')";
        } else {
          $errors[] = 'The passwords did not match.';
        }
    }
    if (!empty($_POST['telephone'])) {
      $pattern = "/^\d{9}$/";
      if (preg_match ($pattern, trim($_POST['telephone']))) {
        if ($t != $_POST['telephone']) {
          if (isset($inserts)) $inserts .= ", telephone='".mysqli_real_escape_string($dbc, trim($_POST['telephone']))."'";
          else $inserts = "telephone='".mysqli_real_escape_string($dbc, trim($_POST['telephone']))."'";
        }
      }else {
        $errors[] = 'The telephone is invalid.';
      }
    }
    if (!empty($_POST['desc'])) {
      if (strlen($_POST['desc']) <= 500) {
        if ($d != $_POST['desc']) {
          if (isset($inserts)) $inserts .= ", description='".mysqli_real_escape_string($dbc, trim($_POST['desc']))."'";
          else $inserts = "description='".mysqli_real_escape_string($dbc, trim($_POST['desc']))."'";
        }
      } else {
        $errors[] = 'The description is too long.';
      }
    } else {
      if (isset($d)) {
        if (isset($inserts)) $inserts .= ", description=NULL";
        else $inserts = "description=NULL";
      }
    }
    if (!empty($_POST['image'])) {
      $pattern = "/(https?:\/\/.*\.(?:png|jpg|jpeg|gif))/";
      if (preg_match ($pattern, trim($_POST['image']))) {
        if (strlen(trim($_POST['image'])) <= 250) {
        if ($img != $_POST['image']) {
          if (!isset($inserts)) $inserts = "image='".mysqli_real_escape_string($dbc, trim($_POST['image']))."'";
          else $inserts .= ", image='".mysqli_real_escape_string($dbc, trim($_POST['image']))."'";
        }
        } else {
          $errors[] = 'The link image is too long.';
        }
      }else {
        $errors[] = 'The link is not an image.';
      }
    }
   
    if (empty($errors) && isset($inserts)) {
      $q = "UPDATE users SET $inserts WHERE username='$uid' LIMIT 1";
      $r = @mysqli_query ($dbc, $q);
      if (mysqli_affected_rows($dbc) == 1) {
        echo print_message('success', 'Your profile was successfully updated.');
        $q = "SELECT telephone, description FROM users WHERE username='$uid'";
        $r = @mysqli_query ($dbc, $q);
        $num = mysqli_num_rows($r);
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        $t = $row['telephone'];
        $d = $row['description'];
        $_POST['telephone'] = "";
        $_POST['desc'] = "";
        $_POST['image'] = "";
      } else {
        echo print_message('danger', 'Something went wrong due to our system. Sorry for the inconvenience.');
        echo '<p>'.mysqli_error($dbc).'<br /><br />Query: '.$q.'</p>';
      }
    } else {
      foreach ($errors as $msg) {
        echo print_message('danger', $msg);
      }
    }
  }
?>
<div class="row text-center login-title">
  <div class="col-sm-12 text-center">
    <h1 style="color: #8E44AD; font-size: 4em; text-align: center !important;">Edit user info</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <form class="form-horizontal" action="edit_user.php" method="post">
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="username">Username:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" name="username" id="username" placeholder="<?php echo $uid;?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" id="email" placeholder="<?php echo $email;?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="firstname">First name:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" name="firstname" id="firstname" placeholder="<?php echo $fn;?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="lastname">Last name:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" name="lastname" id="lastname" placeholder="<?php echo $ln;?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="lastname">Telephone:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" name="telephone" id="telephone" placeholder="<?php echo $t;?>" maxlength="9" minlength="9" value="<?php if (isset($_POST['telephone'])) echo $_POST['telephone']; ?>">
          <small class="form-text text-muted">Number with 9 digits.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="desc">Description:</label>
        <div class="col-sm-10"> 
          <textarea rows="5" class="form-control" name="desc" id="desc" placeholder="<?php if (isset($d)) echo $d; else echo 'Description';?>" maxlength="500" value="<?php if (isset($_POST['desc'])) echo $_POST['desc']; ?>"></textarea>
          <small class="form-text text-muted">This will be your profile description. Not mandatory. It must be less than 500 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="image">Profile Image link:</label>
        <div class="col-sm-10"> 
          <input type="url" class="form-control" name="image" id="image" placeholder="Image url" maxlength="250" minlength="5" value="<?php if (isset($_POST['image'])) echo $_POST['image']; ?>">
          <small class="form-text text-muted">This will be your profile image. It must be a link (url) containing less than 250 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="pwd1">New password:</label>
        <div class="col-sm-10"> 
          <input type="password" class="form-control" minlength="5" name="pwd1" id="pwd1" placeholder="Password">
          <small class="form-text text-muted">Minimum 5 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="pwd2">Repeat new password:</label>
        <div class="col-sm-10"> 
          <input type="password" class="form-control" minlength="5" name="pwd2" id="pwd2" placeholder="Repeat password">
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
} else echo print_message('danger', 'You must be logged in to edit your profile.');
mysqli_close($dbc);
include ('includes/footer.html');
?>