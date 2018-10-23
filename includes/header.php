<?php require_once 'config/config.php' ?>
<?php require_once 'libraries/Database.php' ?>
<?php require_once 'helpers/format_helper.php' ?>

<?php
//Create DB object
$db = new Database();

//Create Query for upper block
$query = "SELECT * FROM posts ORDER BY id DESC LIMIT 1;";

//Run Query for upper block
$posts = $db->select($query);

//Create Query for upper block
$query2 = "SELECT * FROM posts ORDER BY id DESC LIMIT 2 OFFSET 1;";

//Run Query for upper block
$posts2 = $db->select($query2);

//Create Query
$query = "SELECT * FROM categories;";

//Run Query
$categories = $db->select($query);
?>

<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Football blog</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
            <div class="col-4 text-center">
                <a class="blog-header-logo text-dark" href="/"><img src="/images/Ligue-1-logo-france-880x660.png"</a>
            </div>
            <div class="col-4 text-title flex-column">
                <a class="blog-header-logo text-dark" href="/">Football blog</a>
                <p class="blog-description">Football is life…Get in the Game!</p>
            </div>
            <div class="col-4 d-flex justify-content-end align-items-center">
                <a class="btn btn-sm btn-outline-secondary" href="#">Sign up</a>
            </div>
        </div>
    </header>

    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="/">Home</a>
            <a class="p-2 text-muted" href="/posts.php">All News</a>
        </nav>
    </div>

  <?php if ($posts) : ?>
  <?php while ($row = $posts->fetch_assoc()) : ?>
    <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
        <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic"><?php echo shortenText($row['title'],'100'); ?></h1>
            <p class="lead my-3"><?php echo shortenText($row['body'],'250'); ?></p>
            <p class="lead mb-0"><a href="post.php?id=<?php echo urlencode($row['id']); ?> "class=text-white font-weight-bold">Continue reading...</a></p>
        </div>
    </div>
  <?php endwhile; ?>
  <?php else : ?>
      <p>There are no posts yet</p>
  <?php endif; ?>



    <div class="row mb-2">
          <?php if ($posts2) : ?>
          <?php while ($row = $posts2->fetch_assoc()) : ?>
            <div class="card flex-md-row mb-4 shadow-sm h-md-250 col-md-6">
                <div class="card-body d-flex flex-column align-items-start">
                    <h3 class="mb-0">
                        <a class="text-dark" href="#"><?php echo shortenText($row['title'],'70'); ?></a>
                    </h3>
                    <div class="mb-1 text-muted"><?php echo formatDate($row['date']); ?></div>
                    <p class="card-text mb-auto"><?php echo shortenText($row['body'],'200'); ?></p>
                    <a href="post.php?id=<?php echo urlencode($row['id']); ?>">Continue reading</a>
                </div>
                <!--<img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">-->
            </div>
            <?php endwhile; ?>
          <?php else : ?>
              <p>There are no posts yet</p>
          <?php endif; ?>
    </div>
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
