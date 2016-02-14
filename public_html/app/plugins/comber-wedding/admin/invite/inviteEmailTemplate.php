<?php
$messageInviteOutput = '<p>Dear';
$people = count($names);
$i = 0;
foreach ($names as $name) {
    $i++;
    if($i < $people) {
        $messageInviteOutput .= '&nbsp;';
    } else {
        $messageInviteOutput .= '&nbsp;&amp;&nbsp;';
    }
    $messageInviteOutput .= $name;
}
$messageInviteOutput .= '</p>';