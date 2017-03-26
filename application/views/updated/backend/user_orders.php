<?=link_tag ('assets/last_design/_user_orders.css');?>

<div id="wb_Form1" style="position:absolute;left:243px;top:66px;width:875px;height:685px;z-index:6;">
	<div class="">

		<div id="wb_Text4" style="position:absolute;left:154px;top:45px;width:534px;height:32px;text-align:center;z-index:1;">
			<span style="color:#696969;font-family:Arial;font-size:13px;">
                Welcome to your dash board, you can view your orders and services requested.
                <br>
                Should you wish to cancel an order, please give us a 6 hours prior notification.
            </span>
		</div>
		<div id="wb_Line1" style="position:absolute;left:53px;top:142px;width:771px;height:2px;z-index:2;">
			<img src="<?=base_url('assets/last_design/images/');?>/img0037.png" id="Line1" alt="">
		</div>
		<div id="wb_Text3" style="position:absolute;left:57px;top:121px;width:76px;height:16px;z-index:3;text-align:left;">
			<span style="color:#000000;font-family:Arial;font-size:13px;"> Description</span>
		</div>
		<div id="wb_Text8" style="position:absolute;left:590px;top:121px;width:38px;height:16px;z-index:4;text-align:left;">
			<span style="color:#000000;font-family:Arial;font-size:13px;"> Time</span>
		</div>
		<div id="wb_Text9" style="position:absolute;left:743px;top:121px;width:56px;height:16px;z-index:5;text-align:left;">
			<span style="color:#000000;font-family:Arial;font-size:13px;"> Status</span>
		</div>

		<style media="screen">
			div.mydiv
			{
				position: relative;
				top: 170px!important;
				width:90%;
				left: 50px!important;
			}
			div.mydiv table
			{
				width: 100%;
				border:1px solid #dedede;
			}
		</style>
		<div class="mydiv">
			<table>
				<tr>
					<td width="69%">Description</td>
					<td width="20%">Time</td>
					<td>Status</td>
				</tr>
			</table>
		</div>

	</div>
</div>
