<?php require_once 'includes/header.php';
require_once '../registration/server.php'?>
<?php
// if user is not logged in, they cannot access this page
if (empty($_SESSION['username'])) {
  header('location: ../registration/login.php');
}
?>
<?php
$id = $_GET['id'];

//Create DB object
$db = new Database();

//Create Query
$query = "SELECT * FROM categories WHERE id = " . $id;

//Run Query
$category = $db->select($query)->fetch_assoc();

//Create Query
$query = "SELECT * FROM categories;";

//Run Query
$categories = $db->select($query);
?>

<?php
if (isset($_POST['submit'])) {
  //Assign Vars
  $name = mysqli_real_escape_string($db->link, $_POST['name']);
  //Simple Validation
  if ($name == '') {
    //Set Error
    $error = 'Please fill out all required fields';
  }
  else {
    $query = "UPDATE categories SET 
                name = '$name'
                WHERE id = $id";

    $update_row = $db->update($query);
  }
}
?>

<?php
if (isset($_POST['delete'])) {
  $query = "DELETE FROM categories WHERE id = $id";
  $delete_row = $db->delete($query);

}
?>

<form method="post" action="edit_category.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label>Category Name</label>
        <input name="name" type="text" class="form-control"
               placeholder="Category" value="<?php echo $category['name']; ?>">
    </div>
    <div>
        <input name="submit" type="submit" class="btn btn-default"
               value="Submit" </input>
        <a href="index.php" class="btn btn-default">Cancel</a>
        <input name="delete" type="submit" class="btn btn-danger"
               value="Delete" </input>
    </div>
    <br>
</form>

<?php require_once 'includes/footer.php' ?>
