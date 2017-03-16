<?=link_tag ('assets/last_design/_custom_tasks.css');?>

<div ng-controller="customController" ng-init="getPrice();">
	
	<div id="Layer2" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:998px;float:left;clear:left;display:block;z-index:42;">
		<div id="Layer2_Container" style="width:1237px;height:998px;position:relative;margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;text-align:left;">
			<div id="wb_Image3" style="position:absolute;left:276px;top:41px;width:199px;height:263px;z-index:15;">
				<img src="<?=base_url('assets/last_design/images/');?>task_wiser_welcome_note.png" id="Image3" alt="">
			</div>
			<div id="wb_Text1" style="position:absolute;left:301px;top:322px;width:182px;height:29px;z-index:16;text-align:left;">
				<span style="color:#696969;font-family:Arial;font-size:24px;">
					<strong> Custom Task</strong>
				</span>
			</div>
			<div id="wb_Form1" style="position:absolute;left:518px;top:124px;width:350px;height:560px;z-index:17;">
				<form name="form" method="post" novalidate>

					<div ng-hide="quote_gotten">

						<input type="text" id="Editbox1" style="position:absolute;left:15px;top:68px;width:301px;height:18px;line-height:18px;z-index:4;" name="Editbox1" required ng-model="order.name" placeholder="enter full name">
						<input type="text" id="Editbox2" style="position:absolute;left:15px;top:101px;width:301px;height:18px;line-height:18px;z-index:5;" name="Editbox2" required ng-model="order.email" placeholder="enter email address">
						<input type="text" id="Editbox3" style="position:absolute;left:16px;top:135px;width:300px;height:18px;line-height:18px;z-index:6;" name="Editbox3" required ng-model="order.mobile" placeholder="enter mobile number">
						
						<input type="submit" id="Button1" name="" value=" Get Quote" style="position:absolute;left:19px;top:477px;width:311px;height:47px;z-index:7;">
						
						<select name="day" ng-model="order.day" size="1" id="Combobox2" style="position:absolute;left:158px;top:174px;width:79px;height:35px;z-index:8;">
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

						<select name="hour" ng-model="order.hour" size="1" id="Combobox4" style="position:absolute;left:15px;top:213px;width:140px;height:35px;z-index:11;">
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

						<select name="minute" ng-model="order.minute" size="1" id="Combobox5" style="position:absolute;left:158px;top:213px;width:79px;height:35px;z-index:9;">
							<option value="00" ng-selected="true">00</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
						</select>

						<select name="period" ng-model="order.period" size="1" id="Combobox6" style="position:absolute;left:240px;top:213px;width:80px;height:35px;z-index:17;">
							<option value="am">am</option>
							<option value="pm">pm</option>
						</select>

						<select name="month" ng-model="order.month" size="1" id="Combobox1" style="position:absolute;left:14px;top:174px;width:140px;height:35px;z-index:10;">
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

						



						<textarea name="TextArea1" required ng-model="order.address" style="position:absolute;left:17px;top:252px;width:303px;height:90px;z-index:12;" rows="4" cols="48" placeholder="Address">
						</textarea>

						<textarea name="TextArea2" required ng-model="order.details"  style="position:absolute;left:19px;top:357px;width:301px;height:90px;z-index:13;" rows="4" cols="47" placeholder="Please describe the job in details">
						</textarea>

						<div id="wb_Text3" style="position:absolute;left:62px;top:31px;width:229px;height:16px;z-index:14;text-align:left;">
							<span style="color:#696969;font-family:Arial;font-size:13px;">Please describe the service you want</span>
						</div>

					</div>

					<div ng-if="form.$valid" style="visibility: hidden;" ng-style="{visibility: (form.$valid) ? 'visible':'hidden'}">

						<button id="Button1" name="send" style="position:absolute;left:18px;top:512px;width:326px;height:47px;z-index:11;" 
						ng-hide="quote_gotten" ng-click="get_quote();">Prepare Quote</button>

						<button ng-show="quote_gotten" id="Button1" name="pay" style="position:absolute;left:18px;top:512px;width:326px;height:47px;z-index:11;" 
						ng-click="make_payment();">Pay # {{ total_price }}</button>

						<div ng-show="quote_gotten" style="padding: 20px 20px;">
							<table width="100%">
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

			<div id="wb_Image2" style="position:absolute;left:284px;top:373px;width:182px;height:182px;z-index:18;">
				<img src="<?=base_url('assets/last_design/images/');?>ecfa0479e4d9d9b1d845bda61235166f.png" id="Image2" alt="">
			</div>

		</div>
	</div>
</div>