<?php
session_start();

//Create DB object
$db = new Database();
$errors = array();

if (isset($_POST['register'])) {
  //Assign Vars
  $username = mysqli_real_escape_string($db->link, $_POST['username']);
  $email = mysqli_real_escape_string($db->link, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db->link, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db->link, $_POST['password_2']);

  //Simple Validation
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($email)) {
    array_push($errors, "Email is required");
  }
  if (empty($password_1)) {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }
  // if there are no errors, save to database
  if (count($errors) == 0){

    $password = md5($password_1);
    $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

    $insert_row = $db->insertRegistration($query);
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header("Location: ../admin");
    exit();
  }
  else {
    die('Error : (' . $this->link->error . ')' . $this->link->error);
  }
}

//log user in from login page
$db = new Database();
$errors = array();


if (isset($_POST['login'])){
  $username = mysqli_real_escape_string($db->link, $_POST['username']);
  $password = mysqli_real_escape_string($db->link, $_POST['password']);

  //Simple Validation
  if (empty($username)) {
    array_push($errors, "Username is required");
  }
  if (empty($password)) {
    array_push($errors, "Password is required");
  }
  if (count($errors) == 0){
    $password = md5($password);
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $insert_row = $db->select($query);

    if ($insert_row && mysqli_num_rows($insert_row) == 1){
      $_SESSION['username'] = $username;
      $_SESSION['success'] = 'You are now logged in';
      header('location: ../admin');
    } else {
      array_push($errors, "wrong username/password combination");
    }
  }
}

// logout
if (isset($_GET['logout'])){
  session_destroy();
  unset($_SESSION['username']);
  header('location: ../index.php');
}
