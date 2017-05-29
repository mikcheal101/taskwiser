<?=link_tag ('assets/last_design/_handyman.css');?>

<div ng-controller="handymanController" ng-init="getPrice('<?=base_url();?>');">
	<div id="Layer2">
		<div id="Layer2_Container" >
			<div id="wb_Image3">
				<img src="<?=base_url('assets/last_design/images/');?>task_wiser_welcome_note.png" id="Image3" alt="">
			</div>
			<div id="wb_Text1" >
				<span style="color:#696969;font-family:Arial;font-size:24px;">
					<strong> Handy Man</strong>
				</span>
			</div>

			<div id="wb_Form1">
				<form name="form" method="post" id="Form1" novalidate>
					<div ng-hide="quote_gotten">
						<label for="Label1" id="Label1" > Carpenter</label>
						<input type="radio" id="RadioButton1" ng-model="order.type" name="type" value="carpenter">

						<label for="Label2" id="Label2"> Tailor</label>
						<input type="radio" id="RadioButton2" ng-model="order.type" name="type" value="tailor">

						<label for="Label2" id="Label4" style="width:140px!important;"> Generator repairs</label>
						<input type="radio" id="RadioButton3" ng-model="order.type" name="type" value="gen_repairs">

						<label for="Label1" id="Label3" style="width:140px!important;"> Air Conditioner repairs</label>
						<input type="radio" id="RadioButton4" name="type" ng-model="order.type" value="air_conditioner_repairs">

						<label for="Label2" id="Label6"> Painter</label>
						<input type="radio" id="RadioButton5" name="type" ng-model="order.type" value="painter">

						<label for="Label1" id="Label7"> Electrician</label>
						<input type="radio" id="RadioButton6" name="type" ng-model="order.type" value="electrician">

						<label for="Label2" id="Label8"> Plumber</label>
						<input type="radio" id="RadioButton7" name="type" ng-model="order.type" value="plumber">

						<label for="Label1" id="Label5" > Oven Repairer</label>
						<input type="radio" id="RadioButton8" name="type" ng-model="order.type" value="oven_repairer">


						<input type="text" id="Editbox2" ng-model="order.email" placeholder="enter email address" required>
						<input type="text" id="Editbox3" ng-model="order.mobile" placeholder="enter mobile number" required>
						<input type="text" id="Editbox1" ng-model="order.name" placeholder="enter full name" required>

						<textarea name="TextArea1" id="TextArea1" ng-model="order.address" rows="4" cols="49" placeholder="Address" required>
						</textarea>

						<textarea name="TextArea2" id="TextArea2"  ng-model="order.details" rows="4" cols="49"
							placeholder="Please describe the job in details" required>
						</textarea>

						<div id="wb_Text3" >
							<span style="color:#696969;font-family:Arial;font-size:13px;">Please select the type of Handy Man service you want</span>
						</div>

						<select name="month" size="1" id="Combobox1" required ng-model="order.month" required>
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

						<select name="hour" size="1" id="Combobox4" required ng-model="order.hour" required>
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

						<select name="day" size="1" id="Combobox2" required ng-model="order.day" required>
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

						<select name="minute" size="1" id="Combobox5" required ng-model="order.minute" required>
							<option value="00" ng-selected="true">00</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
						</select>

						<select name="year" size="1" id="Combobox3" required ng-model="order.year" required>
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select>

						<select name="period" size="1" id="Combobox6" required  ng-model="order.period" required>
							<option ng-selected="true">am</option>
							<option value="pm">pm</option>
						</select>
					</div>

					<div ng-if="form.$valid" style="visibility:hidden" ng-style="{visibility: (form.$valid) ? 'visible':'hidden'}">

						<button id="Button1" name="send"
							ng-hide="quote_gotten" ng-click="get_quote();">Prepare Quote</button>

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

							<button id="Button1" name="pay"
							ng-click="make_payment();">PAY NOW</button>

							<script type="text/javascript" src="http://flw-pms-dev.eu-west-1.elasticbeanstalk.com/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
							<!--
							<script type="text/javascript" src="https://api.ravepay.co/flwv3-pug/getpaidx/api/flwpbf-inline.js"></script>
							-->
						</div>
					</div>

				</form>
			</div>
			<div id="wb_Image2">
				<img src="<?=base_url('assets/last_design/images/');?>toolbox_copy.png" id="Image2" alt="">
			</div>
		</div>
	</div>
</div>
