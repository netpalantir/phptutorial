<?

$text = '29.2/2011';

$pieces = preg_split('#[/.]#', $text);
$isOk = checkdate($pieces[1], $pieces[0], $pieces[2]);
var_dump($isOk);