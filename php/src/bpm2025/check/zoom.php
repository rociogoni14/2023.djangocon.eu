<?php

require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;

date_default_timezone_set('UTC');

$webId = $_REQUEST['id']; 

$currentTime = time();
$hoursToAdd = 2;
$secondsToAdd = $hoursToAdd * (60 * 60);
$newTime = $currentTime + $secondsToAdd;

$key = "Kw9qWcHPTu-0ZprA-6DBUQ";
$api_sec = 'BiySmAixK4qDXvQf568j0KWfRjKCm8dPO4xV';
$payload = array(
    "iss" => $key,
    "exp" => $newTime
);


$string = file_get_contents("zoom.json");
$json_a = json_decode($string, true);
$valid = false;

for($i=0; $i<sizeof($json_a); $i++){
    if($json_a[$i]["id"] == $webId){
        $sessionName = $json_a[$i]["topic"];
        $startTime =  $json_a[$i]["start_time"];
        $valid = true;
    }
}

$jwt = JWT::encode($payload, $api_sec);

$url = 'https://api.zoom.us/v2/metrics/webinars/'.$webId.'/participants';

$options = array(
    'http' => array(
        'method'  => 'GET',
        'header' => 'Authorization: Bearer '.$jwt
    )
);
$context  = stream_context_create($options);


function format_date($date){
    return date('Y-m-d H:i:s',strtotime($date));
    }

?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>  

<?php
    if($valid == true){
        $result = file_get_contents($url, false, $context);
        $decodedJson = json_decode($result, true);
        $startTime  = format_date($startTime);
        $list = $decodedJson["participants"];

        while ($decodedJson["next_page_token"]) {
            $url = 'https://api.zoom.us/v2/metrics/webinars/'.$webId.'/participants?next_page_token='.$decodedJson["next_page_token"];
            $result = file_get_contents($url, false, $context);
            $decodedJson = json_decode($result, true);
            $list = array_merge($list, $decodedJson["participants"]);
    
        }
        
?>
<div class="container-fluid">
    <img src="images/logo.png" alt="..." class="img-fluid" style="float:left">
    </div>
<div class="container">


    <h1><div class="text-center">BPM 2020 Zoom -  <?php echo ($sessionName);?></h1></div>
    </div> 
    <div class="container">
    <p><div class="text-center">Start date:  <?php echo $startTime ?><p> </div>
    </div>
<div class="container">

<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th cope="col">Participants</th>
        </tr>
    </thead>
    <?php
    $final_list = array();
        for($i=0; $i<sizeof($list); $i++){
            if (! array_key_exists("leave_time", $list[$i])) {
                array_push($final_list, $list[$i]["user_name"]);
            }
        }

    array_unique($final_list);  
    ?>
    
    <?php
    for($i=0; $i<sizeof($final_list); $i++){
    ?>

    <tbody>
        <tr>
            <th scope="row"><?php echo $i+1  ?>  </th>
            <td><?php echo $final_list[$i];?></td>
        
        </tr>
    </tbody>

    
    <?php  
        }
    ?>
</table>
</div>  


    <?php
        }else{

            echo "Error, no valid Zoom Id provided";
        }
    ?>
 </body>   
</html>