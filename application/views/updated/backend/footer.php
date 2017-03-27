
            <div id="wb_Text5" style="position:absolute;left:293px;top:29px;width:92px;height:29px;text-align:center;z-index:7;">
				<span style="color:#696969;font-family:Arial;font-size:24px;">
					<strong> Orders</strong>
				</span>
			</div>
			<div id="wb_Text1" style="position:absolute;left:49px;top:350px;width:48px;height:16px;z-index:8;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:13px;">
                    <?=anchor('backend/orders','Orders');?>
				</span>
			</div>
			<div id="wb_Text2" style="position:absolute;left:49px;top:384px;width:73px;height:16px;z-index:9;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:13px;">
					<?=anchor('backend/payments','Payments');?>
				</span>
			</div>
			<div id="wb_Text6" style="position:absolute;left:49px;top:316px;height:16px;z-index:10;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:13px;">
					<?=anchor('backend/profile','Edit My Profile');?>
				</span>
			</div>
			<div id="wb_Text7" style="position:absolute;left:49px;top:228px;width:162px;height:32px;z-index:11;text-align:left;">
				<span style="color:#000000;font-family:Arial;font-size:13px;"> <?php echo($user->_email); ?></span>
			</div>
			<div id="wb_FontAwesomeIcon1" style="position:absolute;left:34px;top:87px;width:148px;height:117px;text-align:center;z-index:12;">
				<div id="FontAwesomeIcon1">
					<i class="fa fa-user">&nbsp;</i>
				</div>
			</div>
            <?=anchor('auth/signout','Sign Out', ['style' => "position:absolute;left:49px;top:437px;width:162px;height:41px;z-index:13;text-align:center;line-height:40px;", "id" => "Button1"]);?>
		</div>
	</div>

	<div id="Layer5" style="position:relative;text-align:center;margin:0px 0px 0px 0px;width:100%;height:55px;float:left;clear:left;display:block;z-index:30;">
		<div id="Layer5_Container" style="width:1278px;position:relative;margin-left:auto;margin-right:auto;text-align:left;">
			<div id="wb_Text20" style="position:absolute;left:428px;top:17px;width:182px;height:17px;z-index:19;text-align:left;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;">
					<a href="./_terms_and_conditions.html" class="style1"> Terms and Conditions</a>
				</span>
			</div>
			<div id="wb_Text21" style="position:absolute;left:663px;top:16px;width:161px;height:17px;z-index:20;text-align:left;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"> info@taskwiser.com</span>
			</div>
			<div id="wb_Text22" style="position:absolute;left:845px;top:17px;width:123px;height:16px;z-index:21;text-align:left;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:13px;"> +234 9020000737</span>
			</div>
			<div id="wb_Shape1" style="position:absolute;left:59px;top:8px;width:183px;height:35px;z-index:22;">
				<a href="./_book_now.html">
					<img src="<?=base_url('assets/last_design/images/');?>/img0036.png" id="Shape1" alt="" style="width:183px;height:35px;">
				</a>
			</div>
			<div id="wb_Text19" style="position:absolute;left:98px;top:17px;width:144px;height:17px;z-index:23;text-align:left;">
				<span style="color:#FFFFFF;font-family:Arial;font-size:15px;"> book a task now</span>
			</div>
			<div id="wb_Image18" style="position:absolute;left:629px;top:16px;width:26px;height:20px;z-index:24;">
				<a href="./index.html">
					<img src="<?=base_url('assets/last_design/images/');?>/envelope.png" id="Image18" alt="">
				</a>
			</div>
			<div id="wb_Image19" style="position:absolute;left:1134px;top:15px;width:29px;height:25px;z-index:25;">
				<a href="./index.html">
					<img src="<?=base_url('assets/last_design/images/');?>/twitter.png" id="Image19" alt="">
				</a>
			</div>
			<div id="wb_Image20" style="position:absolute;left:1091px;top:13px;width:14px;height:26px;z-index:26;">
				<a href="./index.html">
					<img src="<?=base_url('assets/last_design/images/');?>/fb.png" id="Image20" alt="">
				</a>
			</div>
			<div id="wb_Image21" style="position:absolute;left:1185px;top:15px;width:25px;height:25px;z-index:27;">
				<a href="./index.html">
					<img src="<?=base_url('assets/last_design/images/');?>/instagram.png" id="Image21" alt="">
				</a>
			</div>
		</div>
	</div>

    <script src="<?=base_url ('assets/js/jquery.js');?>"></script>
    <script src="<?=base_url ('assets/js/tether.min.js');?>"></script>
    <script src="<?=base_url ('assets/js/bootstrap.min.js');?>"></script>

    <script src="<?=base_url ('assets/js/angular.min.js');?>"></script>

    <script src="<?=base_url ('bower_components/ng-lodash/build/ng-lodash.min.js');?>"></script>

    <script src="<?=base_url ('assets/js/main.angular.js');?>"></script>

    <script src="<?=base_url ('assets/js/services/general.service.js');?>"></script>
    <script src="<?=base_url ('assets/js/services/bankend.customer.service.js');?>"></script>

    <script src="<?=base_url ('assets/js/controllers/backend.customers.payment.controller.js');?>"></script>
    <script src="<?=base_url ('assets/js/controllers/backend.customers.orders.controller.js');?>"></script>
    <script src="<?=base_url ('assets/js/controllers/backend.customers.profile.controller.js');?>"></script>
</body>
</html>
