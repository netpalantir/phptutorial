<?php

include('../init.php');
global $conn;

$errors = array();

if(count($_POST)) {
  // Validate username
  if(mb_strlen($_POST['username']) < 5 || mb_strlen($_POST['username']) > 20 ||
     mb_strlen($_POST['password']) < 5 || mb_strlen($_POST['password']) > 20 ) {
    $errors['username'] = 'Username o password non valide 1.';
  }

  // If no errors
  if(!$errors) {
    $stmt = $conn->prepare('select * from todouser where username = ? and password = ?');
    $stmt->bind_param('ss', $_POST['username'], $_POST['password']);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_array();
    $stmt->close();

    if($row) {
      // Login succeeded!

      // Avoid session fixation
      session_regenerate_id();

      $_SESSION['username'] = $row['username'];
      $_SESSION['userid'] = $row['id'];
      header('Location: index.php');
      exit();
    }
  }
}

include('header.tpl.php');
include('login.tpl.php');
include('footer.tpl.php');