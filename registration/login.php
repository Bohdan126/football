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
    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username">
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="text" name="password_1">
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
