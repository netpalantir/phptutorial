 <?php
 
/** Prints the passed string, wrapped around a <pre></pre> tag
 * @param x string the string to be echo'ed
 * @returns null
 */
 function pre($x) {
	echo("<pre>");
	print_r($x);
	echo("</pre>");
}

/** Prints the passed string, wrapped around a <pre></pre> tag, then terminates the script
 * @param x string the string to be echo'ed
 * @returns null
 */
function diepre($x) {
	pre($x);
	die();
}


 /** Escapes the html special characters
 * @param x string the string to be echoed
 * @returns null
 */
function q($x) {
	return htmlspecialchars($x);
}