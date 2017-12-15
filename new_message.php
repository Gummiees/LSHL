<?php
include('includes/print_messages.php');
require ('mysqli_connect.php');
include ('includes/header.php');

if (isset($_COOKIE['username'])) {
  $uid = $_COOKIE['username'];
  $pass = $_COOKIE['pass'];
  $q = "SELECT user_id FROM users WHERE username='$uid' AND pass='$pass'";
  $r = @mysqli_query ($dbc, $q);
  $num = mysqli_num_rows($r);
  if ($num != 1) {
    require ('includes/login_function.php');
    redirect_user('logout.php?hacked=1');
  }
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();

    if (!isset($_GET['destiny_user'])) {
      if (empty($_POST['destiny'])) $errors[] = 'You forgot to enter the destiny username.';
      else {
        if (strlen($_POST['destiny']) < 5) $errors[] = 'The destiny username is too short.';
        else if (strlen($_POST['destiny']) > 10) $errors[] = 'The destiny username is too long.';
        else {
          $destiny = mysqli_real_escape_string($dbc, trim($_POST['destiny']));
          $q = "SELECT user_id FROM users WHERE username='$destiny'";
          $r = @mysqli_query($dbc, $q);
          $num = @mysqli_num_rows($r);
          if ($num != 1) $errors[] = 'The username does not exist.';
          else {
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            $did = $row['user_id'];
          }
        }
      }
    } else if (!empty($_GET['destiny_user'])){
      $destiny = $_GET['destiny_user'];
      $q = "SELECT user_id FROM users WHERE username='$destiny'";
      $r = @mysqli_query($dbc, $q);
      $num = @mysqli_num_rows($r);
      if ($num != 1) $errors[] = 'The username does not exist.';
      else {
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        $did = $row['user_id'];
      }
    }
    if (empty($_POST['title'])) $errors[] = 'You forgot to enter the title of the message.';
    else {
      if (strlen($_POST['title']) < 3) $errors[] = 'The title is too short.';
      else if (strlen($_POST['title']) > 50) $errors[] = 'The title is too long.';
      else $title = mysqli_real_escape_string($dbc, trim($_POST['title']));
    }
    if (empty($_POST['desc'])) $errors[] = 'You forgot to enter the message description.';
    else {
      if (strlen($_POST['desc']) > 1000) $errors[] = 'The description is too long.';
      else $desc = mysqli_real_escape_string($dbc, trim($_POST['desc']));
    }

    if (empty($errors)) {
      $uid = $_COOKIE['username'];
      $q = "SELECT user_id FROM users WHERE username='$uid'";
      $r = @mysqli_query($dbc, $q);
      $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
      $oid = $row['user_id'];
      $q = "INSERT INTO messages (origin_id, destiny_id, title, description) VALUES ($oid, $did, '$title', '$desc')";   
      $r = @mysqli_query ($dbc, $q);
      if ($r) echo print_message('success', 'The message was successfully send.');
      else {
        echo print_message('danger', 'Something went wrong due to our system. Sorry for the inconvenience.');
        echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
      }
      mysqli_close($dbc);
      include ('includes/footer.html'); 
      exit();
    } else foreach ($errors as $msg) echo print_message('danger', $msg);
  }
?>
<div class="row text-center login-title">
  <div class="col-sm-12 text-center">
    <h1 style="color: #8E44AD; font-size: 4em; text-align: center !important;">New message</h1>
  </div>
</div>
<script>
  var i=0;
</script>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <form class="form-horizontal" action="new_message.php" method="post">
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="title">Title:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" name="title" minlength="3" maxlength="50" required id="title" placeholder="Message title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
          <small class="form-text text-muted">Required. This will be the title of your message. It must be between 3 and 50 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="desc">Description:</label>
        <div class="col-sm-10"> 
          <textarea rows="5" class="form-control" name="desc" required id="desc" maxlength="1000" placeholder="Description" <?php if(isset($_POST['desc'])) echo $_POST['desc'];?>></textarea>
          <small class="form-text text-muted">Required. This will be the description of your message. It must be less than 1000 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="destiny">Destiny:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" minlength="5" maxlength="10" name="destiny" required id="destiny" placeholder="Destiny username"
          value="<?php
            if (isset($_GET['destiny_user'])) echo $_GET['destiny_user'];
            else if (isset($_POST['destiny'])) echo $_POST['destiny'];
          ?>"
          <?php
            if (!empty($_GET['destiny_user'])) { 
              echo 'readonly="readonly"';
            }
          ?>>
          <small class="form-text text-muted">Required. This will be who will recieve the message. It must be a registered username.</small>
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
} else echo print_message('danger', 'You must be logged in to send messages.');
include ('includes/footer.html');
?>