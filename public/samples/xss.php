<?php

$u = '???';
if(isset($_GET['username'])) {
	$u = $_GET['username'];
}

?>
<p>Ciao <?=htmlspecialchars($u)?>