<?php require_once '../config/config.php' ?>
<?php require_once '../libraries/Database.php' ?>
<?php require_once '../helpers/format_helper.php' ?>
<?php require_once 'server.php' ?>
<!DOCTYPE HTML>
<html>
<head>
  <title>User registration system using PHP and MYSQL</title>
  <link rel="stylesheet" type="text/css" href="../css/custom.css"
</head>
<body>
<div class="register-login">
<div class="register-login-header">
  <h2>Register</h2>
</div>

<form method="post" action="register.php">
  <!-- display validation errors here -->
  <?php include ('errors.php')?>
  <div class="input-group">
    <label>Username</label>
    <input placeholder="Username" type="text" name="username" value="<?php if (!empty($_POST['username'])){echo $_POST['username'];}?>">
  </div>
  <div class="input-group">
    <label>Email</label>
    <input placeholder="Email" type="email" name="email" value="<?php if (!empty($_POST['email'])){echo $_POST['email'];}?>">
  </div>
  <div class="input-group">
    <label>Password</label>
    <input placeholder="Password" type="password" name="password_1" pattern="^\S*(?=\S{6,25})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$">
    <p class="pas-description">A password must be at least six characters long including one letter, one lowercase letter, and a number</p><br>
  </div>
  <div class="input-group">
    <label>Confirm Password</label>
    <input placeholder="Confirm Password" type="password" name="password_2" pattern="^\S*(?=\S{6,25})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$">
  </div>
  <div class="input-group">
    <button type="submit" name="register" class="btn-register-login"><span>Register</span></button>
  </div>
  <p>
    Already a member? <a href="login.php">Sign in</a>
  </p>
  <p>
    <a href="/">Back to site</a>
  </p>
</form>
</div>
</body>
</html>
