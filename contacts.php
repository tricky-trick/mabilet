<?php
header('Content-Type: text/html; charset=utf-8');
if($_SERVER["REQUEST_METHOD"] == "POST")
{
		$email=addslashes($_POST['email']); 
		$message=str_replace("\n","<br>", addslashes($_POST['message'])); 
		$to = 'denis.zayats@gmail.com';
        $subject = 'Нове повідомлення від користувача '.$email;
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		mail($to, $subject, $message, $headers);
}
		
?>