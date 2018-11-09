<?php require_once 'includes/header_for_post.php' ?>
<?php
//Create DB object
$db = new Database();

//Check URL For Category
if (isset($_GET['category'])) {
  $category = $_GET['category'];
  //Create Query
  $query = "SELECT * FROM posts  WHERE category = " . $category;

  //Run Query
  $posts = $db->select($query);
}
else {
  //Create Query
  $query = "SELECT * FROM posts ORDER BY id DESC LIMIT 5;";

  //Run Query
  $posts = $db->select($query);
}

//Create Query
$query = "SELECT * FROM categories;";

//Run Query
$categories = $db->select($query);
?>
<?php if ($posts) : ?>
  <?php while ($row = $posts->fetch_assoc()) : ?>
        <!--<h3 class="pb-3 mb-4 font-italic border-bottom">
            News
        </h3>-->

        <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title']; ?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']); ?> by
                <a><?php echo $row['author']; ?></a>
            </p>
          <?php echo shortenText($row['body']); ?>
            <a class="readmore"
               href="post.php?id=<?php echo urlencode($row['id']); ?>">Read
                More</a>
        </div><!-- /.blog-post -->
  <?php endwhile; ?>

<?php else : ?>
    <p>There are no posts yet</p>
<?php endif; ?>
    </div><!-- /.blog-main -->
<?php require_once 'includes/footer.php' ?>