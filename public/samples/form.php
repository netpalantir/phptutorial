<?php

var_dump($_SERVER);

echo('<pre>');
var_dump($_POST);
echo('</pre>');
?>

<form method='post'>
  <input type='text' name='ciao' value='abc' />
  
  <input type='radio' id='opzione1' name='opzioni' value='1' checked /> 
  <label for='opzione1'>Opzione 1</label>

  <input type='radio' id='opzione2' name='opzioni' value='2' />    
  <label for='opzione2'>Opzione 2</label>
  
  <select name='altre-opzioni'>
    <option value='a'>Ciao</option>
    <option value='b'>Mondo</option>
  </select>
  
  <input type='submit' name='bottone' value='accetto' />
</form>

<form method='post'>
  <input type='submit' name='bottone2' value='non accetto' />
</form>