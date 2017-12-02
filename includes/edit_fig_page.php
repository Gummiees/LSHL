<?php
echo '<div class="row text-center login-title">
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
    <form class="form-horizontal" action="edit_fig.php?fid='.$fid.'" method="post">
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="name">Name:</label>
        <div class="col-sm-10"> 
          <input type="text" class="form-control" name="name" minlength="5" maxlength="50" id="name" placeholder="'.$n.'" value="';
          if (isset($_POST['name'])) echo $_POST['name'];
          echo '">
          <small class="form-text text-muted">This is the title of your figure. It must be between 5 and 50 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="desc">Description:</label>
        <div class="col-sm-10"> 
          <textarea rows="5" class="form-control" name="desc" id="desc" maxlength="1000" placeholder="'.$d.'"';
          if(isset($_POST['desc'])) echo $_POST['desc'];
          echo '></textarea>
          <small class="form-text text-muted">This is the description of your figure. It must be less than 1000 characters.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="price">Price:</label>
        <div class="col-sm-10"> 
          <input type="number" step="0.01" class="form-control" name="price" id="price" min="0.01" placeholder="'.$p.'" value="';
          if (isset($_POST['price'])) echo $_POST['price'];
          echo '">
          <small class="form-text text-muted">This is the price of your figure. It must be more than 0.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="image">Images that already has:</label>
        <div class="col-sm-10">';
              //$images contains the array of the item images.
              foreach ($images as $key => $img) {
                if (($key%5==0 && $key!=1) || $key==0) echo '<div class="row edit-image-figure-row">';
                echo "<div class='col-sm-2 edit-image-figure'>
                        <div class='row checkbox-image'>
                          <input type='checkbox' value='$key' name='check_image[]'></input>
                        </div>
                        <img src='$img'/>
                      </div>";
                if ($key%5==4)  echo '</div>';
              }
              if (count($images)%5!=0) echo '</div>';
          echo '<small class="form-text text-muted">This is/Those are the image(s) that are shown for your figure. Select the ones you want to delete.</small>
        </div>
      </div>
      <div class="form-group row">
        <label class="control-label col-sm-2 text-right" for="image">Image link:</label>
        <div class="col-sm-10"> 
          <input type="url" class="form-control" name="image" id="image" maxlength="250" placeholder="Image url">
          <small class="form-text text-muted">You can also add more figures here. It must be a link (url) containing less than 250 characters.</small>
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
  document.getElementById("add-images").innerHTML += \'<div class="form-group row"><label class="control-label col-sm-2 text-right" for="image\'+i+\'">Image link:</label><div class="col-sm-10"> <input type="url" class="form-control" name="image\'+i+\'" id="image\'+i+\'" maxlength="250" placeholder="Image url"><small class="form-text text-muted">More images for the figure.</small></div></div>\';
  i++;
  }
</script>';
?>