<?=link_tag ('assets/last_design/_handyman.css');?>

<div ng-controller="handymanController" ng-init="getPrice();">
	<div id="Layer2" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:998px;float:left;clear:left;display:block;z-index:76;">
		<div id="Layer2_Container" style="width:1237px;height:998px;position:relative;margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;text-align:left;">
			<div id="wb_Image3" style="position:absolute;left:266px;top:40px;width:199px;height:263px;z-index:33;">
				<img src="<?=base_url('assets/last_design/images/');?>task_wiser_welcome_note.png" id="Image3" alt="">
			</div>
			<div id="wb_Text1" style="position:absolute;left:293px;top:325px;width:144px;height:29px;z-index:34;text-align:left;">
				<span style="color:#696969;font-family:Arial;font-size:24px;">
					<strong> Handy Man</strong>
				</span>
			</div>
			
			<div id="wb_Form1" style="position:absolute;left:495px;top:54px;width:357px;height:758px;z-index:35;">
				<form name="form" method="post" id="Form1" novalidate>
					<div ng-hide="quote_gotten">
						<label for="Label1" id="Label1" style="position:absolute;left:15px;top:110px;width:75px;height:18px;line-height:18px;z-index:4;"> Carpenter</label>
						<input type="radio" ng-model="order.type" name="type" value="carpenter" style="position:absolute;left:158px;top:115px;z-index:5;">

						<label for="Label2" id="Label2" style="position:absolute;left:15px;top:134px;width:75px;height:18px;line-height:18px;z-index:6;"> Tailor</label>
						<input type="radio" ng-model="order.type" name="type" value="tailor" style="position:absolute;left:158px;top:137px;z-index:7;">

						<label for="Label2" id="Label4" style="position:absolute;left:15px;top:182px;width:121px;height:18px;line-height:18px;z-index:22;"> Generator repairs</label>
						<input type="radio" ng-model="order.type" name="type" value="gen_repairs" style="position:absolute;left:158px;top:185px;z-index:24;">	

						<label for="Label1" id="Label3" style="position:absolute;left:15px;top:158px;width:225px;height:18px;line-height:18px;z-index:21;"> Air Conditioner repairs</label>
						<input type="radio" name="type" ng-model="order.type" value="air_conditioner_repairs" 
						style="position:absolute;left:158px;top:163px;z-index:23;">

						<label for="Label2" id="Label6" style="position:absolute;left:15px;top:229px;width:110px;height:18px;line-height:18px;z-index:26;"> Painter</label>
						<input type="radio" name="type" ng-model="order.type" value="painter" style="position:absolute;left:158px;top:210px;z-index:27;">
						
						<label for="Label1" id="Label7" style="position:absolute;left:15px;top:61px;width:75px;height:18px;line-height:18px;z-index:29;"> Electrician</label>
						<input type="radio" name="type" ng-model="order.type" value="electrician" style="position:absolute;left:158px;top:66px;z-index:31;">

						<label for="Label2" id="Label8" style="position:absolute;left:15px;top:85px;width:75px;height:18px;line-height:18px;z-index:30;"> Plumber</label>
						<input type="radio" name="type" ng-model="order.type" value="plumber" style="position:absolute;left:158px;top:232px;z-index:28;">

						<label for="Label1" id="Label5" style="position:absolute;left:15px;top:205px;width:121px;height:18px;line-height:18px;z-index:25;"> Oven Repairer</label>
						<input type="radio" name="type" ng-model="order.type" value="oven_repairer" style="position:absolute;left:158px;top:88px;z-index:32;">


						<input type="text" id="Editbox2" ng-model="order.email"
						style="position:absolute;left:17px;top:293px;width:312px;height:25px;line-height:25px;z-index:9;" placeholder="enter email address">

						<input type="text" id="Editbox3" ng-model="order.mobile"
						style="position:absolute;left:18px;top:326px;width:311px;height:25px;line-height:25px;z-index:10;" placeholder="enter mobile number">

						<input type="text" id="Editbox1" ng-model="order.name" 
						style="position:absolute;left:17px;top:260px;width:312px;height:25px;line-height:25px;z-index:8;" placeholder="enter full name">


						<textarea name="TextArea1" id="TextArea1" ng-model="order.address" style="position:absolute;left:16px;top:355px;width:311px;height:79px;z-index:11;" rows="4" cols="49" placeholder="Address">
						</textarea>

						<textarea name="TextArea2" id="TextArea2"  ng-model="order.details" 
						style="position:absolute;left:18px;top:520px;width:309px;height:90px;z-index:12;" rows="4" cols="49" placeholder="Please describe the job in details">
						</textarea>

						<div id="wb_Text3" style="position:absolute;left:20px;top:29px;width:317px;height:32px;z-index:14;text-align:left;">
							<span style="color:#696969;font-family:Arial;font-size:13px;">Please select the type of Handy Man service you want</span>
						</div>

						<select name="month" size="1" id="Combobox1" required style="position:absolute;left:19px;top:440px;width:140px;height:35px;z-index:23;" ng-model="order.month">
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

						<select name="hour" size="1" id="Combobox4" required style="position:absolute;left:19px;top:480px;width:140px;height:35px;z-index:24;" ng-model="order.hour">
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

						<select name="day" size="1" id="Combobox2" required style="position:absolute;left:164px;top:440px;width:79px;height:35px;z-index:25;" ng-model="order.day">
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

						<select name="minute" size="1" id="Combobox5" required style="position:absolute;left:164px;top:480px;width:79px;height:35px;z-index:26;" ng-model="order.minute">
							<option value="00" ng-selected="true">00</option>
							<option value="15">15</option>
							<option value="30">30</option>
							<option value="45">45</option>
						</select>

						<select name="year" size="1" id="Combobox3" required style="position:absolute;left:247px;top:440px;width:80px;height:35px;z-index:27;" ng-model="order.year">
							<option value="2017">2017</option>
							<option value="2018">2018</option>
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
						</select>

						<select name="period" size="1" id="Combobox6" required style="position:absolute;left:248px;top:480px;width:80px;height:35px;z-index:28;" ng-model="order.period">
							<option ng-selected="true">am</option>
							<option value="">pm</option>
						</select>
					</div>

					<div ng-if="form.$valid" ng-style="{visibility: (form.$valid) ? 'visible':'hidden'}">

						<button id="Button1" name="send" style="position:absolute;left:18px;top:686px;width:319px;height:47px;z-index:13;" 
							ng-hide="quote_gotten" ng-click="get_quote();">Prepare Quote</button>

						<div ng-show="quote_gotten" style="padding: 20px 20px;">
							<button id="Button1" name="pay" style="position:absolute;left:18px;top:686px;width:319px;height:47px;z-index:13;" 
							ng-click="make_payment();">Pay # {{ total_price }}</button>
						</div>
					</div>

				</form>
			</div>
			<div id="wb_Image2" style="position:absolute;left:235px;top:388px;width:240px;height:200px;z-index:36;">
				<img src="<?=base_url('assets/last_design/images/');?>toolbox_copy.png" id="Image2" alt="">
			</div>
		</div>
	</div>	
</div>