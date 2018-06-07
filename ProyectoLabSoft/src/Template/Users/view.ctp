<div class="well">
<h2><?= $user->user ?></h2>
	<br>
	<dl>
		<dt>Nombre de Usuario</dt>
		<dd>
			<?=	$user->user ?>
			&nbsp;
		</dd>
		<br>

		<dt>Contraseña</dt>
		<dd>
			<?=	$user->password ?>
			&nbsp;
		</dd>
		<br>

		<dt>Tipo de Usuario</dt>
		<dd>
			<?=	$user->user_type ?>
			&nbsp;
		</dd>
		<br>

		<dt>Habilitado</dt>
		<dd>
			<?=	$user->active ? 'SI' : 'NO' ?>
			&nbsp;
		</dd>
	</dl>
</div>