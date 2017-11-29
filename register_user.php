<?php
include ('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require ('mysqli_connect.php');
  $errors = array();
  if (empty($_POST['email'])) {
    $errors[] = 'You forgot to enter your email.';
  } else {
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
  }
  if (empty($_POST['pwd1']) || empty($_POST['pwd2'])) {
    $errors[] = 'You forgot to enter your password.';
  } else {
      if (strlen($_POST['pwd1']) < 5) {
        $errors[] = 'The password is too short.';
      } else if ($_POST['pwd1'] == $_POST['pwd2']) {
        $pw = mysqli_real_escape_string($dbc, trim($_POST['pwd1']));
      } else {
        $errors[] = 'The passwords did not match.';
      }
  }
  if (empty($_POST['username'])) {
    $errors[] = 'You forgot to enter the username.';
  } else {
    if (5 > strlen($_POST['username'])) {
      $errors[] = 'Username is too short.';
    }else if (20 < strlen($_POST['username'])) {
      $errors[] = 'Username is too long.';
    } else {
      $usr = mysqli_real_escape_string($dbc, trim($_POST['username']));
    }
  }
  if (empty($_POST['firstname'])) {
    $errors[] = 'You forgot to enter your first name.';
  } else {
    if (3 > strlen($_POST['firstname'])) {
      $errors[] = 'The first name is too short.';
    }else if (20 < strlen($_POST['firstname'])) {
      $errors[] = 'The first name is too long.';
    } else {
      $fn = mysqli_real_escape_string($dbc, trim($_POST['firstname']));
    }
  }
  if (empty($_POST['lastname'])) {
    $errors[] = 'You forgot to enter your last name.';
  } else {
    if (3 > strlen($_POST['lastname'])) {
      $errors[] = 'The last name is too short.';
    }else if (40 < strlen($_POST['lastname'])) {
      $errors[] = 'The last name is too long.';
    } else {
      $ln = mysqli_real_escape_string($dbc, trim($_POST['lastname']));
    }
  }
  if (empty($_POST['telephone'])) {
    $errors[] = 'You forgot to enter your telephone.';
  } else {
    $pattern = "/^\d{9}$/";
    if (preg_match ($pattern, trim($_POST['telephone']))) {
      $t = mysqli_real_escape_string($dbc, trim($_POST['telephone']));
    }else {
      $errors[] = 'The telephone is invalid.';
    }
  }
  if (!empty($_POST['desc'])) {
    if (empty($_POST['desc']) <= 500) {
      $d = mysqli_real_escape_string($dbc, trim($_POST['desc']));
    } else {
      $errors[] = 'The description is too long.';
    }
  }else {
    $d = '';
  }
  if (!empty($_POST['image'])) {
    $pattern = "/(https?:\/\/.*\.(?:png|jpg))/";
    if (preg_match ($pattern, trim($_POST['image']))) {
      if (trim($_POST['image']) <= 250) {
        $img = mysqli_real_escape_string($dbc, trim($_POST['image']));
      } else {
        $errors[] = 'The link image is too long.';
      }
    }else {
      $errors[] = 'The link is not an image.';
    }
  } else {
    $img = '';
  }
 
  if (empty($errors)) {
    $q = "SELECT COUNT(user_id) AS total FROM users WHERE username='$usr' OR email='$email'";
    $r = @mysqli_query ($dbc, $q);
    $num = mysqli_num_rows($r);
    $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
    if ($row['total'] > 0) {
        echo "<div class='alert alert-danger alert-dismissible show' role='alert'>The username and/or email are/is already taken.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>\n";
    } else {
      if ($d == '') {
        if ($img == '') {
          $q = "INSERT INTO users (username, first_name, last_name, email, telephone, pass, image, description,  registration_date) VALUES ('$usr', '$fn', '$ln', '$email', '$t', SHA1('$pw'), DEFAULT, DEFAULT, NOW())"; 
        } else {
          $q = "INSERT INTO users (username, first_name, last_name, email, telephone, pass, image, description,  registration_date) VALUES ('$usr', '$fn', '$ln', '$email', '$t', SHA1('$pw'), '$img', DEFAULT, NOW())"; 
        }
      } else {
        if ($img == '') {
          $q = "INSERT INTO users (username, first_name, last_name, email, telephone, pass, image, description,  registration_date) VALUES ('$usr', '$fn', '$ln', '$email', '$t', SHA1('$pw'), DEFAULT, '$d', NOW())"; 
        } else {
          $q = "INSERT INTO users (username, first_name, last_name, email, telephone, pass, image, description,  registration_date) VALUES ('$usr', '$fn', '$ln', '$email', '$t', SHA1('$pw'), '$img', '$d', NOW())"; 
        }
      }  
      $r = @mysqli_query ($dbc, $q);
      if ($r) {
        echo "<div class='alert alert-success alert-dismissible show' role='alert'>Thank you. You can now sign in and register your figures to sell or buy some of them!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
      } else {
        echo "<div class='alert alert-danger alert-dismissible show' role='alert'>Something went wrong due to our system. Sorry for the inconvenience.<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
              
      }
      mysqli_close($dbc);
      include ('includes/footer.html'); 
      exit();
    }
  } else {
    foreach ($errors as $msg) {
      echo "<div class='alert alert-danger alert-dismissible show' role='alert'>$msg<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>\n";
    }
  }
}
?>
<div class="row text-center login-title">
  <div class="col-sm-12 text-center">
    <h1 style="color: #8E44AD; font-size: 4em; text-align: center !important;">Register</h1>
  </div>
</div>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <form class="form-horizontal" action="register_user.php" method="post">
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="username">Username:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" minlength="5" maxlength="20" name="username" id="username" required placeholder="Username" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
          <small class="form-text text-muted">Required. You won't be able to change it afterwards. It must be between 5 and 20 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required maxlength="60" minlength="5" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
          <small class="form-text text-muted">Required. We'll never share your email with anyone else.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="firstname">First name:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" minlength="3" maxlength="20" name="firstname" required id="firstname" placeholder="First name" value="<?php if (isset($_POST['firstname'])) echo $_POST['firstname']; ?>">
          <small class="form-text text-muted">Required. Between 3 and 20 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="lastname">Last name:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" minlength="3" maxlength="40" name="lastname" required id="lastname" placeholder="Last name" value="<?php if (isset($_POST['lastname'])) echo $_POST['lastname']; ?>">
          <small class="form-text text-muted">Required. Between 3 and 40 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="lastname">Telephone:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" name="telephone" required id="telephone" placeholder="Telephone" maxlength="9" minlength="9" value="<?php if (isset($_POST['telephone'])) echo $_POST['telephone']; ?>">
          <small class="form-text text-muted">Required. Number with 9 digits.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="desc">Description:</label>
        <div class="col-sm-10"> 
          <textarea rows="5" class="form-control" name="desc" id="desc" placeholder="Description" maxlength="500" value="<?php if (isset($_POST['desc'])) echo $_POST['desc']; ?>"></textarea>
          <small class="form-text text-muted">This will be your profile description. Not mandatory. It must be less than 500 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="image">Profile Image link:</label>
        <div class="col-sm-10"> 
          <input type="url" class="form-control" name="image" id="image" placeholder="Enter the image url (max 250 characters)" maxlength="250" minlength="5" value="<?php if (isset($_POST['image'])) echo $_POST['image']; ?>">
          <small class="form-text text-muted">This will be your profile image. It must be a link (url) containing less than 250 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="pwd1">Password:</label>
        <div class="col-sm-10"> 
          <input type="password" class="form-control" minlength="5" name="pwd1" id="pwd1" required placeholder="Enter password (min 5 characters)">
          <small class="form-text text-muted">Required. Minimum 5 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="pwd2">Repeat password:</label>
        <div class="col-sm-10"> 
          <input type="password" class="form-control" minlength="5" name="pwd2" id="pwd2" required placeholder="Repeat the password">
          <small class="form-text text-muted">Required.</small>
        </div>
      </div>
      <div class="form-group row"> 
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
<?php
include ('includes/footer.html');
?>