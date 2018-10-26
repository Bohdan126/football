<?php require_once 'includes/header.php';
require_once '../registration/server.php';?>
<?php
// if user is not logged in, they cannot access this page
if (empty($_SESSION['username'])) {
  header('location: ../registration/login.php');
}
?>
<?php

//Create DB object
$db = new Database();

if (isset($_POST['submit'])) {
  //Assign Vars
  $title = mysqli_real_escape_string($db->link, $_POST['title']);
  $body = mysqli_real_escape_string($db->link, $_POST['body']);
  $category = mysqli_real_escape_string($db->link, $_POST['category']);
  $author = mysqli_real_escape_string($db->link, $_POST['author']);
  $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
  //Simple Validation
  if ($title == '' or $body == '' or $category == '' or $author == '') {
    //Set Error
    $error = 'Please fill out all required fields';
  }
  else {
    $query = "INSERT INTO posts (title, body, category, author, tags) VALUES ('$title', '$body', $category, '$author', '$tags')";

    $insert_row = $db->insert($query);
  }
}
?>
<?php

//Create DB object
$db = new Database();

//Create Query
$query = "SELECT * FROM categories;";

//Run Query
$categories = $db->select($query);
?>

<form method="post" action="add_post.php">
    <div class="form-group">
        <label>Post Title</label>
        <input name="title" type="text" class="form-control"
               placeholder="Enter Title">
    </div>
    <div class="form-group">
        <label>Post Body</label>
        <textarea name="body" class="form-control"
                  placeholder="Enter Body"></textarea>
    </div>
    <div class="form-group">
        <label>Category</label>
        <select name="category" class="form-control">
          <?php while ($row = $categories->fetch_assoc()) : ?>
            <?php if ($row['id'] == $post['category']) {
              $selected = 'selected';
            }
            else {
              $selected = '';
            }
            ?>
              <option <?php echo $selected; ?>
                      value="<?php echo $row['id'] ?>"><?php echo $row['name']; ?></option>
          <?php endwhile; ?>
        </select>
    </div>
    <div class="form-group">
        <label>Author</label>
        <input name="author" type="text" class="form-control"
               placeholder="Enter Author Name">
    </div>
    <div class="form-group">
        <label>Tags</label>
        <input name="tags" type="text" class="form-control"
               placeholder="Enter Tags">
    </div>
    <div>
        <input name="submit" type="submit" class="btn btn-default"
               value="Submit" </input>
        <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
    <br>
</form>

<?php require_once 'includes/footer.php' ?>
