<?=link_tag ('assets/last_design/_events.css');?>

<div ng-controller="eventsController" ng-init="getPrice();">
	<div id="Layer2" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:998px;float:left;clear:left;display:block;z-index:60;">
		<div id="Layer2_Container" style="width:1237px;height:998px;position:relative;margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;text-align:left;">
			<div id="wb_Image3" style="position:absolute;left:292px;top:41px;width:199px;height:263px;z-index:25;">
				<img src="<?=base_url('assets/last_design/images/');?>task_wiser_welcome_note.png" id="Image3" alt="">
			</div>
			<div id="wb_Text1" style="position:absolute;left:348px;top:334px;width:104px;height:29px;z-index:26;text-align:left;">
				<span style="color:#696969;font-family:Arial;font-size:24px;">
					<strong> Events</strong>
				</span>
			</div>
			<div id="wb_Form1" style="position:absolute;left:521px;top:63px;width:341px;height:732px;z-index:27;">
				<form name="form" method="post" novalidate="">

					<div ng-hide="quote_gotten">
						<label for="RadioButton1" style="position:absolute;left:14px;top:61px;width:175px;height:18px;line-height:18px;z-index:4;font-weight: 500;"> Photographer</label>
						<input type="radio" ng-model="order.type" name="type" value="photographer" style="position:absolute;left:157px;top:65px;z-index:5;">

						<label for="RadioButton2" id="Label2" style="position:absolute;left:14px;top:85px;width:175px;height:18px;line-height:18px;z-index:6;"> Disc Jockey</label>
						<input type="radio" ng-model="order.type" name="type" value="disc jockey" style="position:absolute;left:157px;top:88px;z-index:7;" >

						<label for="RadioButton2" id="Label2" style="position:absolute;left:15px;top:108px;width:75px;height:18px;line-height:18px;z-index:16;"> Live Band</label>
						<input type="radio" ng-model="order.type" name="type" value="live band" style="position:absolute;left:157px;top:110px;z-index:17;" >


						<input type="text" id="Editbox1" style="position:absolute;left:16px;top:146px;width:298px;height:25px;line-height:18px;z-index:8;" name="name" required ng-model="order.name" placeholder="enter full name">
						<input type="text" id="Editbox2" style="position:absolute;left:16px;top:179px;width:298px;height:25px;line-height:18px;z-index:9;" name="email" required ng-model="order.email" placeholder="enter email address">
						<input type="text" id="Editbox3" style="position:absolute;left:16px;top:212px;width:298px;height:25px;line-height:18px;z-index:10;" name="mobile" required ng-model="order.mobile" placeholder="enter mobile number">

						

						<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:16px;top:434px;width:298px;height:90px;z-index:11;" rows="4" cols="47" placeholder="Address" ng-model="order.address" required>
						</textarea>
						<textarea name="TextArea2" id="TextArea2" style="position:absolute;left:16px;top:543px;width:298px;height:90px;z-index:12;" rows="4" cols="47" ng-model="order.details" placeholder="Please describe the job in details">
						</textarea>

						<div id="wb_Text3" style="position:absolute;left:21px;top:26px;width:294px;height:16px;z-index:14;text-align:left;">
							<span style="color:#696969;font-family:Arial;font-size:13px;">Please select the type of event service you want</span>
						</div>

						<select name="month" size="1" id="Combobox1" style="position:absolute;left:15px;top:351px;width:140px;height:35px;z-index:20;" ng-model="order.month" required>
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
						<select name="hour" ng-model="order.hour" size="1" id="Combobox4" style="position:absolute;left:15px;top:390px;width:140px;height:35px;z-index:19;">
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
						<select name="day" ng-model="order.day" size="1" id="Combobox2" style="position:absolute;left:156px;top:351px;width:79px;height:35px;z-index:17;">
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

						<select name="minute" ng-model="order.minute" size="1" id="Combobox5" style="position:absolute;left:156px;top:390px;width:79px;height:35px;z-index:18;">
							<option value="00" ng-selected="true">00</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
						</select>
						<select name="year" ng-model="order.year" size="1" id="Combobox3" style="position:absolute;left:239px;top:390px;width:79px;height:35px;z-index:21;">
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select>

						<select name="period" ng-model="order.period" size="1" id="Combobox6" style="position:absolute;left:239px;top:352px;width:79px;height:35px;z-index:22;">
							<option ng-selected="true">am</option>
							<option value="">pm</option>
						</select>

						<label for="Combobox6" id="Label6" style="position:absolute;left:15px;top:285px;width:119px;height:25px;line-height:18px;z-index:23;"> Select Duration</label>
						<select ng-model="order.duration" name=" date and year" size="1" id="Combobox7" style="position:absolute;left:15px;top:310px;width:302px;height:35px;z-index:24;">
							<option value="one day">One Day</option>
							<option value="one week">One Week</option>
							<option value="one month">One Month</option>
							<option value="less than a day">Less than a day</option>
						</select>
					</div>

					<div ng-if="form.$valid" style="visibility: hidden;" ng-style="{visibility: (form.$valid) ? 'visible':'hidden'}">

						<button id="Button1" name="send" style="position:absolute;left:16px;top:665px;width:310px;height:47px;z-index:15;" 
						ng-hide="quote_gotten" ng-click="get_quote();">Prepare Quote</button>

						<button ng-show="quote_gotten" id="Button1" name="pay" style="position:absolute;left:16px;top:665px;width:310px;height:47px;z-index:15;" 
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

							<hr>
							<table width="100%">
								<tr height="40px">
									<th>Duration</th>
									<td>{{ order.duration }}</td>
								</tr>
							</table>

						</div>
					</div>
					
					
					
				</form>
			</div>
			<div id="wb_Image2" style="position:absolute;left:288px;top:365px;width:206px;height:206px;z-index:28;">
				<img src="<?=base_url('assets/last_design/images/');?>calendar-icon.png" id="Image2" alt="">
			</div>
		</div>
	</div>
</div>