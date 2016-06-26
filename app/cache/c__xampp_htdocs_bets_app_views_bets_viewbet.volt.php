<div class = "page-header">
	<h3>Viewing BetID: <?= $betid ?> 
		<?php if ($status == 'Running') { ?>
		<span class="label label-warning">Running</span>
		<?php } elseif ($status == 'Won') { ?>
		<span class="label label-success">Won</span>
		<?php } elseif ($status == 'Lost') { ?>
		<span class="label label-danger">Lost</span>
		<?php } ?>
	</h3>
</div>

<?= $this->tag->form(['bets/editBet/' . $betid, 'method' => 'post']) ?>
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
			<?= $bettable ?>
		</tbody>
	</table>
</div>
<?= $this->tag->endForm() ?>