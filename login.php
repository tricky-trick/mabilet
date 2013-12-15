<?php
header('Content-Type: text/html; charset=utf-8');
include("_sys_write/search/config.php");
if($_SERVER["REQUEST_METHOD"] == "POST")
{
$myusername=addslashes($_POST['email']); 
$mypassword=addslashes($_POST['password']); 

$rout_direction=addslashes($_POST['rout_d']); 
$rout_direction_name=addslashes($_POST['stnamedirection']); 
$rout_date=addslashes($_POST['rout_date']); 
$rout_time=addslashes($_POST['rout_time']); 
$placetype = $_POST['placetype'];
$sql="SELECT * FROM users WHERE user_email='$myusername' and user_pwd='$mypassword' and is_confirmed = 1";
$result=mysql_query($sql, $con);
$count=mysql_num_rows($result);
if($count==1)
{
	$user_id = mysql_result($result, 0, "user_id");
	$user_name = mysql_result($result, 0, "user_name");
	$sql_select_count = "SELECT count(*) as `count` from events where user_id=$user_id and is_active = 1";
	$sql_select_count_query = mysql_query($sql_select_count);
	$count_result = mysql_result($sql_select_count_query, 0, 'count');
	if($count_result < 3)
	{
	$sql_insert = "INSERT INTO `events` (`user_id`, `rout_direction`,`rout_direction_name`,  `rout_date`, `rout_time`,`rout_places`,  `date`) VALUES ($user_id,'$rout_direction','$rout_direction_name','$rout_date','$rout_time',$placetype,Now())";
	if(mysql_query($sql_insert, $con))
	{
		echo "login_true";
	}
		$to = $myusername;
        $subject = "Квиткове побажання було успішно створено";
        $message = "Вітаємо $user_name, <br> Ваше квиткове побажання було успішно створене та запущене на обробку в системі maBilet згідно наступних умов - $rout_direction_name. Дата: $rout_date. Час: $rout_time <br> Ми повідомимо Вас листом, як тільки появляться бажані квитки.<br><br> З повагою, <br> Команда maBilet.";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		mail($to, $subject, $message, $headers);
}
else 
{
echo "login_limit";
}
}
else 
{
echo "login_false";
}
}
?>