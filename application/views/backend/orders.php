<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<h3>Orders</h3>
				<table class="table table-stripped">
					<thead>
						<th width="">category</th>
						<th width="15%">time</th>
						<th width="15%">status</th>
						<th width="5%" class="text-center">
							<i class="fa fa-cogs fa-spin"></i>
						</th>
					</thead>
					<?php
						foreach($orders as $order) {
					?>
						<tr>
							<td>
								<a href="<?=base_url('backend/order/'.$order->_id);?>" >
									<?=$order->category->parent->_name;?>
									<?=isset($order->category->child) ? "[{$order->category->child->_name}]": "";?>
								</a> 
							</td>
							<td><?=date('dS M, Y h:i', strtotime($order->_ts));?></td>
							
							<td><?=$order->status->_name;?></td>
							<td class="text-center">
								<a href='<?=base_url("backend/drop_request/{$order->_id}");?>' class="text-danger">
									<i class="fa fa-trash-o text-danger"></i>
								</a>
							</td>
						</tr>
					<?php
						}
					?>
				</table>
			</div>
		</div>
	</div>
</main>