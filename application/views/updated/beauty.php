<?=link_tag ('assets/last_design/_beauty.css');?>

<div ng-controller="beautyController" ng-init="getPrice();">
	<div id="Layer2" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:998px;float:left;clear:left;display:block;z-index:60;">
		<div id="Layer2_Container" style="width:1237px;height:998px;position:relative;margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;text-align:left;">
			<div id="wb_Image3" style="position:absolute;left:283px;top:42px;width:199px;height:263px;z-index:25;">
				<img src="<?=base_url('assets/last_design/images/');?>task_wiser_welcome_note.png" id="Image3" alt="">
			</div>
			<div id="wb_Text2" style="position:absolute;left:330px;top:305px;width:104px;height:29px;z-index:26;text-align:left;">
				<span style="color:#696969;font-family:Arial;font-size:24px;">
					<strong> Beauty</strong>
				</span>
			</div>
			<div id="wb_Form1" style="position:absolute;left:526px;top:62px;width:343px;height:707px;z-index:27;">
				<form name="form" method="post" enctype="text/plain" novalidate>
					<div ng-hide="quote_gotten">

						<label for="RadioButton1" id="Label1" style="position:absolute;left:33px;top:87px;width:175px;height:18px;line-height:18px;z-index:4;">  Makeup artist</label>
						<input type="radio" ng-model="order.type" name="type" value="makeup artist" style="position:absolute;left:175px;top:90px;z-index:5;">
						
						<label for="RadioButton2" id="Label2" style="position:absolute;left:33px;top:109px;width:175px;height:18px;line-height:18px;z-index:6;"> Hair dresser</label>
						<input type="radio" ng-model="order.type" name="type" value="hair dresser" style="position:absolute;left:175px;top:112px;z-index:7;">
						
						<label for="RadioButton3" id="Label3" style="position:absolute;left:33px;top:132px;width:175px;height:18px;line-height:18px;z-index:13;"> Barber</label>
						<input type="radio" ng-model="order.type" name="type" value="barber" style="position:absolute;left:175px;top:136px;z-index:14;">
						
						<label for="RadioButton4" id="Label4" style="position:absolute;left:33px;top:156px;width:175px;height:18px;line-height:18px;z-index:15;"> Manicure</label>
						<input type="radio" ng-model="order.type" name="type" value="manicure" style="position:absolute;left:175px;top:159px;z-index:16;">

						<input type="text" id="Editbox1" style="position:absolute;left:15px;top:218px;width:302px;height:25px;line-height:18px;z-index:8;" name="Editbox1" ng-model="order.name" placeholder="enter full name">
						<input type="text" id="Editbox2" style="position:absolute;left:15px;top:251px;width:302px;height:25px;line-height:18px;z-index:9;" name="Editbox2" ng-model="order.email" placeholder="enter email address">
						<input type="text" id="Editbox3" style="position:absolute;left:15px;top:284px;width:302px;height:25px;line-height:18px;z-index:10;" name="Editbox3" ng-model="order.mobile" placeholder="enter mobile number">
						
						<textarea name="TextArea2" id="TextArea2" ng-model="order.details" style="position:absolute;left:15px;top:504px;width:299px;height:90px;z-index:11;" rows="4" cols="47" placeholder="Please describe the job in details">
						</textarea>
						
						<div id="wb_Text3" style="position:absolute;left:19px;top:43px;width:297px;height:16px;z-index:12;text-align:left;">
							<span style="color:#696969;font-family:Arial;font-size:13px;">Please select the type of Beauty service you want</span>
						</div>
						
						<textarea name="TextArea1" id="TextArea1" ng-model="order.address" style="position:absolute;left:15px;top:396px;width:300px;height:90px;z-index:17;" rows="4" cols="47" placeholder="Address">
						</textarea>
						
						<select name="month" ng-model="order.month" size="1" id="Combobox1" style="position:absolute;left:10px;top:315px;width:140px;height:35px;z-index:19;">
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

						<select name="hour" ng-model="order.hour" size="1" id="Combobox4" style="position:absolute;left:11px;top:354px;width:140px;height:35px;z-index:20;">
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

						<select name="day" ng-model="order.day" size="1" id="Combobox2" style="position:absolute;left:154px;top:315px;width:79px;height:35px;z-index:21;">
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

						<select name="minute" ng-model="order.minute" size="1" id="Combobox5" style="position:absolute;left:154px;top:354px;width:79px;height:35px;z-index:22;">
							<option value="00" ng-selected="true">00</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
						</select>
						<select name="period" size="1" id="Combobox6" style="position:absolute;left:237px;top:316px;width:88px;height:35px;z-index:23;" ng-model="order.period">
							<option value="am">am</option>
							<option value="pm">pm</option>
						</select>
						<select name="year" size="1" id="Combobox3" style="position:absolute;left:237px;top:354px;width:88px;height:35px;z-index:24;" ng-model="order.year">
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select>
					</div>

					<div ng-if="form.$valid" style="visibility: hidden;" ng-style="{visibility: (form.$valid) ? 'visible':'hidden'}">

						<button id="Button1" name="send" style="position:absolute;left:15px;top:625px;width:310px;height:47px;z-index:18;" 
						ng-hide="quote_gotten" ng-click="get_quote();">Prepare Quote</button>

						<button ng-show="quote_gotten" id="Button1" name="pay" style="position:absolute;left:15px;top:625px;width:310px;height:47px;z-index:18;" 
						ng-click="make_payment();">Pay # {{ total_price }}</button>

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

						</div>
					</div>
				</form>
			</div>
			<div id="wb_Image2" style="position:absolute;left:297px;top:351px;width:213px;height:213px;z-index:28;">
				<img src="<?=base_url('assets/last_design/images/');?>hair_dryer%20copy.png" id="Image2" alt="">
			</div>
		</div>
	</div>
</div>