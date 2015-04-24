<?
$x = array(
	5 => 5,
	'a' => 1,
	'b' => 2,
	1 => 3,
	5
);

function printArray($x, $lead = '') {
	foreach($x as $k => $v) {
		if(!is_array($v)) {
			echo("$lead$k vale $v\n");
		}
		else {
			printArray($v, $lead . '  ');
		}
	}
}

$glue = '';
foreach($x as $v) {
  echo("$glue$v");
  $glue = ', ';
}

echo("--\n");

$string = join(', ', $x);
echo($string);




echo("\n\n");