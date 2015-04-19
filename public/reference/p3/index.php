<?php

include('../init.php');

$errors = array();
$items = array();

// Check login
if(!$_SESSION['userid']) {
  header('Location: login.php');
  exit();
}

// Check if we need to add anything
if(isset($_POST['add'])) {
	$exp = null;
	$title = $_POST['title'];

	// Validate title
	if(!mb_strlen($title) || mb_strlen($title) > 255) {
		$errors[] = 'Il titolo non può essere vuoto.';
	}
	
	// Validate exp
	if($_POST['exp']) {
		$date = date_create_from_format('d/m/Y', $_POST['exp']);
		if($date->getTimestamp() < time()) {
			$errors[] = 'Data di scadenza: non può essere nel passato.';
		}
		else {
		  $exp = $date->format('c');
		}
	}
	
	// If no errors, then add it
	if(!$errors) {
		$stmt = $conn->prepare('insert into todoitem (title, expDate, userId) values(?, ?, ?)');
		$stmt->bind_param('ssi', $title, $exp, $_SESSION['userid']);
		$stmt->execute();
	} 
}

// Fetch all items
$stmt = $conn->prepare('select * from todoitem where userId= ? order by expDate asc, id asc');
$stmt->bind_param('i', $_SESSION['userid']);
$stmt->execute();
$result = $stmt->get_result();
while($row = $result->fetch_array()) {
	$row['expTimestamp'] = strtotime($row['expDate']);
	$items[] = $row;
}
$stmt->close();

include('header.tpl.php');
include('index.tpl.php');
include('footer.tpl.php');
