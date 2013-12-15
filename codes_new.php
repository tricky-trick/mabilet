<?php
include("_sys_write/search/config.php");
header ("Content-Type: text/html; charset=utf-8");
		$stfrom = $_GET['stfrom'];
		$stto = $_GET['stto'];
        $date = $_GET['date'];
        $timefrom = $_GET['timefrom'];
        $timeto = $_GET['timeto'];
        $station_name = $_GET['station_name'];
        $placetype = $_GET['placetype'];
     	$getdata = http_build_query(
                    array(
                   'station_id_from'=>$stfrom,
                   'station_id_till'=>$stto,
                   'station_from'=>trim(explode("-", $station_name)[0]),
                   'station_till'=>trim(explode("-", $station_name)[1]),
                   'date_start'=>str_replace("-", ".", $date),
                   'time_from'=>$timefrom
                     )
                    );
        $opts = array('http' =>
                 array(
                    'method' => 'POST',
                    'header' => "GV-Ajax:1\r\n"
                                ."GV-Referer:http://www.plategka.com/nalichie-biletov-na-poezd",
                    'content' => $getdata
                )
                );

		$context  = stream_context_create($opts);
     	$response = file_get_contents('http://www.plategka.com/uzd/search/', false, $context);
        //print_r($http_response_header);
        if(strpos($http_response_header[0], '200 OK')!==false)
        {
     	$ll = json_decode($response,true);
        //print_r($ll);
        $index = 1;
        $imest = 0;
        $places = array(0 => '', 1 => 'люкс', 2 => 'купе', 3 => 'плацкарт', 4 => 'загальних');
        if(($ll['error'] == 1 || $ll['error'] == true))
        {
            if((strpos($ll['value'],'По запрашиваемым Вами значениям ничего не найдено')!==false))
            {
                $index=0;

                echo "<div id=\"infoblock\"><p id=\"infomsg\">На вказаний час ".$places[$placetype]." місць не знайдено</p>";
                echo "<input type=\"button\" id=\"getAuth\" class=\"get\" value=\"Повідомити, коли будуть місця\"/></div>";
            }
            else
            {
                echo "<div id=\"infoblock\"><p id=\"infomsg\">".$ll['error']."</div></p>";
            }

        }
        
        else
        {
                                        echo "<table class=sortable id=table>"; 
                                        echo "<tr>"; 
                                        echo "<th width=10%>Номер</th>"; 
                                        echo "<th width=30%>Напрямок</th>"; 
                                        echo "<th width=10%>Відправлення</th>"; 
                                        echo "<th width=10%>Прибуття</th>"; 
                                        echo "<th width=15%>В шляху</th>"; 
                                        echo "<th width=25%>Місця</th>";  
                                        echo "</tr>";

                                        //echo print_r($ll['value']);

            foreach($ll['value'] as $key => $element) 
            {
                if(strtotime(explode(" ", $element['from']['date'])[1]) >= strtotime($timefrom.":00") && strtotime(explode(" ", $element['from']['date'])[1]) <= strtotime($timeto.":00")) 
                {
                    if($placetype==0){
                        for($j=0; $j<count($element['types']); $j++)
                        {
                            $mest+=intval($element['types'][$j]['places']);
                        }
                         echo "<tr>";
                         echo "<td>" . $element['num'] . "</td>"; 
                         echo "<td>" . $element['from']['station'] ." - ". $element['till']['station'] . "</td>"; 
                         echo "<td>" . date('H:i', strtotime($element['from']['date'])). "</td>"; 
                         echo "<td>" . date('H:i', strtotime($element['till']['date'])) . "</td>"; 
                         if((strtotime($element['till']['date']) - strtotime($element['from']['date']))>24*3600)
                         {
                            $date_string = date('j:H:i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 27*3600);
                            $hours = intval(explode(":", $date_string)[0])*24 + intval(explode(":", $date_string)[1]);
                         echo "<td>" . $hours.":".date('i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 27*3600)."</td>"; 
                         }
                         else
                         {
                            echo "<td>" . date('H:i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 3*3600). "</td>"; 
                         }

                         ?>
                         <td>
                        <?php
                            foreach($element['types'] as $key => $value) {
                            echo "<a class=\"tooltip\" href=\"http://www.pz.gov.ua/rezerv/?lid=1&mid=31\" target=\"_blank\">".$value['title'].": ".$value['places']."</a><br>";
                         }?>
                         </td>
                         <?php 
                         echo "</tr>"; 
                     }
                    
                     elseif ($placetype==1) {
                        for($j=0; $j<count($element['types']); $j++)
                        {
                            if($element['types'][$j]['letter'] == "Л")
                            {
                                $mest+=intval($element['types'][$j]['places']);
                                echo "<tr>";
                                 echo "<td>" . $element['num'] . "</td>"; 
                                 echo "<td>" . $element['from']['station'] ." - ". $element['till']['station'] . "</td>"; 
                                 echo "<td>" . date('H:i', strtotime($element['from']['date'])). "</td>"; 
                                 echo "<td>" . date('H:i', strtotime($element['till']['date'])) . "</td>"; 
                                 if((strtotime($element['till']['date']) - strtotime($element['from']['date']))>24*3600)
                                 {
                                    $date_string = date('j:H:i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 27*3600);
                                    echo $date_string;
                                    $hours = intval(explode(":", $date_string)[0])*24 + intval(explode(":", $date_string)[1]);
                                 echo "<td>" . $hours.":".date('i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 27*3600)."</td>"; 
                                 }
                                 else
                                 {
                                    echo "<td>" . date('H:i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 3*3600). "</td>"; 
                                 }
                                 ?>
                                 <td>
                                <?php
                                    foreach($element['types'] as $key => $value) {
                                    if($value['letter'] == "Л")
                                    {    
                                        echo "<a class=\"tooltip\" href=\"http://www.pz.gov.ua/rezerv/?lid=1&mid=31\" target=\"_blank\">".$value['title'].": ".$value['places']."</a><br>";
                                    }
                                 }?>
                                 </td>
                                 <?php 
                                 echo "</tr>"; 
                                 $imest+=$mest;
                            }
                        }
                    }

                    elseif ($placetype==2) {
                                            for($j=0; $j<count($element['types']); $j++)
                        {
                            if($element['types'][$j]['letter'] == "К" || $element['types'][$j]['letter'] == "С1")
                            {
                                $mest+=intval($element['types'][$j]['places']);
                                echo "<tr>";
                                 echo "<td>" . $element['num'] . "</td>"; 
                                 echo "<td>" . $element['from']['station'] ." - ". $element['till']['station'] . "</td>"; 
                                 echo "<td>" . date('H:i', strtotime($element['from']['date'])). "</td>"; 
                                 echo "<td>" . date('H:i', strtotime($element['till']['date'])) . "</td>"; 
                                 if((strtotime($element['till']['date']) - strtotime($element['from']['date']))>24*3600)
                                 {
                                    $date_string = date('j:H:i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 27*3600);
                                    echo $date_string;
                                    $hours = intval(explode(":", $date_string)[0])*24 + intval(explode(":", $date_string)[1]);
                                 echo "<td>" . $hours.":".date('i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 27*3600)."</td>"; 
                                 }
                                 else
                                 {
                                    echo "<td>" . date('H:i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 3*3600). "</td>"; 
                                 }
                                 ?>
                                 <td>
                                <?php
                                    foreach($element['types'] as $key => $value) {
                                    if($value['letter'] == "К" || $value['letter'] == "С1")
                                    {    
                                        echo "<a class=\"tooltip\" href=\"http://www.pz.gov.ua/rezerv/?lid=1&mid=31\" target=\"_blank\">".$value['title'].": ".$value['places']."</a><br>";
                                    }
                                 }?>
                                 </td>
                                 <?php 
                                 echo "</tr>"; 
                                 $imest+=$mest;
                            }
                        }
                    }

                    elseif ($placetype==3) {
                                            for($j=0; $j<count($element['types']); $j++)
                        {
                            if($element['types'][$j]['letter'] == "П" || $element['types'][$j]['letter'] == "С2")
                            {
                                $mest+=intval($element['types'][$j]['places']);
                                echo "<tr>";
                                 echo "<td>" . $element['num'] . "</td>"; 
                                 echo "<td>" . $element['from']['station'] ." - ". $element['till']['station'] . "</td>"; 
                                 echo "<td>" . date('H:i', strtotime($element['from']['date'])). "</td>"; 
                                 echo "<td>" . date('H:i', strtotime($element['till']['date'])) . "</td>"; 
                                 if((strtotime($element['till']['date']) - strtotime($element['from']['date']))>24*3600)
                                 {
                                    $date_string = date('j:H:i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 27*3600);
                                    echo $date_string;
                                    $hours = intval(explode(":", $date_string)[0])*24 + intval(explode(":", $date_string)[1]);
                                 echo "<td>" . $hours.":".date('i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 27*3600)."</td>"; 
                                 }
                                 else
                                 {
                                    echo "<td>" . date('H:i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 3*3600). "</td>"; 
                                 }
                                 ?>
                                 <td>
                                <?php
                                    foreach($element['types'] as $key => $value) {
                                    if($value['letter'] == "П" || $value['letter'] == "С2")
                                    {    
                                        echo "<a class=\"tooltip\" href=\"http://www.pz.gov.ua/rezerv/?lid=1&mid=31\" target=\"_blank\">".$value['title'].": ".$value['places']."</a><br>";
                                    }
                                 }?>
                                 </td>
                                 <?php 
                                 echo "</tr>"; 
                                 $imest+=$mest;
                            }
                        }
                    }

                    elseif ($placetype==4) {
                                            for($j=0; $j<count($element['types']); $j++)
                        {
                            if($element['types'][$j]['letter'] == "О")
                            {
                                $mest+=intval($element['types'][$j]['places']);
                                echo "<tr>";
                                 echo "<td>" . $element['num'] . "</td>"; 
                                 echo "<td>" . $element['from']['station'] ." - ". $element['till']['station'] . "</td>"; 
                                  echo "<td>" . date('H:i', strtotime($element['from']['date'])). "</td>"; 
                                 echo "<td>" . date('H:i', strtotime($element['till']['date'])) . "</td>"; 
                                 if((strtotime($element['till']['date']) - strtotime($element['from']['date']))>24*3600)
                                 {
                                    $date_string = date('j:H:i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 27*3600);
                                    echo $date_string;
                                    $hours = intval(explode(":", $date_string)[0])*24 + intval(explode(":", $date_string)[1]);
                                 echo "<td>" . $hours.":".date('i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 27*3600)."</td>"; 
                                 }
                                 else
                                 {
                                    echo "<td>" . date('H:i', strtotime($element['till']['date']) - strtotime($element['from']['date']) - 3*3600). "</td>"; 
                                 }
                                 ?>
                                 <td>
                                <?php
                                    foreach($element['types'] as $key => $value) {
                                    if($value['letter'] == "О")
                                    {    
                                        echo "<a class=\"tooltip\" href=\"http://www.pz.gov.ua/rezerv/?lid=1&mid=31\" target=\"_blank\">".$value['title'].": ".$value['places']."</a><br>";
                                    }
                                 }?>
                                 </td>
                                 <?php 
                                 echo "</tr>"; 
                                 $imest+=$mest;
                            }
                        }
                    }

                    $imest+=$mest;
                }

            }

            if($imest == 0)
            {
                //$index = 0;
                echo "<div id=\"infoblock\"><p id=\"infomsg\">На вказаний час ".$places[$placetype]." місць не знайдено</p>";
                echo "<input type=\"button\" id=\"getAuth\" class=\"get\" value=\"Повідомити, коли будуть місця\"/></div>";
                ?>
                <script type="text/javascript">
                    document.getElementById("table").remove();
                </script>
                <?php
            }


        }

        echo "<script src=\"js/sorttable.js\"></script>";
        mysql_query("INSERT INTO `transactions`(`rout_direction`, `rout_date`, `rout_time`, `rout_places`, `is_found`, `date`) VALUES ('$station_name','$date','$timefrom-$timeto','".$places[$placetype]."', $index, Now())", $con);
        //echo $file=$_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF'];
        //echo $output = shell_exec("");
            }
    else
    {
        include("codes.php");
    }

?>