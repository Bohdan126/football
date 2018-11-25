<?php require_once 'config/config.php' ?>
<?php require_once 'libraries/Database.php' ?>
<?php require_once 'helpers/format_helper.php' ?>
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


<header class="blog-header py-3">
    <div class="container">
        <div class="row flex-nowrap justify-content-between align-items-center header-blocks">
            <div class="col-4 text-center logo">display-4
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
</div>

<main role="main" class="container">
    <div class="row">
        <div class="col-md-8 blog-main">

