<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3>Payments</h3>
				<table class="table table-stripped">
					<thead>
						<th width="">Order Id</th>
						<th width="">Transaction Code</th>
						<th width="15%">Amount</th>
						<th width="20%" class="text-right">Time</th>
					</thead>
					<?php
						foreach($payments as $payment) {
					?>
						<tr>
							<td><?=$payment->order->_code;?></td>
							<td><?=$payment->_transaction_code;?></td>
							<td>NGN <?=$payment->_amt;?></td>
							<td class="text-right"><?=date('dS M, Y h:i', strtotime($payment->_ts));?></td>
						</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</div>
</main>