<?=link_tag ('assets/last_design/_laundry.css');?>

<div ng-controller="laundryController" ng-init="getPrice('<?=base_url();?>');">

	<div id="Layer2">
		<div id="Layer2_Container">
			<div id="wb_Text1">
				<span style="color:#696969;font-family:Arial;font-size:24px;">
					<strong> Laundry</strong>
				</span>
			</div>
			<div id="wb_Image2">
				<img src="<?=base_url('assets/last_design/images');?>/washing_machine_PNG15580%20copy.png" id="Image2" alt="">
			</div>
			<div id="wb_Image3">
				<img src="<?=base_url('assets/last_design/images');?>/task%20wiser%20welcome%20note.png" id="Image3" alt="">
			</div>

			<div id="wb_Form1">
				<form name="Form1" method="post" action="" enctype="text/plain" id="Form1" novalidate="novalidate">
					<div ng-hide="quote_gotten">

						<label for="type" id="Label1"> Washer man</label>
						<input type="radio" ng-model="order.type" id="RadioButton1" name="type" value="washer-man" required>

						<label for="type" id="Label2"> Dry cleaner</label>
						<input type="radio" ng-model="order.type" id="RadioButton2" name="type" value="dry-cleaner" required>

						<input type="text" id="Editbox1" name="Editbox1" value="" placeholder="enter full name" ng-model="order.name" required>

						<input type="text" id="Editbox2" name="Editbox2" value="" placeholder="enter email address" ng-model="order.email" required>

						<input type="text" id="Editbox3" name="Editbox3" value="" placeholder="enter mobile number" ng-model="order.mobile" required>

						<label for="Label7" id="Label6"> Shirts</label>
						<input type="text" id="Editbox4" name="Editbox4" value="0" ng-model="order.shirts" required>

						<label for="Label8" id="Label7"> Troussers</label>
						<input type="text" id="Editbox5" name="Editbox5" value="0" ng-model="order.troussers" required>

						<label for="Label9" id="Label8"> Suits</label>
						<input type="text" id="Editbox6" name="Editbox6" value="0" ng-model="order.suits" required>

						<label for="TextArea1" id="Label9"> Gowns</label>
						<input type="text" id="Editbox7" name="Editbox7" value="0" ng-model="order.gowns" required>

						<textarea name="TextArea1" id="TextArea1" rows="4" cols="49"
						placeholder="Address" ng-model="order.address" required></textarea>

						<textarea name="TextArea2" id="TextArea2"
						placeholder="Please describe the job in details" ng-model="order.details" required></textarea>

					</div>
					<div ng-if="form.$valid" style="visibility: hidden;" ng-style="{visibility: (form.$valid) ? 'visible':'hidden'}">

						<button id="Button1" name="send" style="position:absolute;left:18px;top:797px;width:319px;height:47px;z-index:21;"
						ng-hide="quote_gotten" ng-click="get_quote();">Get Quote</button>

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

							<hr>
							<table width="100%">
								<tr ng-if="order.shirts > 0" height="40px">
									<th>Shirts</th>
									<td>{{ order.shirts }}</td>
								</tr>
								<tr ng-if="order.gowns > 0" height="40px">
									<th>Gowns</th>
									<td>{{ order.gowns }}</td>
								</tr>
								<tr ng-if="order.troussers > 0" height="40px">
									<th>Troussers</th>
									<td>{{ order.troussers}}</td>
								</tr>
								<tr ng-if="order.suits > 0" height="40px">
									<th>Suits</th>
									<td>{{ order.suits }}</td>
								</tr>
							</table>

							<style type="text/css">
								button.myBtn
								{
									position:absolute;
									left:18px;
									top:797px;
									width:319px;
									height:47px;
									z-index:21;"
								}
							</style>

							<button id="Button1" class="myBtn" type="button" ng-click="make_payment();">PAY NOW</button>

							<script type="text/javascript" src="http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
							<!--
							<script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
							-->
						</div>
					</div>

					<div ng-hide="quote_gotten">
						<div id="wb_Text3">
							<span style="color:#696969;font-family:Arial;font-size:13px;">Please select the type of laundry service you want</span>
						</div>

						<select name="month" size="1" id="Combobox1" required ng-model="order.month">
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

						<select name="hour" size="1" id="Combobox4" required ng-model="order.hour">
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


						</select>

						<select name="day" size="1" id="Combobox2" required ng-model="order.day">
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

						<select name="minute" size="1" id="Combobox5" required ng-model="order.minute">
							<option value="00" ng-selected="true">00</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
						</select>

						<select name="year" size="1" id="Combobox3" required ng-model="order.year">
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select>

						<select name="period" size="1" id="Combobox6" required ng-model="order.period">
							<option ng-selected="true">am</option>
							<option value="">pm</option>
						</select>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
