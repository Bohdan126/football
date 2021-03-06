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
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="/images/favicon.ico" rel="icon" type="image/x-icon"/>

    <title>Football blog</title>

    <!-- Bootstrap core CSS -->
    <link href="/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900"
          rel="stylesheet">
    <link href="/css/custom.css" rel="stylesheet">
</head>

<body>

<div class="main-container">
    <header class="blog-header py-3">
        <div class="container">
            <div class="row flex-nowrap justify-content-between align-items-center header-blocks">
                <div class="col-4 text-center logo">
                    <a href="/"><img
                                src="/images/logo.png"</a>
                </div>
                <div class="col-4 text-title flex-column">
                    <a class="blog-header-logo" href="/">Football blog</a>
                    <p class="blog-description">Football is life…Get in the
                        Game!</p>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center sing-up">
                    <a class="btn btn-sm btn-outline-secondary sing-up-link" href="../registration/login.php">Sign up</a>
                </div>
            </div>
        </div>
    </header>
    <div class="container top-content">
        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 navigation-link" href="/">Home</a>
                <a class="p-2 navigation-link" href="/admin">Admin Area</a>
                <a class="p-2 navigation-link" href="/posts.php">All News</a>
            </nav>
        </div>

      <?php if ($posts) : ?>
        <?php while ($row = $posts->fetch_assoc()) : ?>
          <div class="block-wrapper-jumbotron">
              <div class="jumbotron p-3 p-md-5 text-white rounded">
                  <div class="col-md-8 px-0">
                      <h1 class="display-4 font-italic"><?php echo shortenText($row['title'], '100'); ?></h1>
                      <p class="lead my-3"><?php echo shortenText($row['body'], '250'); ?></p>
                      <p class="lead mb-0"><a
                                  href="post.php?id=<?php echo urlencode($row['id']); ?> "
                                  class= font-weight-bold">Continue
                          reading...</a></p>
                  </div>
              </div>
          </div>
        <?php endwhile; ?>
      <?php else : ?>
          <p>There are no posts yet</p>
      <?php endif; ?>


        <div class="row mb-2 card-container">
            <div class="wrapper-card row ">
              <?php if ($posts2) : ?>
                <?php while ($row = $posts2->fetch_assoc()) : ?>
                      <div class="card flex-md-row mb-4 shadow-sm h-md-250 col-md-6">
                          <div class="card-body d-flex flex-column align-items-start text-card-color">
                              <h3 class="mb-0">
                                  <a class="title-card text-card-color"
                                     href="#"><?php echo shortenText($row['title'], '70'); ?></a>
                              </h3>
                              <div class="mb-1 text-muted"><?php echo formatDate($row['date']); ?></div>
                              <p class="card-text mb-auto"><?php echo shortenText($row['body'], '180'); ?></p>
                              <a href="post.php?id=<?php echo urlencode($row['id']); ?>">Continue
                                  reading</a>
                          </div>
                          <!--<img class="card-img-right flex-auto d-none d-lg-block" data-src="holder.js/200x250?theme=thumb" alt="Card image cap">-->
                      </div>
                <?php endwhile; ?>
              <?php else : ?>
                  <p>There are no posts yet</p>
              <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">
