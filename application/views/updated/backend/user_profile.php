<?=link_tag ('assets/last_design/_Edit_user_profile.css');?>

<div id="wb_Form1" style="position:absolute;left:353px;top:87px;width:708px;height:592px;z-index:18;" ng-controller="ProfileCntrl" ng-init="loadProfile('<?=base_url();?>');">
	<form name="form" method="post" action="" enctype="text/plain" id="Form1">

        <div id="wb_Text4" style="position:absolute;left:80px;top:55px;width:534px;height:16px;text-align:center;z-index:5;" >
			<span style="color:#696969;font-family:Arial;font-size:13px;">Please fill each field properly, to update your profile</span>
		</div>

		<input type="text" id="Editbox1" style="position:absolute;left:15px;top:121px;width:655px;height:18px;line-height:18px;z-index:1;padding:10px;" name="Editbox1"
            ng-model="person.fullname" placeholder="enter full name" required>

		<input type="text" id="Editbox2" style="position:absolute;left:15px;top:154px;width:655px;height:18px;line-height:18px;z-index:2;padding:10px;" name="Editbox2"
            ng-model="person._email" placeholder="enter email address" required>

        <div style="visibility:hidden;" ng-show="!(form.$valid) && (form.password.$touched) && (form.repassword.$touched)">
            <div id="wb_Text9" style="position:relative;left:0px;top:190px;width:334px;height:16px;text-align:center;z-index:19;">
            	<span style="color:#FF0000;font-family:Arial;font-size:13px;">
                    <span ng-if="(form.password) !== (form.repassword)">Please, password(s) do not match!</span>

                </span>
            </div>
        </div>

        <div style="visibility:hidden;" ng-show="form.password.$touched && form.password.length < 6">
            <div id="wb_Text9" style="position:relative;left:0px;top:190px;width:334px;height:16px;text-align:center;z-index:19;">
                <span style="color:#FF0000;font-family:Arial;font-size:13px;">
                    <span>Please, enter a password</span>
                </span>
            </div>
        </div>

		<input type="password" id="Editbox4" style="position:absolute;left:15px;top:210px;width:655px;height:18px;line-height:18px;z-index:6;padding:10px;" name="password"
            ng-model="person._password" placeholder="enter password"  ng-minlength="6">

        <input type="password" id="Editbox3" style="position:absolute;left:15px;top:242px;width:654px;height:18px;line-height:18px;z-index:3;padding:10px;" name="repassword"
                ng-model="person._repassword" placeholder=" confirm password" ng-required="person._password">

		<input type="text" id="Editbox5" style="position:absolute;left:15px;top:274px;width:654px;height:18px;line-height:18px;z-index:7;padding:10px;" name="Editbox3"
            ng-model="person._tel" placeholder=" enter mobile number" required>

		<input type="text" id="Editbox7" style="position:absolute;left:15px;top:376px;width:654px;height:80px;line-height:80px;z-index:8;padding:10px;" name="Editbox3"
            ng-model="person.address" placeholder="Enter Your Address" required>

        <div id="wb_Text3" style="position:absolute;left:12px;top:312px;width:109px;height:16px;text-align:center;z-index:10;">
			<span style="color:#808080;font-family:Arial;font-size:13px;"> Select Location</span>
		</div>
		<select name="state" ng-value="person._state" size="1" id="Combobox1" style="position:absolute;left:15px;top:333px;width:664px;height:35px;z-index:9;" required>
			<option>abuja</option>
            <option value="12">lagos</option>
			<option>portharcourt</option>
			<option>Enugu</option>
		</select>

        <input type="button" id="Button2" ng-click="updateProfile('<?=base_url();?>');" ng-show="form_complete()" value="Update Profile"
            style="position:absolute;left:217px;top:509px;width:275px;height:47px;z-index:4;padding:10px;">
	</form>
</div>
