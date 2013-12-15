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
                        'kstotpr' => $stfrom,
                        'kstprib' => $stto,
                        'sdate'=>$date
                     )
                    );

        $opts = array('http' =>
                 array(
                    'method'  => 'GET',
                    'content' => $getdata
                )
                );

		$context  = stream_context_create($opts);
     	$response = file_get_contents('http://www.pz.gov.ua/rezerv/aj_g60.php?'.$getdata, false, $context);
     	$ll = json_decode($response,true);
        //print_r($ll);
        $index = 1;
        $imest = 0;
        $places = array(0 => '', 1 => 'люкс', 2 => 'купе', 3 => 'плацкарт', 4 => 'загальних');
        if(array_key_exists("error", $ll))
        {
            if((strpos($ll['error'][0],'НЕМА')!==false) || (strpos($ll['warning'][0],'НЕМА')!==false))
            {
                $index=0;
                echo "<div id=\"infoblock\"><p id=\"infomsg\">На вказаний час ".$places[$placetype]." місць не знайдено</p>";
                echo "<input type=\"button\" id=\"getAuth\" class=\"get\" value=\"Повідомити, коли будуть місця\"/></div>";
            }
            else
            {
                echo "<div id=\"infoblock\"><p id=\"infomsg\">".$ll['error'][0].". ".$ll['warning'][0]."</div></p>";
            }

        }
        
        else
        {
                                        echo "<table class=sortable>"; 
                                        echo "<tr>"; 
                                        echo "<th width=10%>Номер</th>"; 
                                        echo "<th width=30%>Напрямок</th>"; 
                                        echo "<th width=10%>Відправлення</th>"; 
                                        echo "<th width=10%>Прибуття</th>"; 
                                        echo "<th width=15%>В шляху</th>"; 
                                        echo "<th width=25%>Місця</th>";  
                                        echo "</tr>";

            foreach($ll as $key => $element) 
            {
                //echo $key . " - " . $element."<br />";
                if (is_array($element))
                {
                    for ($i=0; $i < count($element); $i++) 
                    { 


                        $el = $element[$i];
                        if((strtotime($el['otpr']) >= strtotime($timefrom)) && (strtotime($el['otpr']) <= strtotime($timeto)))
                        {
                            
                            if($placetype == 0)
                            {
                                
                                //print_r($el);
                                //echo $el['date']."-".$el['train'][0]." - ".$el['from'][0]." - ".$el['to'][0]." - ".$el['otpr']." - ".$el['prib']." ".$el['vputi']." квитки:".$el['l'].",".$el['k'].",".$el['p'].",".$el['o']."<br>";
                                $mest = intval($el['l']) + intval($el['k']) + intval($el['p']) + intval($el['o']);
                                $imest = $imest + $mest; 
                                if($mest>0)
                                {
                                    echo "<tr>";
                                    echo "<td>" . $el['train'][0] . "</td>"; 
                                    echo "<td>" . $el['from'][0] ." - ". $el['to'][0] . "</td>"; 
                                    echo "<td>" . $el['otpr'] . "</td>"; 
                                    echo "<td>" . $el['prib'] . "</td>"; 
                                    echo "<td>" . date('H:i', strtotime(str_replace("м.", "", str_replace("ч.", ":", $el['vputi'])))) . "</td>"; 
                                    echo "<td> <a class=\"tooltip\" href=\"http://www.pz.gov.ua/rezerv/?lid=1&mid=31\" target=\"_blank\">Люкс: ".$el['l']." <br>Купе: ".$el['k']." <br>Плацкарт: ".$el['p']." <br>Общий: ".$el['o'] . "</a></td>"; 
                                    echo "</tr>"; 
                                }
                            }
                            elseif($placetype == 1)
                            {
                                $mest = intval($el['l']);
                                $imest = $imest + $mest;  
                                if($mest>0)
                                {
                                    echo "<tr>";
                                    echo "<td>" . $el['train'][0] . "</td>"; 
                                    echo "<td>" . $el['from'][0] ." - ". $el['to'][0] . "</td>"; 
                                    echo "<td>" . $el['otpr'] . "</td>"; 
                                    echo "<td>" . $el['prib'] . "</td>"; 
                                    echo "<td>" . date('H:i', strtotime(str_replace("м.", "", str_replace("ч.", ":", $el['vputi'])))) . "</td>"; 
                                    echo "<td> <a class=\"tooltip\" href=\"http://www.pz.gov.ua/rezerv/?lid=1&mid=31\" target=\"_blank\">Люкс: ".$el['l']."</a></td>"; 
                                    echo "</tr>"; 
                                }
                            }
                            elseif($placetype == 2)
                            {
                                $mest = intval($el['k']);
                                $imest = $imest + $mest;  
                                if($mest>0)
                                {
                                    echo "<tr>";
                                    echo "<td>" . $el['train'][0] . "</td>"; 
                                    echo "<td>" . $el['from'][0] ." - ". $el['to'][0] . "</td>"; 
                                    echo "<td>" . $el['otpr'] . "</td>"; 
                                    echo "<td>" . $el['prib'] . "</td>"; 
                                    echo "<td>" . date('H:i', strtotime(str_replace("м.", "", str_replace("ч.", ":", $el['vputi'])))) . "</td>"; 
                                    echo "<td> <a class=\"tooltip\" href=\"http://www.pz.gov.ua/rezerv/?lid=1&mid=31\" target=\"_blank\">Купе: ".$el['k']."</a></td>"; 
                                    echo "</tr>";
                                }
                            }
                            elseif($placetype == 3)
                            {
                                $mest = intval($el['p']);
                                $imest = $imest + $mest;  
                                if($mest>0)
                                {
                                    echo "<tr>";
                                    echo "<td>" . $el['train'][0] . "</td>"; 
                                    echo "<td>" . $el['from'][0] ." - ". $el['to'][0] . "</td>"; 
                                    echo "<td>" . $el['otpr'] . "</td>"; 
                                    echo "<td>" . $el['prib'] . "</td>"; 
                                    echo "<td>" . date('H:i', strtotime(str_replace("м.", "", str_replace("ч.", ":", $el['vputi'])))) . "</td>"; 
                                    echo "<td> <a class=\"tooltip\" href=\"http://www.pz.gov.ua/rezerv/?lid=1&mid=31\" target=\"_blank\">Плацкарт: ".$el['p']."</a></td>"; 
                                    echo "</tr>";
                                }
                            }
                            elseif($placetype == 4)
                            {
                                $mest = intval($el['o']);
                                $imest = $imest + $mest;  
                                if($mest>0)
                                {
                                    echo "<tr>";
                                    echo "<td>" . $el['train'][0] . "</td>"; 
                                    echo "<td>" . $el['from'][0] ." - ". $el['to'][0] . "</td>"; 
                                    echo "<td>" . $el['otpr'] . "</td>"; 
                                    echo "<td>" . $el['prib'] . "</td>"; 
                                    echo "<td>" . date('H:i', strtotime(str_replace("м.", "", str_replace("ч.", ":", $el['vputi'])))) . "</td>"; 
                                    echo "<td> <a class=\"tooltip\" href=\"http://www.pz.gov.ua/rezerv/?lid=1&mid=31\" target=\"_blank\">Общих: ".$el['o']."</a></td>"; 
                                    echo "</tr>";
                                }
                            }
                        }
                       
                    }
                     if($imest == 0)
                     {
                        $index = 0;
                echo "<div id=\"infoblock\"><p id=\"infomsg\">На вказаний час ".$places[$placetype]." місць не знайдено</p>";
                echo "<input type=\"button\" id=\"getAuth\" class=\"get\" value=\"Повідомити, коли будуть місця\"/></div>";
                     }

                }
            }
        }
        echo "<script src=\"js/sorttable.js\"></script>";
        mysql_query("INSERT INTO `transactions`(`rout_direction`, `rout_date`, `rout_time`, `rout_places`, `is_found`, `date`) VALUES ('$station_name','$date','$timefrom-$timeto','".$places[$placetype]."', $index, Now())", $con);
        //echo $file=$_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF'];
        //echo $output = shell_exec("");

?>