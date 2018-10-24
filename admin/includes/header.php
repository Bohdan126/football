<?php require_once '../config/config.php' ?>
<?php require_once '../libraries/Database.php' ?>
<?php require_once '../helpers/format_helper.php' ?>
<!Doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Admin Area</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900"
          rel="stylesheet">
    <link href="../css/custom.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <header class="blog-header py-3">
        <h2>Admin Area</h2>
    </header>
  <?php if (isset($_GET['msg'])) : ?>
      <div class="alert alert-success"><?php echo htmlentities($_GET['msg']) ?></div>
  <?php endif; ?>
    <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
            <a class="p-2 text-muted" href="index.php">Dashboard</a>
            <a class="p-2 text-muted" href="add_post.php">Add Post</a>
            <a class="p-2 text-muted" href="add_category.php">Add Category</a>
            <a class="p-2 text-muted pull-right" href="http://football.loc/">Visit
                Blog</a>
        </nav>
    </div>
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-12 blog-main">