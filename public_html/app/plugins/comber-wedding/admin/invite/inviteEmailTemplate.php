<?php

$people = count($names);
$i = 0;
$messageInviteNames = '';

foreach ($names as $name) {
    if($people > 1) {
        $i++;
        if($i < $people) {
            $messageInviteNames .= '&nbsp;';
        } else {
           $messageInviteNames .= '&nbsp;&amp;&nbsp;';
        }
    }
    $messageInviteNames .= $name;
}
/*
$messageInviteNames = 'Lotte &amp; Rich';
$email = 'richcc@me.com';
*/

$messageInviteOutput = '
<table width="609" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="609" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="285"><a href="http://www.fruit2office.co.uk/" target="_blank"><img src="http://www.fruit2office.co.uk/EmailImages/logo.gif" alt="Fruit2Office" width="285" height="100" border="0" style="display:block" /></a></td>
        <td width="324" style="text-align: right; font-family: Arial, Helvetica, sans-serif; color: #ccc; font-size: 20px;">You&#39;re invited...</td></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><table width="609" border="0" cellspacing="0" cellpadding="0" style="padding-top: 20px;">
      <tr>
        <td width="10">&nbsp;</td>
        <td width="589">
            <font face="Arial, Helvetica, sans-serif" size="2" color="#231f20">
                <span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#231f20">
                    <p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#231f20">Dear '.$messageInviteNames.'</p>

                    <p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#231f20">You&#39;re invited to witness the marriage of <em>Charlotte Marie Harris</em> and <em>Richard Charles Comber</em> on the 4th June 2016 at 2pm.</p>
                    <p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#231f20">We would love for you to be there. You can find all you need to know at <a href="http://www.thecomberwedding.co.uk" style="color:#303f76; text-decoration: none;">www.thecomberwedding.co.uk</a>. On the website you will be able to RSVP and pick your menu choices. You will also find really useful information about local hotels, the venue, the dress code for the day and our gift list.</p>
                    <p style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#231f20">To access the site you will need to use the login details below: <br><br></p>
			    </span>
            </font>
        </td>
        <td width="10">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td>
		<table width="609" border="0" cellspacing="0" cellpadding="0" style="padding-top: 10px;">
		  <tr>
		    <td width="10">&nbsp;</td>
		  	<td width="589">
				<table width="100%" border="0" cellspacing="0" cellpadding="10px">
                    <tr>
                        <td width="295" style="font-family: Arial, Helvetica, sans-serif; color: #7c7c7c; font-size: 14px; background: #efefef; border-bottom: 1px solid #fff; border-right: 1px solid #fff;">
                            Username<br>
                            <a href="http://www.thecomberwedding.co.uk/login/?loginame='.$email.'" target="_blank" style="color:#303f76; text-decoration: none;">'.$email.'</a>
                        </td>
                        <td width="294" style="font-family: Arial, Helvetica, sans-serif; color: #7c7c7c; font-size: 14px; background: #efefef; border-bottom: 1px solid #fff;">
                            Password<br>
                            <strong>'.$authToken.'</strong>
                        </td>
                    </tr>
				</table>
			<td>
			<td width="10">&nbsp;</td>
		  </tr>
		</table>
	</td>
  </tr>
  <tr>
    <td><table width="609" border="0" cellspacing="0" cellpadding="0" style="padding-top: 20px;">
      <tr>
        <td width="10">&nbsp;</td>
        <td width="589">
            <font face="Arial, Helvetica, sans-serif" size="2" color="#231f20">
                <span style="font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#231f20">
                    <p>If you have any problems using the site, or need to ask us a question then please drop us an email or call. Hope you can make it <br><br>Love<br><br>Lotte &amp; Rich<br><br>Xxx</p>
			    </span>
            </font>
        </td>
        <td width="10">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>';

echo '<html>'.$messageInviteOutput.'</html>';