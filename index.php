<html>
 <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Best Price Flights</title>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="main.js"></script>
 </head>
 <body>
 
<?php
  $json = getFlights();
  $output = "<div class = 'offers'>"; 
      $offerCount=1; 
      foreach($json['data'] as $object){ 
          #offer class
          $output .= "<div class = 'offer'>";
              $output .= "<div id='IDPrice'><h2>Offer # ".$offerCount++ ."<h2>";
              $output .= "<h4>ID: ".$object['id']."<h4>"; 
              $output .= "<h4>Price: $".$object['offerItems'][0]['price']['total']."</h4></div>";
                  $segCount = 1; 
                  foreach($object['offerItems'][0]['services'][0]['segments'] as $segment){
                      $output .="<h3>Flight Segment ".$segCount++ ."</h3>";
                      $output .= "<ul>";
                          $output .= "<li class='carrier'><h5>".$json['dictionaries']['carriers'][$segment['flightSegment']['carrierCode']]; 
                          $output .=" operated by ".$json['dictionaries']['carriers'][$segment['flightSegment']['operating']['carrierCode']]."</h5></li>";
                          $output .="<li><h6> - flight number ".$segment['flightSegment']['number']."</h6></li>";
                          $output .= "<li class='airport'><h5>Departs from ".$json['dictionaries']['locations'][$segment['flightSegment']['departure']['iataCode']]['detailedName']; 
                          $output .= " - terminal ".$segment['flightSegment']['departure']['terminal']."</h6></li>";
                          $dptTime = date_create($segment['flightSegment']['departure']['at']);  
                          $output .= "<li><h6>" .date_format($dptTime, 'F jS') ."</h6></li>"; 
                          $output .= "<li><h6>" .date_format($dptTime, 'g:i A') ."</h6></li>"; 
                          $output .= "<li class='airport'><h5>Arrives at ".$json['dictionaries']['locations'][$segment['flightSegment']['arrival']['iataCode']]['detailedName'];
                          $output .= " - terminal ".$segment['flightSegment']['arrival']['terminal'] ."</h5></li>";
                          $arvlTm = date_create($segment['flightSegment']['arrival']['at']);
                          $output .= "<li><h6>" .date_format($arvlTm, 'F jS ') ."</h6></li>";
                          $output .= "<li><h6>" .date_format($arvlTm, 'g:i A') ."</h6></li>";  
                          $output .="<li><h5> Ticket Availability</li></h5>";
                          if($segment['pricingDetailPerAdult']['availability'] != null){
                              $output .= "<li>".$segment['pricingDetailPerAdult']['availability']." adult tickets left in " .$segment['pricingDetailPerAdult']['travelClass']." class.</li>";
                          }
                          if($segment['pricingDetailPerChild']['availability'] != null){
                              $output .= "<li>".$segment['pricingDetailPerChild']['availability']." child tickets left in" .$segment['pricingDetailPerChild']['travelClass'] ."class.</li>";
                          }
                          if($segment['pricingDetailPerInfant']['availability']!=null){
                              $output .= "<li>".$segment['pricingDetailPerInfant']['availability']." infant tickets left in ".$segment['pricingDetailPerInfant']['travelClass']." class.</li>";
                          }
                          if($segment['pricingDetailPerSenior']['availability']!=null){
                              $output .= "<li>".$segment['pricingDetailPerSenior']['availability']." senior tickets left in ".$segment['pricingDetailPerSenior']['travelClass']." class.</li>";
                          }
                      $output .="</ul>"; 
                  }
              $output .="</div>"; 
      }
  $output.="</div>"; 
  echo $output; 

  //functions for populating the page with the flights json
  function getFlights(){
    return json_decode(shell_exec("bash AmadeusCalls/getFlights.sh " .getToken()),true);   
  }

  //call bash function to get token and pull the token out of it. 
  function getToken(){
    $tokenJson = json_decode(shell_exec("bash AmadeusCalls/getToken.sh"),true);  
    $token = null; 
    foreach ($tokenJson as $key => $value){
      if($key == "access_token")
        return $value; 
    }
  }
?> 
 </body>
</html>




