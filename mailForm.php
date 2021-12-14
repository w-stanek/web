<?php 
$name = addslashes($_POST['name']);
$subject = addslashes($_POST['subject']);
$email = addslashes($_POST['mail']);
$message = addslashes($_POST['text']."\r\n odesílatel ".$name."\r\n".$email );
$to = 'w.stanek@seznam.cz';
$headers = 'From: <portfolio>' . "\r\n";
$send = mb_send_mail($to,$subject,$message,$headers);
if($send)
echo 'Odesláno';
else
echo 'Chyba při odesílání';
