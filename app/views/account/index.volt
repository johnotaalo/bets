<div class = "col-md-7">
	<div class = "panel panel-default">
		<div class = "panel-heading">
			<h3 class = "panel-title">Transaction History</h3>
		</div>
		<div class="panel-body">
			<table class = "table table-bordered">
				<thead>
					<th>#</th>
					<th>Date</th>
					<th>Type</th>
					<th>Amount</th>
				</thead>
				<tbody>
					{{ transactions }}
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class = "col-md-5">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Add a Transaction</h3>
		</div>
		<div class = "panel-body">
			{{ form('account/addTransaction', "method" : "post") }}
				<div class="form-group">
					<label for = "datetime">Time</label>
					{{ text_field("datetime", "class" : "form-control datetimepicker") }}
				</div>
				<div class="form-group">
					<label for = "amount">Amount</label>
					{{ text_field("amount", "class" : "form-control") }}
				</div>
			{{ end_form() }}
		</div>
	</div>
</div>