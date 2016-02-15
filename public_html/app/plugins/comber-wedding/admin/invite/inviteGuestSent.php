<?php
$inviteSent = 'UPDATE guests_group SET invited = 1 WHERE user_id = '.$groupId;
$sentInvite = $ftoDB->prepare($inviteSent);
$sentInvite->execute();
