<?php

/// TODO: include your functions file

/* TODO: create a connection to your db called $conn
 * username: vagrant
 * password: vagrant
 * host: localhost
 *
 * Useful functions:
 * $conn = new mysqli(...)
 * $conn->set_charset(...)
 *
 * Be sure to check for errors!
 * */

// Print SQL errors. Not recommended in production.
$driver = new mysqli_driver();
$driver->report_mode = MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT;