<?php

include('../init.php');

// check if we are logged in. If not, redirect to login.php
if(!$_SESSION['user']) {
  header('Location: login.php');
  exit();
}

$form = array(
  'title' => '',
  'exp' => '',
);
$errors = array();

if(isset($_POST['add'])) {
  $form['title'] = $_POST['title'];
  if(!strlen($_POST['title'])) {
    $errors['title'] = 'Titolo: non puo` essere vuoto';
  }

  $dateToDb = null;
  if(isset($_POST['exp']) && strlen($_POST['exp']) > 0) {
    $form['exp'] = $_POST['exp'];

    $exp = date_create_from_format('d/m/Y', $_POST['exp']);
    if($exp !== false && $exp->getTimestamp() > time()) {
      $dateToDb = strftime('%F', $exp->getTimestamp());
      // $dateToDb = $exp->format('c');
    }
    else {
      $errors['exp'] = 'Data di scadenza: data non valida';
    }
  }

  if(!$errors) {
    $sql = "insert into todoitem (userId, title, expDate) values(?, ?, ?)";
    $stmt = $conn->prepare($sql) or die("Errore nell'esecuzione della query");
    $stmt->bind_param(
      'iss',
      $_SESSION['user']['id'],
      $_POST['title'],
      $dateToDb
    );
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
