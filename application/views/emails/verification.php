<!-- lower part of email -->
<tr>
    <td class="innerpadding borderbottom">
        <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td class="h2">
                    Welcome to <?=$email;?>,
                </td>
            </tr>
            <tr>
                <td class="bodycopy">
                    Please, click there to verify your taskwiser account and or order
                    <br>
                    <a href="<?=base_url().$verification_url;?>"><?="{$verification_url}";?></a>
                </td>
            </tr>
        </table>
    </td>
</tr>
<!-- end of lower email part -->
