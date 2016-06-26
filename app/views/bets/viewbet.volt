<div class = "page-header">
	<h3>Viewing BetID: {{ betid }} 
		{% if status == "Running" %}
		<span class="label label-warning">Running</span>
		{% elseif status == "Won" %}
		<span class="label label-success">Won</span>
		{% elseif status == "Lost" %}
		<span class="label label-danger">Lost</span>
		{% endif %}
	</h3>
</div>

{{ form('bets/editBet/' ~ betid, "method" : "post") }}
<button class="btn btn-success pull-right">Update</button>
<div class = "clearfix" style="margin-top: 5px;"></div>
<div class = "well">
	<table class = "table table-bordered">
		<thead>
			<th>No.</th>
			<th>Home Team</th>
			<th>Away Team</th>
			<th>Pick</th>
			<th>Odds</th>
			<th style = "width: 15%;">Result</th>
			<th style = "width: 12%;">Status</th>
		</thead>
		<tbody>
			{{ bettable }}
		</tbody>
	</table>
</div>
{{ end_form() }}