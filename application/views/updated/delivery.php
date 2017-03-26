<?=link_tag ('assets/last_design/_delivery.css');?>

<div ng-controller="deliveryController" ng-init="getPrice('<?=base_url();?>');">

	<div id="Layer2" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:998px;float:left;clear:left;display:block;z-index:68;">
		<div id="Layer2_Container" style="width:1237px;height:998px;position:relative;margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;text-align:left;">
			<div id="wb_Image3" style="position:absolute;left:292px;top:41px;width:199px;height:263px;z-index:29;">
				<img src="<?=base_url('assets/last_design/images/');?>task_wiser_welcome_note.png" id="Image3" alt="">
			</div>
			<div id="wb_Text1" style="position:absolute;left:333px;top:316px;width:104px;height:29px;z-index:30;text-align:left;">
				<span style="color:#696969;font-family:Arial;font-size:24px;">
					<strong> Delivery</strong>
				</span>
			</div>
			<div id="wb_Image2" style="position:absolute;left:182px;top:352px;width:372px;height:237px;z-index:31;">
				<img src="<?=base_url('assets/last_design/images/');?>Berlingo-Van-e1376652488890.png" id="Image2" alt="">
			</div>
			<div id="wb_Form1" style="position:absolute;left:533px;top:41px;width:345px;height:600px;z-index:32;">
				<form name="form" method="post" novalidate="">

					<div ng-hide="quote_gotten">

						<label for="RadioButton1" id="Label1" style="position:absolute;left:15px;top:87px;width:175px;height:18px;line-height:18px;z-index:4;"> Package Delivery</label>
						<input type="radio" ng-model="order.type" name="type" value="package delivery" style="position:absolute;left:158px;top:90px;z-index:5;">

						<label for="RadioButton2" id="Label2" style="position:absolute;left:15px;top:111px;width:175px;height:18px;line-height:18px;z-index:6;"> Food Delivery</label>
						<input type="radio" ng-model="order.type" name="type" value="food delivery" style="position:absolute;left:158px;top:114px;z-index:7;" >

						<input type="text" id="Editbox1" style="position:absolute;left:15px;top:141px;width:312px;height:25px;line-height:18px;z-index:8;" name="name" required ng-model="order.name" placeholder="enter full name">
						<input type="text" id="Editbox2" style="position:absolute;left:15px;top:174px;width:312px;height:25px;line-height:18px;z-index:9;" name="email" required ng-model="order.email" placeholder="enter email address">
						<input type="text" id="Editbox3" style="position:absolute;left:15px;top:207px;width:312px;height:25px;line-height:18px;z-index:10;" name="mobile" required ng-model="order.mobile" placeholder="enter mobile number">

						<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:15px;top:320px;width:310px;height:90px;z-index:16;" rows="4" cols="47" placeholder="Address"
							ng-model="order.address" required>
						</textarea>
						<textarea name="TextArea2" id="TextArea2" style="position:absolute;left:15px;top:420px;width:310px;height:90px;z-index:14;" rows="4" cols="47" ng-model="order.details"
							placeholder="Please describe the job in details" required>
						</textarea>

						<div id="wb_Text3" style="position:absolute;left:22px;top:30px;width:313px;height:16px;z-index:15;text-align:left;">
							<span style="color:#696969;font-family:Arial;font-size:13px;">Please select the type of laundry service you want</span>
						</div>

						<select name="month" size="1" id="Combobox1" style="position:absolute;left:15px;top:240px;width:140px;height:35px;z-index:17;"  ng-model="order.month" required>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
						<select name="hour" ng-model="order.hour" size="1" id="Combobox4" style="position:absolute;left:15px;top:280px;width:140px;height:35px;z-index:18;">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>
						<select name="day" ng-model="order.day" size="1" id="Combobox2" style="position:absolute;left:157px;top:240px;width:79px;height:35px;z-index:19;">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>

							<option value="11">11</option>
							<option value="12">12</option>
							<option value="13">13</option>
							<option value="14">14</option>
							<option value="15">15</option>
							<option value="16">16</option>
							<option value="17">17</option>
							<option value="18">18</option>
							<option value="19">19</option>
							<option value="20">20</option>

							<option value="21">21</option>
							<option value="22">22</option>
							<option value="23">23</option>
							<option value="24">24</option>
							<option value="25">25</option>
							<option value="26">26</option>
							<option value="27">27</option>
							<option value="28">28</option>
							<option value="29">29</option>
							<option value="30">30</option>
							<option value="31">31</option>
						</select>

						<select name="minute" ng-model="order.minute" size="1" id="Combobox5" style="position:absolute;left:157px;top:280px;width:79px;height:35px;z-index:20;" required>
							<option value="00" ng-selected="true">00</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
						</select>
						<select name="year" ng-model="order.year" size="1" id="Combobox3" style="position:absolute;left:240px;top:240px;width:85px;height:35px;z-index:21;" required>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select>

						<select name="period" ng-model="order.period" size="1" id="Combobox6" style="position:absolute;left:241px;top:280px;width:85px;height:35px;z-index:22;" required>
							<option ng-selected="true">am</option>
							<option value="">pm</option>
						</select>

					</div>

					<div ng-if="form.$valid" style="visibility: hidden;" ng-style="{visibility: (form.$valid) ? 'visible':'hidden'}">

						<button id="Button1" name="send" style="position:absolute;left:15px;top:520px;width:310px;height:47px;z-index:14;"
						ng-hide="quote_gotten" ng-click="get_quote();">Prepare Quote {{form.$valid}}</button>

						<div ng-show="quote_gotten" style="padding: 20px 20px;">
							<table width="100%">
								<tr height="40px">
									<th>Option</th>
									<td>{{ order.type }}</td>
								</tr>
								<tr height="40px">
									<th>Fullname</th>
									<td>{{ order.name }}</td>
								</tr>
								<tr height="40px">
									<th>Email Address</th>
									<td>{{ order.email }}</td>
								</tr>
								<tr height="40px">
									<th>Mobile Number</th>
									<td>{{ order.mobile }}</td>
								</tr>
							</table>

							<button ng-show="quote_gotten" id="Button1" name="pay" style="position:absolute;left:15px;top:520px;width:310px;height:47px;z-index:14;"
							ng-click="make_payment();">PAY NOW</button>

							<script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
