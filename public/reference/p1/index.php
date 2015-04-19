<?php

include('../functions.php');

// Validate your post

$errors = array();
if(count($_POST) > 0) {
	// Validate first name
	if(!isset($_POST['fname']) || strlen($_POST['fname']) == 0) {
		$errors['fname'] = 'Nome: campo obbligatorio';
	}
	else if(strlen($_POST['fname']) > 50) {
		$errors['fname'] = 'Nome: valore troppo lungo';
	}
	
	// Validate last name
  if(!isset($_POST['lname']) || strlen($_POST['lname']) == 0) {
		$errors['lname'] = 'Cognome: campo obbligatorio';
	}
	else if(strlen($_POST['lname']) > 50) {
		$isValid = false;
		$errors['lname'] = 'Cognome: valore troppo lungo';
	}
	
	// Validate email
	if(!isset($_POST['email']) || !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Email: valore non valido';
	}
	
	// Validate username
  if(!isset($_POST['username']) || !preg_match('#^[a-zA-Z0-9_-]{5,10}$#', $_POST['username'])) {
		$errors['username'] = 'Username: inserisci da 5 a 10 lettere non accentate, numeri o trattini.';
	}

  // Validate password
  if(!isset($_POST['password']) || mb_strlen($_POST['password']) < 6) {
    $errors['username'] = 'Password: inserisci almeno 6 caratteri.';
  }
  else if(!isset($_POST['password2']) || $_POST['password'] != $_POST['password2']) {
    $errors['password2'] = 'Le due password non coincidono.';
  }
	
	// Validate privacy
	if(!isset($_POST['privacy'])) {
		$errors['privacy'] = 'Privacy: non possiamo procedere senza il consenso al trattamento dei dati.';
	}
}

include('template.html');
