<div class="container">
<h1>Benvenuto, <?=q($_SESSION['user']['username'])?></h1>

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
<?php foreach($items as $item) { ?>
		<div class="form-group todo-item">
			<input type="checkbox" name="" value="1">
			<div class='expiration'><?=
        $item['expTimestamp'] != '' ? strftime('%d/%m/%Y', $item['expTimestamp']) : ''
        ?></div>
			<div class='title'><?=q($item['title'])?></div>
		</div>
<? } ?>
	</div>
	<button type="submit" name='update' class="btn btn-primary">Aggiorna</button>
</form>

<h2>Crea nuovo punto</h2>

<form method='post' class='new-item-form  form-inline'>
	<div class="form-group">
		<label for="fname">Scadenza</label>
		<input type="text" class="form-control" id="exp" name='exp' placeholder="31/12/2015" value="<?=htmlspecialchars($form['exp'])?>">
	</div>
	
	<div class="form-group">
		<label for="fname">Titolo</label>
		<input type="text" class="form-control" id="title" name='title' placeholder="Titolo" value="<?=htmlspecialchars($form['title'])?>">
	</div>
	
	<button type="submit" name='add' value='1' class="btn btn-primary">Crea nuovo punto</button>
</form>
</div>