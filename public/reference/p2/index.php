<?php

include('../init.php');
global $conn;

// Validate your post

$errors = array();
$form = array();
if(count($_POST)) {
	// Validate first name
  $form['fname'] = $_POST['fname'];
	if(!isset($_POST['fname']) || strlen($_POST['fname']) == 0) {
		$errors['fname'] = 'Nome: campo obbligatorio';
	}
	else if(strlen($_POST['fname']) > 50) {
		$errors['fname'] = 'Nome: valore troppo lungo';
	}
	
	// Validate last name
  $form['lname'] = $_POST['lname'];
	if(!isset($_POST['lname']) || strlen($_POST['lname']) == 0) {
		$errors['lname'] = 'Cognome: campo obbligatorio';
	}
	else if(strlen($_POST['lname']) > 50) {
		$isValid = false;
		$errors['lname'] = 'Cognome: valore troppo lungo';
	}
	
	// Validate email
  $form['email'] = $_POST['email'];
	if(!isset($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Email: valore non valido';
	}
	
	// Validate username
  $form['username'] = $_POST['username'];
	if(!isset($_POST['username']) || !preg_match('#^[a-zA-Z0-9_-]{5,10}$#', $_POST['username'])) {
		$errors['username'] = 'Username: inserisci da 5 a 10 lettere non accentate, numeri o trattini.';
	}

  // Validate password
  $form['password'] = $_POST['password'];
  if(!isset($_POST['password']) || mb_strlen($_POST['password']) < 6) {
    $errors['password'] = 'La password deve essere di almeno 8 caratteri.';
  }else if(!isset($_POST['password2']) || $_POST['password'] != $_POST['password2']) {
    $errors['password2'] = 'Le due password non coincidono.';
  }
	
	// Validate privacy
  $form['privacy'] = 'checked';
	if(!isset($_POST['privacy'])) {
    $form['privacy'] = '';
		$errors['privacy'] = 'Privacy: non possiamo procedere senza il consenso al trattamento dei dati.';
	}

  // Check if username is occupied
  if(!$errors) {
    $stmt = $conn->prepare('SELECT count(*) from todouser where username = ?');
    $stmt->bind_param('s', $form['username']);
    $stmt->execute();
    $stmt->bind_result($cnt);
    if($cnt != 0) {
      $errors['username'] = 'Username già occupata. Scegline un\'altra';
    }
    $stmt->close();
  }

  // If all is still OK, then we can save this to the DB and redirect to the confirmed page.
  if(!$errors) {
    /// TODO: la password non è al sicuro in questa maniera!
    $stmt = $conn->prepare('insert into todouser (fname, lname, email, username, password) values (?, ?, ?, ?, ?)');
    $res = $stmt->bind_param('sssss', $form['fname'], $form['lname'], $form['email'], $form['username'], $form['password']);
    $res = $stmt->execute();


    // All done! Redirect to the Login page.
    header('Location: login.php?fromreg=1');
    exit();
  }
}

include('template.html');
