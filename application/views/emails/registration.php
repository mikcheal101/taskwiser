<!-- lower part of email -->
<tr>
    <td class="innerpadding borderbottom">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="h2" style="text-align: center;">
                    Welcome <?=$email;?>,
                </td>
            </tr>
            <tr>
                <td class="bodycopy" style="text-align: center;">
                    <p style="padding: 0 5px!important; margin: 0px!important">Your email address has been confirmed.</p>
                    <table class="" cellpadding="0" cellspacing="0" border="0" width="100%" 
                        style="font-size:13px!important;">
                        <tr>
                            <th style="text-align: right!important;" width="50%">
                                Email Address:
                            </th>
                            <td style="text-align: left!important; padding-left: 10px!important;">
                                <code><?=$email;?></code>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: right!important;" width="50%">
                                Username:
                            </th>
                            <td style="text-align: left!important; padding-left: 10px!important;">
                                <code><?=$username;?></code>
                            </td>
                        </tr>
                        <tr>
                            <th style="text-align: right!important;" width="50%">
                                Password:
                            </th>
                            <td style="text-align: left!important; padding-left: 10px!important;">
                                <code><?=$password;?></code>
                            </td>
                        </tr>
                    </table>
                    <br style="padding-bottom: 10px;">
                    <span style="font-size: 12px!important; color: #153643;">
                        click <a href="<?=base_url().$login_url;?>">here</a> to login to your taskwiser account
                    </span>
                </td>
            </tr>
        </table>
    </td>
</tr>
<!-- end of lower email part -->
