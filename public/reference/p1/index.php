<?php

include('../functions.php');

// Validate your post

$errors = array();
if(count($_POST)) {
	// Validate first name
	if(strlen($_POST['fname']) == 0) {
		$errors['fname'] = 'Nome: campo obbligatorio';
	}
	else if(strlen($_POST['fname']) > 50) {
		$errors['fname'] = 'Nome: valore troppo lungo';
	}
	
	// Validate last name
	if(strlen($_POST['lname']) == 0) {
		$errors['lname'] = 'Cognome: campo obbligatorio';
	}
	else if(strlen($_POST['fname']) > 50) {
		$isValid = false;
		$errors['lname'] = 'Cognome: valore troppo lungo';
	}
	
	// Validate email
	if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Email: valore non valido';
	}
	
	// Validate dob
	if(!preg_match('#^[0-9]+/[0-9]+/[0-9]+$#', $_POST['dob'])) {
		$errors['dob'] = 'Data di nascita: inserisci la data in formato gg/mm/aaaa, ad esempio: 31/12/1980';
	}
	
	// Validate username
	if(!preg_match('#^[a-zA-Z0-9_-]{5,10}$#', $_POST['username'])) {
		$errors['username'] = 'Username: inserisci da 5 a 10 lettere non accentate, numeri o trattini.';
	}
}

include('template.html');

// Do not close your php file here: leave it open, so no extra spaces in the end
// mess up with it!
// ?>