<?php

session_start();
include('functions.php');

global $conn;
$conn = new mysqli("localhost", "vagrant", "vagrant", "todolist");
if ($conn->connect_errno) {
  printf("Connect failed: %s\n", $conn->connect_error);
  exit();
}

if ( ! $conn->set_charset("utf8")) {
  printf("Error loading character set utf8: %s\n", $conn->error);
}

$driver = new mysqli_driver();
$driver->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;
