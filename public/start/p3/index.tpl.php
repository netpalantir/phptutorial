<div class="container">
<h1>Benvenuto, nome_utente_qui</h1>

<? if(count($errors)) { ?>
<div class='error'>
	<p>Il form contiene degli errori. Correggi e riprova.</p>
	<ul>
	<? foreach($errors as $e) { ?>
		<li><?=$e?></li>
	<? } ?>
	</ul>
</div>
<? } ?>

<form method='post'>
	<div class='todo-items'>

		<div class="form-group todo-item">
			<input type="checkbox" name="" value="1">
			<div class='expiration'>30/12/2015</div>
			<div class='title'>Fare qualcosa</div>
		</div>
    <div class="form-group todo-item">
      <input type="checkbox" name="" value="1">
      <div class='expiration'>31/12/2015</div>
      <div class='title'>Fare qualcos'altro</div>
    </div>

	</div>
	<button type="submit" name='update' class="btn btn-primary">Aggiorna</button>
</form>

<h2>Nuovo</h2>

<form method='post' class='new-item-form  form-inline'>
	<div class="form-group">
		<label for="fname">Scadenza</label>
		<input type="text" class="form-control" id="exp" name='exp' placeholder="31/12/2015">
	</div>
	
	<div class="form-group">
		<label for="fname">Titolo</label>
		<input type="text" class="form-control" id="title" name='title' placeholder="Titolo">
	</div>
	
	<button type="submit" name='add' class="btn btn-primary">Crea nuovo punto</button>
</form>
</div>