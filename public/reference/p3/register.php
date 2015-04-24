<?php

include('../init.php');

$form = array(
  'fname' => '',
  'lname' => '',
  'email' => '',
  'username' => '',
  'privacy' => '',
);
$errors = array();

if ($_POST) {
  // Validate first name
  $form['fname'] = $_POST['fname'];
  if (mb_strlen($_POST['fname']) == 0 || mb_strlen($_POST['fname']) > 50) {
    $errors['fname'] = 'Nome: il campo è obbligatorio';
  }

  // Validate lasts name
  $form['lname'] = $_POST['lname'];
  if (mb_strlen($_POST['lname']) == 0 || mb_strlen($_POST['lname']) > 50) {
    $errors['lname'] = 'Cognome: il campo è obbligatorio';
  }

  // Validate email
  $form['email'] = $_POST['email'];
  if ( ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Email: email non valida';
  }

  // Validate username
  $form['username'] = $_POST['username'];
  if ( ! preg_match('/^[a-zA-Z]+/', $_POST['username'])) {
    $errors['username'] = 'Username: non valida';
  }

  // Validate password
  if (mb_strlen($_POST['password']) == 0 || mb_strlen($_POST['password']) > 50) {
    $errors['password'] = 'Password: il campo è obbligatorio';
  } else if ($_POST['password'] != $_POST['password2']) {
    $errors['password'] = 'Password: le password non coincidono';
  }

  // Validate privacy
  $form['privacy'] = 'checked';
  if ( ! isset($_POST['privacy'])) {
    $errors['privacy'] = 'Privacy: il campo è obbligatorio';
    $form['privacy'] = '';
  }

  // Check for username duplicates
  if(!$errors) {
    if ($result = $conn->query(
      "select * from todouser where username = '${form['username']}'")) {
      if($result->num_rows > 0)
        $errors['username'] = 'Username: questo utente esiste gi&agrave;';

      /* free result set */
      $result->close();
    }
  }

  // Now save to DB
  if(!$errors) {
    $result = $conn->query(
      "insert into todouser (fname, lname, email, username, password) " .
      " values " .
      "(".
      "'" . $form['fname'] . "', " .
      "'" . $form['lname'] . "', " .
      "'" . $form['email'] . "', " .
      "'" . $form['username'] . "', " .
      "'" . $_POST['password'] . "'" .
      ")"
    );

    header('Location: login.php');
    exit();
  }
}

include('header.tpl.php');
include('register.tpl.php');
include('footer.tpl.php');
