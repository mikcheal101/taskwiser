<main>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div>
					<div class="col-sm-4 no-padding">
						<a href="<?=base_url('backend/');?>" class="btn btn-sm btn-default waves-effect waves-ripples">
							back to orders page
						</a>
					</div>
					<div class="col-sm-8 text-right no-padding">
						<h5 class="text-info"><?=NAIRA." ".number_format($order->price, 2);?></h5>
					</div>
				</div>
				<br/><br/>
				<div class="">
					<table class="table">
						<tr>
							<th>
								Name:
							</th>
							<td>
								<?=$order->category->parent->_name;?>
								<?=isset($order->category->child) ? "[{$order->category->child->_name}]": "";?>
							</td>
						</tr>
						<tr>
							<th>
								Status:
							</th>
							<td>
								<?=$order->status->_name;?>
							</td>
						</tr>
						<tr>
							<th>
								Details:
							</th>
							<td>
								<?php 
									if(isset($order->rooms) && (int)$order->rooms != 0)
										echo ("<li>Rooms: {$order->rooms}</li>");
									if(isset($order->liters) && (int)$order->liters != 0)
										echo ("<li>Liters: {$order->liters}</li>");
									if(isset($order->boxes) && (int)$order->boxes != 0)
										echo ("<li>Boxes: {$order->boxes}</li>");
									if(isset($order->shirts) && (int)$order->shirts != 0)
										echo ("<li>Shirts: {$order->shirts}</li>");
									if(isset($order->troussers) && (int)$order->troussers != 0)
										echo ("<li>Troussers: {$order->troussers}</li>");
									if(isset($order->suits) && (int)$order->suits != 0)
										echo ("<li>Suits: {$order->suits}</li>");
									if(isset($order->gowns) && (int)$order->gowns != 0)
										echo ("<li>Gowns: {$order->gowns}</li>");
									if(isset($order->others) && (int)$order->others != 0)
										echo ("<li>Others: {$order->others}</li>");
									if(isset($order->extra) && strlen($order->extra) != 0)
										echo ("<li>Extra: {$order->extra}</li>");
									if(isset($order->address) && strlen($order->address) != 0)
										echo ("<li>Address: {$order->address}</li>");
									if(isset($order->delivery_address) && strlen($order->delivery_address) != 0)
										echo ("<li>Delivery Address: {$order->delivery_address}</li>");
								?>
							</td>
						</tr>
						<tfoot>
							<tr>
								<td>
								</td>
								<td class="text-right">
									<a href='<?=base_url("backend/drop_request/{$order->_id}");?>'
										class="btn btn-sm btn-danger waves-effect waves-ripples">
										delete
									</a>
									<?php if((int)$order->status->_id === STATUS_PENDING_PAYMENT) { ?>
									<a href='<?=base_url("payment/enter_details/{$order->_transaction_code}");?>'
										class="btn btn-sm btn-success waves-effect waves-ripples">
										make payment
									</a>
									<?php } ?>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</main>