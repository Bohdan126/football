<?php require_once '../config/config.php' ?>
<?php require_once '../libraries/Database.php' ?>
<?php require_once '../helpers/format_helper.php' ?>
<?php require_once 'server.php'?>
<!DOCTYPE HTML>
<html>
<head>
  <title>User registration system using PHP and MYSQL</title>
  <link rel="stylesheet" type="text/css" href="../css/custom.css"
</head>

<body>
<div class="register-login">
  <div class="register-login-header">
    <h2>Login</h2>
  </div>

  <form method="post" action="login.php">
      <!-- display validation errors here -->
        <?php include ('errors.php')?>
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="<?php if (!empty($_POST['username'])){echo $_POST['username'];}?>">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password" <?php if (!empty($_POST['password'])){echo $_POST['password'];}?>>
    </div>
    <div class="input-group">
        <button type="submit" name="login" class="btn-register-login"><span>Login</span></button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign in</a>
    </p>
  </form>
</div>
</body>
</html>
