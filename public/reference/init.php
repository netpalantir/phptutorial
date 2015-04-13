 <?php
 
include('functions.php');

Global $conn;
$conn = mysqli_connect("localhost", "vagrant", "vagrant", "todolist");
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

if (!mysqli_set_charset($conn, "utf8")) {
    printf("Error loading character set utf8: %s\n", mysqli_error($conn));
}