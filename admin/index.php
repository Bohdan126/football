<?php require_once 'includes/header.php';
      require_once '../registration/server.php'?>
<?php
// if user is not logged in, they cannot access this page
if (empty($_SESSION['username'])) {
    header('location: ../registration/login.php');
}
?>

<?php
//Create DB Object
$db = new Database();

//Create Query
$query = "SELECT posts.*, categories.name FROM posts INNER JOIN categories ON posts.category = categories.id ORDER BY posts.id DESC ";

//Run Query
$posts = $db->select($query);

//Create Query
$query = "SELECT * FROM categories ORDER BY categories.id DESC;";

//Run Query
$categories = $db->select($query);
?>
<?php
if (isset($_SESSION['username'])) : ?>
    <div class="welcome">Welcome <strong><?php echo $_SESSION['username']; ?>!</strong>
    <p><a href="index.php?logout='1'" style="color: red">Logout</a></p></div>
<?php endif; ?>
<table class="table">
    <tr>
        <th>Post ID#</th>
        <th>Post Title</th>
        <th>Category</th>
        <th>Author</th>
        <th>Date</th>
    </tr>
  <?php while ($row = $posts->fetch_assoc()) : ?>
      <tr>
          <td><?php echo $row['id'] ?></td>
          <td>
              <a href="edit_post.php?id=<?php echo $row['id']; ?>"><?php echo $row['title'] ?>
          </td>
          </a>
          <td><?php echo $row['name'] ?></td>
          <td><?php echo $row['author'] ?></td>
          <td><?php echo formatDate($row['date']) ?></td>
      </tr>
  <?php endwhile; ?>
</table>

<table class="table">
    <tr>
        <th>Category ID#</th>
        <th>Category Name</th>
    </tr>
  <?php while ($row = $categories->fetch_assoc()) : ?>
      <tr>
          <td><?php echo $row['id'] ?></td>
          <td>
              <a href="edit_category.php?id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?>
          </td>
          </a>
      </tr>
  <?php endwhile; ?>
</table>

<?php require_once 'includes/footer.php' ?>

