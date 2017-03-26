<?=link_tag ('assets/last_design/_autorepair.css');?>

<div ng-controller="customController" ng-init="getPrice();">
	<div id="Layer2" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:998px;float:left;clear:left;display:block;z-index:69;">
		<div id="Layer2_Container" style="width:1237px;height:998px;position:relative;margin-left:auto;margin-right:auto;margin-top:auto;margin-bottom:auto;text-align:left;">
			<div id="wb_Image3" style="position:absolute;left:273px;top:41px;width:199px;height:263px;z-index:29;">
				<img src="<?=base_url('assets/last_design/images/');?>task_wiser_welcome_note.png" id="Image3" alt="">
			</div>
			<div id="wb_Text1" style="position:absolute;left:304px;top:325px;width:152px;height:29px;z-index:30;text-align:left;">
				<span style="color:#696969;font-family:Arial;font-size:24px;">
					<strong> Auto Repair</strong>
				</span>
			</div>
			<div id="wb_Image2" style="position:absolute;left:278px;top:363px;width:188px;height:272px;z-index:31;">
				<img src="<?=base_url('assets/last_design/images/');?>AffinityTouringS4FF.png" id="Image2" alt="">
			</div>
			<div id="wb_Image4" style="position:absolute;left:221px;top:583px;width:265px;height:140px;z-index:32;">
				<img src="<?=base_url('assets/last_design/images/');?>Wrench-PNG-Pic.png" id="Image4" alt="">
			</div>
			<div id="wb_Form1" style="position:absolute;left:486px;top:53px;width:357px;height:880px;z-index:33;">

				<form name="form" method="post" novalidate>

					<div ng-hide="quote_gotten">

						<div id="wb_Text2" style="position:absolute;left:18px;top:49px;width:317px;height:16px;z-index:22;text-align:left;">
							<span style="color:#696969;font-family:Arial;font-size:13px;">Please select the type of laundry service you want</span>
						</div>

						<label for="Form1" id="Label1" style="position:absolute;left:15px;top:87px;width:175px;height:18px;line-height:18px;z-index:4;"> Washer man</label>
						<input type="radio" id="RadioButton1" name="NewGroup" value="on" style="position:absolute;left:158px;top:92px;z-index:5;">

						<label for="RadioButton1" id="Label2" style="position:absolute;left:15px;top:111px;width:75px;height:18px;line-height:18px;z-index:6;"> Dry cleaner</label>
						<input type="radio" id="RadioButton2" name="NewGroup" value="on" style="position:absolute;left:158px;top:114px;z-index:7;">

						<input type="text" id="Editbox1" style="position:absolute;left:15px;top:141px;width:312px;height:18px;line-height:18px;z-index:8;" name="Editbox1" value="" placeholder="enter full name">

						<input type="text" id="Editbox2" style="position:absolute;left:15px;top:174px;width:312px;height:18px;line-height:18px;z-index:9;" name="Editbox2" value="" placeholder="enter email address">

						<input type="text" id="Editbox3" style="position:absolute;left:16px;top:207px;width:311px;height:18px;line-height:18px;z-index:10;" name="Editbox3" value="" placeholder="enter mobile number">

						<label for="Label7" id="Label6" style="position:absolute;left:15px;top:235px;width:75px;height:18px;line-height:18px;z-index:11;"> Shirts</label>
						<input type="text" id="Editbox4" style="position:absolute;left:15px;top:258px;width:312px;height:18px;line-height:18px;z-index:12;" name="Editbox4" value="0">

						<label for="Label8" id="Label7" style="position:absolute;left:15px;top:288px;width:75px;height:18px;line-height:18px;z-index:13;"> Troussers</label>
						<input type="text" id="Editbox5" style="position:absolute;left:15px;top:311px;width:312px;height:18px;line-height:18px;z-index:14;" name="Editbox5" value="0">

						<label for="Label9" id="Label8" style="position:absolute;left:15px;top:339px;width:75px;height:18px;line-height:18px;z-index:15;"> Suits</label>
						<input type="text" id="Editbox6" style="position:absolute;left:16px;top:365px;width:311px;height:18px;line-height:18px;z-index:16;" name="Editbox6" value="0">

						<label for="Button1" id="Label9" style="position:absolute;left:15px;top:398px;width:75px;height:18px;line-height:18px;z-index:17;"> Gowns</label>
						<input type="text" id="Editbox7" style="position:absolute;left:16px;top:424px;width:311px;height:18px;line-height:18px;z-index:18;" name="Editbox7" value="0">

						<textarea name="TextArea1" id="TextArea1" style="position:absolute;left:16px;top:593px;width:311px;height:79px;z-index:19;" rows="4" cols="49" placeholder="Address">
						</textarea>

						<textarea name="TextArea2" id="TextArea2" style="position:absolute;left:18px;top:689px;width:309px;height:90px;z-index:20;" rows="4" cols="49" placeholder="Please describe the job in details">
						</textarea>

						<input type="submit" id="Button1" name="" value=" Get Quote" style="position:absolute;left:18px;top:797px;width:319px;height:47px;z-index:21;">


						<select name=" date and year" size="1" id="Combobox1" style="position:absolute;left:20px;top:488px;width:140px;height:35px;z-index:23;">
							<option>January</option>
							<option>February</option>
							<option>March</option>
							<option>April</option>
							<option>May</option>
							<option>June</option>
							<option>July</option>
							<option>August</option>
							<option>September</option>
							<option>October</option>
							<option>November</option>
							<option>December</option>
						</select>
						<select name=" date and year" size="1" id="Combobox4" style="position:absolute;left:21px;top:527px;width:140px;height:35px;z-index:24;">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
						</select>
						<select name=" date and year" size="1" id="Combobox2" style="position:absolute;left:164px;top:488px;width:79px;height:35px;z-index:25;">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
							<option>6</option>
							<option>7</option>
							<option>8</option>
							<option>9</option>
							<option>10</option>
							<option>11</option>
							<option>12</option>
							<option>13</option>
							<option>15</option>
							<option>16</option>
							<option>17</option>
							<option>18</option>
							<option>19</option>
							<option>20</option>
							<option>21</option>
							<option>22</option>
							<option>23</option>
							<option>24</option>
							<option>25</option>
							<option>26</option>
							<option>27</option>
							<option>28</option>
							<option>29</option>
							<option>30</option>
							<option>31</option>
						</select>
						<select name=" date and year" size="1" id="Combobox5" style="position:absolute;left:164px;top:527px;width:79px;height:35px;z-index:26;">
							<option>00</option>
							<option>15</option>
							<option>30</option>
							<option>45</option>
						</select>
						<select name=" date and year" size="1" id="Combobox3" style="position:absolute;left:247px;top:487px;width:88px;height:35px;z-index:27;">
							<option>2017</option>
							<option>2018</option>
							<option>2019</option>
							<option>2020</option>
							<option>2021</option>
						</select>
						<select name=" date and year" size="1" id="Combobox6" style="position:absolute;left:248px;top:526px;width:88px;height:35px;z-index:28;">
							<option>am</option>
							<option>pm</option>
						</select>

					</div>

					<div ng-if="form.$valid" style="visibility: hidden;" ng-style="{visibility: (form.$valid) ? 'visible':'hidden'}">

						<button id="Button1" name="send" style="position:absolute;left:19px;top:477px;width:311px;height:47px;z-index:7;"
						ng-hide="quote_gotten" ng-click="get_quote();">Prepare Quote</button>

						<div ng-show="quote_gotten" style="padding: 20px 20px;">
							<p style="text-align: center; font-size: 18px; font-weight: bolder; padding-bottom: 20px; padding-top: 20px;">Order Sent!</p>
							<p style="text-align: justify;">Dear <span ng-bind="order.name"></span>,</p>
							<p style="text-align: justify; padding-bottom: 30px;">
								An e-mail would be sent to your email address <a ng-href="order.email" ng-bind="order.email"></a>,
								with a quote for your order.
							</p>
							<p style="text-align: justify;">Thanks,</p>
							<p style="text-align: justify;"><a href="http://www.taskwiser.com/">taskwiser.com</a></p>
						</div>
					</div>


				</form>
			</div>
		</div>
	</div>
</div>
