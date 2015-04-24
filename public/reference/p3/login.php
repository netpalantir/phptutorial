<?php

include('../init.php');

// tell the interpreter that we know that $conn is global
global $conn;
$errors = array();

if(count($_POST)) {
  // Validate username
  if(mb_strlen($_POST['username']) < 5 || mb_strlen($_POST['username']) > 20 ||
     mb_strlen($_POST['password']) < 5 || mb_strlen($_POST['password']) > 20 ) {
    $errors['username'] = 'Username o password non validi.';
  }

  if(!$errors) {
    $user = array();

    // Valida le credenziali dell'utente
    $sql = "select * from todouser where " .
           "username = ? " .
           "and password = ?";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param('ss', $_POST['username'], $_POST['password']);
    $stmt->execute();

    if ($result = $stmt->get_result()) {
      if($result->num_rows == 0) {
        $errors['username'] = 'Username o password non validi (2).';
      }
      else {
        $row = $result->fetch_assoc();
        $user['username'] = $row['username'];
        $user['id'] = $row['id'];
      }

      /* free result set */
      $result->close();
    }


    if(!$errors) {
      session_regenerate_id();
      $_SESSION['user'] = $user;

      header('Location: index.php');
      exit();
    }
  }
}

include('header.tpl.php');
include('login.tpl.php');
include('footer.tpl.php');