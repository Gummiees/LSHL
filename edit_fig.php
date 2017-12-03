<?php
include ('includes/print_messages.php');
require ('mysqli_connect.php');
include ('includes/header.php');

if (isset($_COOKIE['username'])) {
  $uid = $_COOKIE['username'];
  $pass = $_COOKIE['pass'];
  $q = "SELECT COUNT(user_id) AS total FROM users WHERE username='$uid' OR pass='$pass'";
  $r = @mysqli_query ($dbc, $q);
  if (mysqli_num_rows($r) != 1) {
    require ('includes/login_function.php');
    redirect_user('logout.php?hacked=1');
  }
  if (isset($_GET['fid']) && is_numeric($_GET['fid'])) {
    //comprobar que la figura pertenece al usuario que ha hecho login!!
    $fid = $_GET['fid'];
    $uid = $_COOKIE['username'];

    $q = "SELECT F.name, F.description, F.price, F.images FROM figures AS F INNER JOIN users AS U ON F.user_id = U.user_id WHERE F.figure_id=$fid AND U.username='$uid'";
    $r = @mysqli_query ($dbc, $q);
    if (mysqli_num_rows($r) == 1) {
      $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
      $n = $row['name'];
      $d = $row['description'];
      $p = $row['price'];
      $img = $row['images'];
      $images = explode(",", $img);
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = array();

        if (!empty($_POST['name'])) {
          if (strlen($_POST['name']) >= 5 && strlen($_POST['name']) <= 50) {
            if ($n != $_POST['name']) {
              if (isset($inserts)) $inserts .= ", name='".mysqli_real_escape_string($dbc, trim($_POST['name']))."'";
              else $inserts = "name='".mysqli_real_escape_string($dbc, trim($_POST['name']))."'";
            }
          }else {
            $errors[] = 'The name is invalid.';
          }
        }
        if (!empty($_POST['desc'])) {
          if (strlen($_POST['desc']) <= 1000) {
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

        if(isset($_POST['check_image'])) {
          $img_mod = 1;
          foreach($_POST['check_image'] as $selected) {
            unset($images[$selected]);
          }
        } 

        if (!empty($_POST['image'])) {
          $pattern = "/(https?:\/\/.*\.(?:png|jpg|jpeg|gif))/";
          if (preg_match ($pattern, trim($_POST['image']))) {
            if (strlen(trim($_POST['image'])) <= 250) {
              $img_mod = 1;
              $images[] = mysqli_real_escape_string($dbc, trim($_POST['image']));
              for ($i=0; !empty($_POST['image'.$i]); $i++) {
                if (preg_match ($pattern, trim($_POST['image'.$i]))) {
                  if (strlen(trim($_POST['image'])) <= 250) {
                    $images[] = mysqli_real_escape_string($dbc, trim($_POST['image'.$i]));
                  }
                }
              }
            } else {
              $errors[] = 'The link is too long.';
            }
          } else {
            $errors[] = 'The link is not an image.';
          }
        }

        if (isset($img_mod)) {
          $img = implode(",", $images);
          if (!isset($inserts)) {
            $inserts = "images='$img'";
          } else {
            $inserts .= ", images='$img'";
          }
        }
       
        if (empty($errors) && isset($inserts)) {
          $q = "UPDATE figures SET $inserts WHERE figure_id=$fid LIMIT 1";
          $r = @mysqli_query ($dbc, $q);
          if (mysqli_affected_rows($dbc) == 1) {
            echo print_message('success', 'Your figure was successfully updated.');
            $q = "SELECT name, description, price, images FROM figures WHERE figure_id=$fid";
            $r = @mysqli_query ($dbc, $q);
            $num = mysqli_num_rows($r);
            $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
            $n = $row['name'];
            $d = $row['description'];
            $p = $row['price'];
            $img = $row['images'];
            $_POST['name'] = "";
            $_POST['desc'] = "";
            $_POST['price'] = "";
            $images = explode(",", $img);
          } else {
            echo print_message('danger', 'Something went wrong due to our system. Sorry for the inconvenience.');
            echo '<p>'.mysqli_error($dbc).'<br /><br />Query: '.$q.'</p>';
          }
        } else {
          foreach ($errors as $msg) echo print_message('danger', $msg);
        }
      }
      include ('includes/edit_fig_page.php');
    } else echo print_message('danger', 'The figure does not exist or is not yours, therefore you cannot edit it.');
  } else echo print_message('danger', 'You must choose a figure to edit.');
} else echo print_message('danger', 'You must be logged in to edit your figures.');
mysqli_close($dbc);
include ('includes/footer.html');
?>