<div class = "col-md-5">
	<div class = "panel panel-default">
		<div class = "panel-heading">
			<h3 class = "panel-title">Login Page</h3>
		</div>
		<div class = "panel-body">
			{% if error is defined %}
				<div class = "alert alert-danger" role = "alert">
					<p>{{ error }}</p>
				</div>
			{% endif %}
			{{ form('auth/signin', "method" : "post") }}
				<div class = "form-group">
					<label for = "username">Username</label>
					{{ text_field("username", "class" : "form-control") }}
				</div>
				<div class = "form-group">
					<label for = "password">Password</label>
					{{ password_field("password", "class" : "form-control") }}
				</div>

				{{ hidden_field(tokenKey, "value" : tokenVal) }}

				{{ submit_button("Login", "class" : "btn btn-success") }}
			{{ end_form() }}
		</div>
	</div>
</div>