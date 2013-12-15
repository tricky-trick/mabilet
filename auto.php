<?php

if ( !isset($_REQUEST['term']) )
    exit;

include("_sys_write/search/config.php");
header ("Content-Type: text/html; charset=utf-8");
mysql_set_charset('utf8',$con); 

$rs = mysql_query('select station_name, code_name from stations_ua where station_name like "'. mysql_real_escape_string($_REQUEST['term']) .'%" order by station_name asc limit 0,10', $con);

$data = array();
$data_code = array();

if ($rs && mysql_num_rows($rs))
{
    while($row = mysql_fetch_array($rs, MYSQL_ASSOC))
    {
        $data[] = array('value' => $row['station_name']." : ".$row['code_name']);
    }
}

echo json_encode($data);
flush();
?>