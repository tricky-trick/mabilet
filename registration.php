<?php
header ("Content-Type: text/html; charset=utf-8");
$user_name= addslashes($_POST["user_name"]);
$user_sname= addslashes($_POST["user_sname"]);
$user_email=addslashes($_POST["user_email"]);
$user_pwd=addslashes($_POST["user_pwd"]);
$user_repwd=addslashes($_POST["user_repwd"]);
$user_city=addslashes($_POST["user_city"]);
$user_phone=addslashes($_POST["user_phone"]);
$_count=0;

$user_code = rand(1000000, 9999999);
$fake_code = rand(1000000000000, 99999999999999);

include("_sys_write/search/config.php");
include("_sys_write/search/def.php");
mysql_set_charset('utf8',$con); 
$result=mysql_query("select user_email from users");

while($row=mysql_fetch_array($result))

{

    if($row["user_email"]==$user_email)
		{		
		$_count++;
		}
		
}
if($_count==0)
{
session_start();
if(!is_null($_POST['capcha']))
{
if($_POST['capcha'] != $_SESSION['capcha']) 
{
	echo "capcha";

}
else{
	if(strlen($user_phone)<12)
	{
		$user_phone = NULL;
	}
		$sql="INSERT INTO users (`user_name`, `user_sname`, `user_email`, `user_pwd`, `user_city`, `user_phone`, `user_date`, `user_code`) VALUES ('$_POST[user_name]','$_POST[user_sname]','$_POST[user_email]', '$_POST[user_pwd]', '$_POST[user_city]', '$user_phone', Now(), $user_code)";
		mysql_query($sql,$con);
		$to = $user_email;
        $subject = "Реєстрація нового користувача";
        $message ="Доброго дня,<br> Ви створили профіль користувача на ресурсі maBilet з наступною email адресою $user_email <br> Будь-ласка підтвердіть Вашу реєстрацію, перейшовши за вказаною адресою http://".$url."/confirmation.php?email=".$user_email."&code=".$user_code."&scode=".$fake_code." або введыть код $user_code в поле \"Код\" <br><br> З повагою,<br>Команда maBilet.";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
		mail($to, $subject, $message, $headers);



        echo "true";
	}
}
}
	else
	{
		//header("Refresh: 2; URL=http://$url");
		echo "false";
	}
?>				