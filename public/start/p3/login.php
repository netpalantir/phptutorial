<?php

/// TODO: edit and include your ../init.php file

// tell the interpreter that we know that $conn is global
global $conn;
$errors = array();

/** TODO If there is $_POST...
 *  ckeck that the username and password are there
 *  ask the db if there is such a user
 *  if so, redirect to index.php
 */

include('header.tpl.php');
include('login.tpl.php');
include('footer.tpl.php');