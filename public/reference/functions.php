 <?php
 
 function pre($x) {
	echo("<pre>");
	print_r($x);
	echo("</pre>");
}

function diepre($x) {
	pre($x);
	die();
}

function q($x) {
	return htmlspecialchars($x);
}