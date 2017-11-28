<?php
include ('includes/header.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  require ('mysqli_connect.php');
  $errors = array();
  if (empty($_POST['email'])) {
    $errors[] = 'You forgot to enter your email.';
  } else {
    $fn = mysqli_real_escape_string($dbc, trim($_POST['email']));
  }
  if (empty($_POST['pwd'])) {
    $errors[] = 'You forgot to enter your password.';
  } else {
    $fn = mysqli_real_escape_string($dbc, trim($_POST['pwd']));
  }
  if (empty($_POST['name'])) {
    $errors[] = 'You forgot to enter the figure name.';
  } else {
    if (strlen($_POST['name']) < 5) {
      $errors[] = 'The name is too short.';
    } else if (strlen($_POST['name']) > 50) {
      $errors[] = 'The name is too long.';
    } else {
      $fn = mysqli_real_escape_string($dbc, trim($_POST['name']));
    }
  }
  if (empty($_POST['desc'])) {
    $errors[] = 'You forgot to enter the figure description.';
  } else {
    if (strlen($_POST['desc']) > 1000) {
      $errors[] = 'The description is too long.';
    }else {
      $fn = mysqli_real_escape_string($dbc, trim($_POST['desc']));
    }
  }
  if (empty($_POST['price'])) {
    $errors[] = 'You forgot to enter the figure price.';
  } else {
    if ($_POST['price'] <= 0) {
      $errors[] = 'The price must be more than 0.';
    }else {
      $fn = mysqli_real_escape_string($dbc, trim($_POST['price']));
    }
  }
  if (empty($_POST['image'])) {
    $errors[] = 'You forgot to enter the figure image.';
  } else {
    $pattern = "/(https?:\/\/.*\.(?:png|jpg))/";
    if (preg_match ($pattern, trim($_POST['image']))) {
      $fn = mysqli_real_escape_string($dbc, trim($_POST['image']));
    }else {
      $errors[] = 'The link is not an image.';
    }
  }

  if (empty($errors)) {

  } else {
    foreach ($errors as $msg) {
      echo "<div class='alert alert-danger alert-dismissible show' role='alert'>$msg<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>\n";
    }
  }
}
?>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <form class="form-horizontal" action="register_fig.php" method="post">
      <div class="row">
        <div class="col-sm-2 text-right" style="font-size: 1.5em;"><b>User info</b></div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required minlength="5" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
          <small class="form-text text-muted">Required.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2" for="pwd">Password:</label>
        <div class="col-sm-10"> 
          <input type="password" class="form-control" minlength="3" name="pwd" id="pwd" required placeholder="Password">
          <small class="form-text text-muted">Required.</small>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-2 text-right" style="font-size: 1.5em;"><b>Figure info</b></div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2" for="name">Name:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" name="name" minlength="5" maxlength="50" required id="name" placeholder="Figure name" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
          <small class="form-text text-muted">Required. This will be the title of your figure. It must be between 5 and 50 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2" for="desc">Description:</label>
        <div class="col-sm-10"> 
          <textarea rows="5" class="form-control" name="desc" required id="desc" maxlength="1000" placeholder="Description" value="<?php if (isset($_POST['desc'])) echo $_POST['desc']; ?>"></textarea>
          <small class="form-text text-muted">Required. This will be the description of your figure. It must be less than 1000 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2" for="price">Price:</label>
        <div class="col-sm-10"> 
          <input type="number" step="0.01" class="form-control" name="price" required id="price" min="0.01" placeholder="Price" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>">
          <small class="form-text text-muted">Required. This will be the price of your figure. It must be more than 0.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2" for="image">Image link:</label>
        <div class="col-sm-10"> 
          <input type="url" class="form-control" name="image" required id="image" maxlength="250" placeholder="Image url" value="<?php if (isset($_POST['image'])) echo $_POST['image']; ?>">
          <small class="form-text text-muted">Required. This will be the image of your figure. It must be a link (url) containing less than 250 characters.</small>
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