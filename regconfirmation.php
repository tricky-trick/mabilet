<?php
header('Content-Type: text/html; charset=utf-8');
include("_sys_write/search/config.php");
include("_sys_write/search/def.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$email=addslashes($_POST['email']); 
$code=addslashes($_POST['code']); 

$sql="SELECT * FROM users WHERE user_email='$email' and user_code=$code";
$result=mysql_query($sql, $con);
$count=mysql_num_rows($result);
if($count==1)
{
		$user_name = mysql_result($result, 0, "user_name");
		$user_sname = mysql_result($result, 0, "user_sname");
		$user_pwd = mysql_result($result, 0, "user_pwd");
		$user_phone = mysql_result($result, 0, "user_phone");
		$user_city = mysql_result($result, 0, "user_city");

		$sql_confirm = "UPDATE users SET is_confirmed = 1 where user_email = '$email'";
		mysql_query($sql_confirm,$con);
		$to = $email;
        $subject = "Вітаємо Вас на ресурсі maBilet";
		$message = "Вітаємо, $user_name. <br> Реєстрація на ресурсі maBilet пройшла успішно. Ваші дані: <br> Ім'я: $user_name <br> Прізвище: $user_sname <br> Пароль: $user_pwd <br> Телефон: $user_phone <br> Місто: $user_city <br><br> З повагою, <br> Команда maBilet.";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		mail($to, $subject, $message, $headers);

		echo "true";

}
}
?>