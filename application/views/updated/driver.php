<?=link_tag ('assets/last_design/_driver.css');?>

	<div ng-controller="driverController" ng-init="getPrice('<?=base_url();?>');">
		<div id="Layer2_Container">
			<div id="wb_Image3" >
				<img src="<?=base_url('assets/last_design/images/');?>task_wiser_welcome_note.png" id="Image3" alt="">
			</div>

			<div id="wb_Text1">
				<span style="color:#696969;font-family:Arial;font-size:24px;">
					<strong> Driver</strong>
				</span>
			</div>
			<div id="wb_Image4" >
				<img src="<?=base_url('assets/last_design/images/');?>ford_PNG12207%20copy.png" id="Image4" alt="">
			</div>

			<div id="wb_Form1" >
				<form name="form" method="post" novalidate id="Form1">
					<div ng-hide="quote_gotten">

						<div id="wb_Text3" >
							<span style="color:#696969;font-family:Arial;font-size:13px;">Please select the type of driver service you want</span>
						</div>

						<label for="RadioButton1" id="Label1" > Small car (e.g Salon)</label>
						<input type="radio" id="RadioButton1"  ng-model="order.type" name="type" value="small car" >

						<label for="RadioButton2" id="Label2"> Big Car ( e.g bus)</label>
						<input type="radio" id="RadioButton2"  ng-model="order.type" name="type" value="big car" >

						<input type="text" id="Editbox1" required name="Editbox1" ng-model="order.name" placeholder="enter full name">

						<input type="text" id="Editbox2" required name="Editbox2" ng-model="order.email" placeholder="enter email address">

						<input type="text" id="Editbox3" required name="Editbox3" ng-model="order.mobile" placeholder="enter mobile number">

						<textarea name="TextArea2" id="TextArea2" required rows="4" cols="49" ng-model="order.details" placeholder="Please describe the job in details"></textarea>

						<textarea name="TextArea1" id="TextArea1" required rows="4" cols="49" ng-model="order.address" placeholder="Address"></textarea>

						<select name="month" ng-model="order.month" size="1" id="Combobox1">
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

						<select name="hour" ng-model="order.hour" size="1" id="Combobox4">
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
							<option value="0">12</option>
						</select>

						<select name="day" ng-model="order.day" size="1" id="Combobox2">
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

						<select name="minute" ng-model="order.minute" size="1" id="Combobox5" >
							<option value="00" ng-selected="true">00</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
						</select>

						<select name="year" ng-model="order.year" size="1" id="Combobox3">
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select>

						<select name="period" ng-model="order.period" size="1" id="Combobox6">
							<option value="am">am</option>
							<option value="pm">pm</option>
						</select>

						<select name="duration" ng-model="order.duration" size="1" id="Combobox7">
							<option value="one day">One Day</option>
							<option value="one week">One Week</option>
							<option value="one month">One Month</option>
							<option value="less than a day">Less than a day</option>
						</select>

						<label for="" id="Label6"> Select Duration</label>
					</div>

					<div ng-if="form.$valid" style="visibility: hidden;" ng-style="{visibility: (form.$valid) ? 'visible':'hidden'}">

						<button id="Button1" name="send" ng-hide="quote_gotten" ng-click="get_quote();">Prepare Quote</button>

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
								<tr height="40px">
									<th>Duration</th>
									<td>{{ order.duration }}</td>
								</tr>
							</table>

							<button ng-show="quote_gotten" id="Button1" name="pay" ng-click="make_payment();">PAY NOW</button>

							<script type="text/javascript" src="http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>

							<!--
							<script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script> -->
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

</div>
