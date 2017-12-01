<?php
include ('includes/header.php');
if (isset($errors) && !empty($errors)) {
	foreach ($errors as $msg) {
    echo print_message('danger', $msg);
  }
}
?>
<div class="row text-center login-title">
	<div class="col-sm-12 text-center">
		<h1 style="color: #8E44AD; font-size: 4em; text-align: center !important;">Login</h1>
	</div>
</div>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
  	<form class="form-horizontal" action="login.php" method="post">
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="email">Email:</label>
        <div class="col-sm-10">
          <input type="email" class="form-control" name="email" id="email" placeholder="Email" required minlength="5" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
          <small class="form-text text-muted">Required.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="email">Password:</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" required minlength="5" maxlength="20" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>">
          <small class="form-text text-muted">Required.</small>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
    </form>
  </div>
</div>
<?php include ('includes/footer.html'); ?>