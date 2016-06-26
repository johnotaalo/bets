<a href = "<?= $this->url->get('bets/addbet') ?>" class = 'btn btn-success'>Add a Bet</a>
<div style="margin-top: 15px;"></div>
<div class = "row">
	<div class = "col-md-12">
		<div class="well">
			<table class = "table table-bordered table-hover datatable">
				<thead>
					<th>No.</th>
					<th>Date</th>
					<th>Amount</th>
					<th>Expected</th>
					<th>Status</th>
					<th>Action</th>
				</thead>
				<tbody>
					<?= $bettable ?>
				</tbody>
			</table>
		</div>
	</div>
</div>