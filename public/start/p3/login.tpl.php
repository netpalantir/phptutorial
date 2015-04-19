<div class="container">
	<h1>Login</h1>

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
		<div class="form-group">
			<label for="username">Username</label>
			<input type="text" class="form-control" id="username" name='username' placeholder="">
		</div>

		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" class="form-control" id="password" name="password" placeholder="Password">
		</div>

		<button type="submit" class="btn btn-primary">Invia</button>
	</form>
</div>
