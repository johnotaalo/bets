<div class = "col-md-5">
	<div class = "panel panel-default">
		<div class = "panel-heading">
			<h3 class = "panel-title">Login Page</h3>
		</div>
		<div class = "panel-body">
			<?php if (isset($error)) { ?>
				<div class = "alert alert-danger">
					<?= $error ?>
				</div>
			<?php } ?>
			<?= $this->tag->form(['auth/signup', 'method' => 'post']) ?>
				<div class = "form-group">
					<label for = "username">Username</label>
					<?= $this->tag->textField(['username', 'class' => 'form-control']) ?>
				</div>
				<div class = "form-group">
					<label for = "password">Password</label>
					<?= $this->tag->passwordField(['password', 'class' => 'form-control']) ?>
				</div>

				<?= $this->tag->hiddenField([$token, 'value' => $tokenVal]) ?>

				<?= $this->tag->submitButton(['Create Account', 'class' => 'btn btn-primary']) ?>

			<?= $this->tag->endForm() ?>
		</div>
	</div>
</div>