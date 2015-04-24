<div class="container">
  <h1>PHP Intro: gestione di form</h1>

  <?php if($errors) { ?>
    <div class="bg-danger">
      <p>Il form contiene degli errori. Correggi e riprova.</p>
      <ul>
        <?php foreach($errors as $e) { ?>
          <li><?=$e?></li>
        <?php } ?>
      </ul>
    </div>
  <?php } ?>

  <form method='post'>
    <div class="form-group">
      <label for="fname">Nome</label>
      <input type="text" class="form-control" id="fname" name='fname' placeholder="Nome" value="<?=htmlspecialchars($form['fname'])?>">
    </div>
    <div class="form-group">
      <label for="lname">Cognome</label>
      <input type="text" class="form-control" id="lname" name='lname' placeholder="Cognome" value="<?=$form['lname']?>">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" id="email" name='email' placeholder="email@example.com" value="<?=$form['email']?>">
    </div>

    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name='username' placeholder="" value="<?=$form['username']?>">

      <p class="help-block">Solo lettere, numeri e trattini alti.</p>
    </div>

    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>

    <div class="form-group">
      <label for="password2">Digita nuovamente la password</label>
      <input type="password" class="form-control" id="password2" name="password2" placeholder="Password">
    </div>

    <div class="form-group">
      <label>Privacy</label><br/>
      <input type="checkbox" id="privacy" name="privacy" value="1" <?=$form['privacy']?>>
      <label for="password">Acconsento al trattamento dei dati</label>
    </div>


    <button type="submit" class="btn btn-primary">Invia</button>
  </form>

  <h2>Funzioni utili in questa fase</h2>
  <p>
    <b>echo($x)</b>: stampa immediatamente una stringa<br/>
    <b>print_r($x)</b>: stampa ricorsivamente una variabile (solo per debug)<br/>
    <b>die($x)</b>: stampa $x (opzionale) e termina immediatamente l'esecuzione dello script<br/>
    <b>isset($x)</b>: true se la variabile è definita, false altrimenti<br/>
    <b>strlen($x)</b>: ritorna la lunghezza della stringa (in byte)<br/>
    <b>filter_var($x,FILTER_VALIDATE_EMAIL)($x)</b>: ritorna true se la variabile è un indirizzo di email valido<br/>
    <b>preg_match(...)</b>: controlla se la stringa corrisponde all'espressione regolare<br/>
    <b>include($fileName)</b>: include sul posto il file $fileName<br/>
  </p>
</div>