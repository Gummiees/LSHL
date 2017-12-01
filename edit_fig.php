<?php
include ('includes/header.php');
include('includes/print_messages.php');
require ('mysqli_connect.php');

if (isset($_GET['fid'])) {
  $fid = $_GET['fid'];
  $q = "SELECT name, description, price FROM figures WHERE figure_id=$fid";
  $r = @mysqli_query ($dbc, $q);
  $num = mysqli_num_rows($r);
  $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
  $n = $row['name'];
  $d = $row['description'];
  $p = $row['price'];

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array();

    if (!empty($_POST['name'])) {
      $pattern = "/^\d{9}$/";
      if (preg_match ($pattern, trim($_POST['name']))) {
        if ($n != $_POST['name']) {
          if (isset($inserts)) $inserts .= ", name='".mysqli_real_escape_string($dbc, trim($_POST['name']))."'";
          else $inserts = "name='".mysqli_real_escape_string($dbc, trim($_POST['name']))."'";
        }
      }else {
        $errors[] = 'The name is invalid.';
      }
    }
    if (!empty($_POST['desc'])) {
      if ($_POST['desc'] <= 1000) {
        if ($d != $_POST['desc']) {
          if (isset($inserts)) $inserts .= ", description='".mysqli_real_escape_string($dbc, trim($_POST['desc']))."'";
          else $inserts = "description='".mysqli_real_escape_string($dbc, trim($_POST['desc']))."'";
        }
      } else {
        $errors[] = 'The description is too long.';
      }
    }
    if (!empty($_POST['price'])) {
      if ($_POST['price'] > 0) {
        if ($d != $_POST['price']) {
          if (isset($inserts)) $inserts .= ", price=".mysqli_real_escape_string($dbc, trim($_POST['price']));
          else $inserts = "price=".mysqli_real_escape_string($dbc, trim($_POST['price']));
        }
      } else {
        $errors[] = 'The price must be more than zero.';
      }
    }
    if (!empty($_POST['image'])) {
      $pattern = "/(https?:\/\/.*\.(?:png|jpg))/";
      if (preg_match ($pattern, trim($_POST['image']))) {
        if (trim($_POST['image']) <= 250) {
        if ($img != $_POST['image']) {
          if (!isset($inserts)) $inserts = "images='".mysqli_real_escape_string($dbc, trim($_POST['image']))."'";
          else $inserts .= ", images='".mysqli_real_escape_string($dbc, trim($_POST['image']))."'";
        }
        } else {
          $errors[] = 'The link image is too long.';
        }
      }else {
        $errors[] = 'The link is not an image.';
      }
    }
   
    if (empty($errors) && isset($inserts)) {
      $q = "UPDATE figures SET $inserts WHERE figure_id=$fid LIMIT 1";
      $r = @mysqli_query ($dbc, $q);
      if (mysqli_affected_rows($dbc) == 1) {
        echo print_message('success', 'Your figure was successfully updated.');
        $q = "SELECT name, description, price FROM figures WHERE figure_id=$fid";
        $r = @mysqli_query ($dbc, $q);
        $num = mysqli_num_rows($r);
        $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
        $n = $row['name'];
        $d = $row['description'];
        $p = $row['price'];
        $_POST['name'] = "";
        $_POST['desc'] = "";
        $_POST['price'] = "";
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
}
mysqli_close($dbc);
?>
<div class="row text-center login-title">
  <div class="col-sm-12 text-center">
    <h1 style="color: #8E44AD; font-size: 4em; text-align: center !important;">Edit figure info</h1>
  </div>
</div>
<script>
  var i=0;
</script>
<div class="row">
  <div class="col-sm-2"></div>
  <div class="col-sm-8">
    <form class="form-horizontal" action="edit_fig.php?fid=<?php echo $fid;?>" method="post">
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="name">Name:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" name="name" minlength="5" maxlength="50" id="name" placeholder="<?php echo $n;?>" value="<?php if (isset($_POST['name'])) echo $_POST['name']; ?>">
          <small class="form-text text-muted">This is the title of your figure. It must be between 5 and 50 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="desc">Description:</label>
        <div class="col-sm-10"> 
          <textarea rows="5" class="form-control" name="desc" id="desc" maxlength="1000" placeholder="<?php echo $d;?>" <?php if(isset($_POST['desc'])) echo $_POST['desc'];?>></textarea>
          <small class="form-text text-muted">This is the description of your figure. It must be less than 1000 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="price">Price:</label>
        <div class="col-sm-10"> 
          <input type="number" step="0.01" class="form-control" name="price" id="price" min="0.01" placeholder="<?php echo $p;?>" value="<?php if (isset($_POST['price'])) echo $_POST['price']; ?>">
          <small class="form-text text-muted">This is the price of your figure. It must be more than 0.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="image">Image link:</label>
        <div class="col-sm-10"> 
          <input type="url" class="form-control" name="image" id="image" maxlength="250" placeholder="Image url" value="<?php if (isset($_POST['image'])) echo $_POST['image']; ?>">
          <small class="form-text text-muted">This is/Those are the image(s) of your figure. It must be a link (url) containing less than 250 characters.</small>
        </div>
      </div>
      <div class="row">
        <label class="control-label col-sm-2 text-right">Add images</label>
        <span class="fa fa-plus-square" onclick="addImages()" style="font-size:1.5em; color: #8E44AD; margin-left: 10px;"></span>
      </div>
      <div id="add-images"></div>
      <div class="form-group row">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </form>
  </div>
</div>
<script>
  function addImages() {
  document.getElementById("add-images").innerHTML += '<div class="form-group row"><label class="control-label col-sm-2 text-right" for="image'+i+'">Image link:</label><div class="col-sm-10"> <input type="url" class="form-control" name="image'+i+'" id="image'+i+'" maxlength="250" placeholder="Image url"><small class="form-text text-muted">More images for the figure.</small></div></div>';
  i++;
  }
</script>
<?php
include ('includes/footer.html');
?>