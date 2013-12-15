<?php
header('Content-Type: text/html; charset=utf-8');
include("_sys_write/search/config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$email=addslashes($_POST['email']); 
	$sql="SELECT * FROM users WHERE user_email='$email'";
	$result=mysql_query($sql, $con);
	$count=mysql_num_rows($result);
	if($count==1)
	{
		$pwd = mysql_result($result, 0, "user_pwd");
		$user_name = mysql_result($result, 0, "user_name");
		$to = $email;
        $subject = "Відновлення паролю";
		$message = "Шановний $user_name, Ваш пароль: $pwd <br><br> З повагою,<br>Команда maBilet.";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		mail($to, $subject, $message, $headers);

		echo "true";
	}
}
?>