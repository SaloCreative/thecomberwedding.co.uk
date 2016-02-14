<?php

echo 'Mailing<br>';

require '../../../../../vendor/autoload.php';
use Mailgun\Mailgun;

//TODO: Centralise this to link to main mailgun plugin

# Instantiate the client.
$mgClient = new Mailgun('key-58bdcb87c0c6277d258f41492c248312');
$domain = "mg.thecomberwedding.co.uk";

# Make the call to the client.
$result = $mgClient->sendMessage($domain, array(
    'from'    => 'Lotte & Rich Comber <invites@thecomberwedding.co.uk>',
    'to'      => $email,
    'subject' => 'You are invited to our Wedding!',
    'html'    => '<html>
		'.$messageCompanyOutput.'
	</html>'
));