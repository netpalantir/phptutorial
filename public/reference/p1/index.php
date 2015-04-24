<?php

include('../init.php');

$form = array(
  'fname'    => '',
  'lname'    => '',
  'email'    => '',
  'username' => '',
  'privacy'  => '',
);
$errors = array();

if (count($_POST) > 0) {
  // Validate first name
  $form['fname'] = $_POST['fname'];
  if ( ! isset($_POST['fname']) || strlen($_POST['fname']) == 0) {
    $errors['fname'] = 'Nome: campo obbligatorio';
  } else if (mb_strlen($_POST['fname']) > 50) {
    $errors['fname'] = 'Nome: valore troppo lungo';
  }

  // Validate last name
  $form['lname'] = $_POST['lname'];
  if ( ! isset($_POST['lname']) || strlen($_POST['lname']) == 0) {
    $errors['lname'] = 'Cognome: campo obbligatorio';
  } else if (mb_strlen($_POST['lname']) > 50) {
    $errors['lname'] = 'Cognome: valore troppo lungo';
  }

  // Validate email
  $form['email'] = $_POST['email'];
  if ( ! isset($_POST['email']) || ! filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = 'Email: valore non valido';
  }

  // Validate username
  $form['username'] = $_POST['username'];
  if ( ! isset($_POST['username']) || ! preg_match('#^[a-zA-Z0-9_-]{5,10}$#', $_POST['username'])) {
    $errors['username'] = 'Username: inserisci da 5 a 10 lettere non accentate, numeri o trattini.';
  }

  // Validate password
  if ( ! isset($_POST['password']) || mb_strlen($_POST['password']) < 6) {
    $errors['username'] = 'Password: inserisci almeno 6 caratteri.';
  } else if ( ! isset($_POST['password2']) || $_POST['password'] != $_POST['password2']) {
    $errors['password2'] = 'Le due password non coincidono.';
  }

  // Validate privacy
  $form['privacy'] = 'checked';
  if ( ! isset($_POST['privacy'])) {
    $errors['privacy'] = 'Privacy: non possiamo procedere senza il consenso al trattamento dei dati.';
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
    /// TODO: this is insecure!!! DO NOT USE!!!
    /// TODO: fix vulnerability: sql injection
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

    header('Location: success.php');
    exit();
  }
}

include('template.html');
