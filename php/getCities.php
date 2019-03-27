<?php 
    $jsonText=shell_exec('../IATAOrgCalls/getCities.sh');

    $text = strstr($jsonText, '{'); 
    $json = json_decode($text, true); 

    $output = ''; 

     foreach($json['response']['airports_by_cities'] as $object)
        $output.= '<option>'. $object['name'] . ', ' . $object['country_name'] . ' - ' . $object['code'].'</option>'; 

    echo $output;
 ?>   

