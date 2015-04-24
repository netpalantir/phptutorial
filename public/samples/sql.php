<?

global $conn;
$conn = new mysqli("localhost", "vagrant", "vagrant", "todolist");
if ($conn->connect_errno) {
  printf("Connect failed: %s\n", $conn->connect_error);
  exit();
}
if ( ! $conn->set_charset("utf8")) {
  printf("Error loading character set utf8: %s\n", $conn->error);
}



$myData = array();
$u = "maciej'\\ or 'a' = 'a";
die($conn->real_escape_string($u) . "\n");

$sql = "SELECT * from todouser where username = ?";


$stmt = $conn->prepare($sql);
if(!$stmt) {
  die("Errore nell'esecuzione della query");
}

$stmt->bind_param('s', $u);
$stmt->execute();

$res = $stmt->get_result();
while($row = $res->fetch_array(MYSQLI_ASSOC)) {
  $myData[] = $row;
}

print_r($myData);