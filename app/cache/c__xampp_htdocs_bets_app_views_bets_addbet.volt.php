<div class = "page-header">
	<h3>Add a Bet</h3>
</div>
<?= $this->tag->form(['bets/addbet', 'method' => 'post']) ?>
<div class = "row">
	<div class = "col-md-12">
		<a href = "#" id = "add_row" class = 'pull-left'>Add Row</a>
		<button class = "pull-right btn btn-success">Add this bet</a>
		<?= $this->tag->hiddenField([$this->security->getTokenKey(), 'value' => $this->security->getToken()]) ?>
	</div>
</div>

<div class = "form-group">
	<label for="amount">Amount</label>
	<?= $this->tag->textField(['amount']) ?>
</div>
<table class = "table table-bordered">
	<thead>
		<th>Home Team</th>
		<th>Away Team</th>
		<th>Pick</th>
		<th>Odds</th>
	</thead>
	<tbody id = "bet_slip_details">
		<tr>
			<td><input type="text" class = "form-control" name = "home_team[]" required></td>
			<td><input type="text" class = "form-control" name = "away_team[]" required></td>
			<td><input type="text" class = "form-control" name = "pick[]" required></td>
			<td><input type="text" class = "form-control" name = "odds[]" required></td>
		</tr>
	</tbody>
</table>
<?= $this->tag->endForm() ?>
<!-- -->
