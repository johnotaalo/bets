<div class = "col-md-5">
	<div class = "panel panel-default">
		<div class = "panel-heading">
			<h3 class = "panel-title">Login Page</h3>
		</div>
		<div class = "panel-body">
			{% if error is defined %}
				<div class = "alert alert-danger">
					{{ error }}
				</div>
			{% endif %}
			{{ form('auth/signup', "method" : "post") }}
				<div class = "form-group">
					<label for = "username">Username</label>
					{{ text_field("username", "class" : "form-control") }}
				</div>
				<div class = "form-group">
					<label for = "password">Password</label>
					{{ password_field("password", "class" : "form-control") }}
				</div>

				{{ hidden_field(token, "value" : tokenVal) }}

				{{ submit_button("Create Account", "class" : "btn btn-primary") }}

			{{ end_form() }}
		</div>
	</div>
</div>