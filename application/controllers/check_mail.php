
<?php

function sendMail($to, $to_name, $from, $from_name, $subject, $message, $isHTML = true)
{
//echo "hi";die();
$mail = new PHPMailer();

$mail->IsSMTP(); // send via SMTP
$mail->Host = 'ssl://smtp.gmail.com'; // SMTP servers
$mail->SMTPAuth = true; // turn on SMTP authentication
$mail->Port = '465';
$mail->Username = 'shivam.kashyap@srmtechsol.com'; // SMTP username
$mail->Password = 'stpl.biz'; // SMTP password

$mail->From = $from;
$mail->FromName = $from_name;
$mail->AddAddress($to,$to_name); 
//$mail->AddAddress(OPTIONAL_EMAIL); // optional name
$mail->AddReplyTo($from,$from_name);

$mail->WordWrap = 50; // set word wrap

$mail->IsHTML($isHTML); // send as HTML

$mail->Subject = $subject;
$mail->Body = $message;

if(!$mail->Send())
{
echo $mail->ErrorInfo;die();

}

return;


}