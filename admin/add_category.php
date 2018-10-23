<?php require_once 'includes/header.php' ?>
<?php

//Create DB object
$db = new Database();

if (isset($_POST['submit'])){
  //Assign Vars
  $name = mysqli_real_escape_string($db->link,$_POST['name']);

  //Simple Validation
  if ($name == ''){
    //Set Error
    $error = 'Please fill out all required field';
  } else {
    $query = "INSERT INTO categories (name) VALUES ('$name')";

    $update_row = $db->update($query);
  }
}
?>

<form method="post" action="add_category.php">
  <div class="form-group">
    <label>Category Name</label>
    <input name="name" type="text" class="form-control" placeholder="Category">
  </div>
  <div>
    <input name="submit" type="submit" class="btn btn-default" value="Submit" </input>
    <a href="index.php" class="btn btn-default">Cancel</a>
  </div>
  <br>
</form>

<?php require_once 'includes/footer.php' ?>