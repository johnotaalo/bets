<div class = "col-md-5">
	<div class = "panel panel-default">
		<div class = "panel-heading">
			<h3 class = "panel-title">Login Page</h3>
		</div>
		<div class = "panel-body">
			<?php if (isset($error)) { ?>
				<div class = "alert alert-danger" role = "alert">
					<p><?= $error ?></p>
				</div>
			<?php } ?>
			<?= $this->tag->form(['auth/signin', 'method' => 'post']) ?>
				<div class = "form-group">
					<label for = "username">Username</label>
					<?= $this->tag->textField(['username', 'class' => 'form-control']) ?>
				</div>
				<div class = "form-group">
					<label for = "password">Password</label>
					<?= $this->tag->passwordField(['password', 'class' => 'form-control']) ?>
				</div>

				<?= $this->tag->hiddenField([$tokenKey, 'value' => $tokenVal]) ?>

				<?= $this->tag->submitButton(['Login', 'class' => 'btn btn-success']) ?>
			<?= $this->tag->endForm() ?>
		</div>
	</div>
</div>