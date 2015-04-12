<?
/**
Questo esempio mostra la differenza tra le funzioni standard di operatività con le stringhe e le funzioni multibyte.
*/
?>
<pre>
<?
// Imposta la localizzazione a Italiano con Unicode
setlocale(LC_ALL, 'it_IT.utf8');

// Qual è la locale attuale?
echo("locale: " . setlocale  (LC_ALL,"0") . "\n");

// Qual è l'encoding di mb? (settato da php.ini)
echo("mb_internal_encoding: " . mb_internal_encoding() . "\n");

$x = 'Sarà una bella giornata! èòù€' . "\n";
echo($x);

// Con le funzioni standard
echo(strtoupper($x));
echo("Lunghezza in byte: " . strlen($x) . "\n");

// Con le funzioni multibyte
echo(mb_strtoupper($x));
echo("Lunghezza in caratteri: " . mb_strlen($x) . "\n");