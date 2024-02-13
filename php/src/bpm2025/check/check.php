<?php

include_once '../utils/connDB.php';

$conn = getConnection();

$logfilename = "log.txt";

// For developlment environment, this vars are overrided  
//  with the values in docker-compose.yaml

if (array_key_exists('LOG_FILENAME', $_ENV)) {
	$logfilename = $_ENV["LOG_FILENAME"];   
}

$logfile = dirname(__FILE__)."/../".$logfilename;

// include_once 'apiRedsys.php';

$firstname = $_REQUEST['name'];
$lastname = $_REQUEST['lastName'];
$email = $_REQUEST['email'];
$gender = $_REQUEST['gender'];
$organization = $_REQUEST['organization'];

$address1 = $_REQUEST['address1'];
$address2 = $_REQUEST['address2'];
$city = $_REQUEST['city'];
$postal = $_REQUEST['postal'];
$country = $_REQUEST['country'];
$fa = $_REQUEST['fa'];
$paper = $_REQUEST['paper'];

$package = $_REQUEST['package'];

echo "Firstname: $firstname <br>";
echo "Lastname: $lastname <br>";
echo "Email: $email <br>";
echo "Gender: $gender <br>";
echo "Organization: $organization <br>";

echo "Address1: $address1 <br>";
echo "Address2: $address2 <br>";
echo "City: $city <br>";
echo "Postal: $postal <br>";
echo "Country: $country <br>";
echo "FA: $fa <br>";

include_once '../data.php';
$amount = $packages_price[$package];

if(array_key_exists($package, $packages_price)) {
	$amount = $packages_price[$package];
  $log  = "-------------------------".PHP_EOL.
  "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
  "Amount: ".$amount.PHP_EOL.
  "-------------------------".PHP_EOL;
  file_put_contents($logfile, $log, FILE_APPEND);
} else {
  header("Location: /bpm2025/failedRegistration/index.html?code=350");
	exit();
}

mysqli_set_charset($conn, 'utf8');

//$fuc = "097460992";
//$terminal = "001";
//$moneda = '978';
//$url = 'https://rociogoni14.github.io/2023.djangocon.eu/index.html';
//$urlOK = 'https://institucional.us.es/icsoc2022/check/DDBBload.php';
//$urlKO = 'https://institucional.us.es/icsoc2022/failRegistration';
//$id = rand(1, 100000000);

//$myObj = new RedsysAPI;
//$myObj->setParameter("DS_MERCHANT_AMOUNT",$amount*100);
//$myObj->setParameter("DS_MERCHANT_ORDER",$id);
//$myObj->setParameter("DS_MERCHANT_MERCHANTCODE",$fuc); #
//$myObj->setParameter("DS_MERCHANT_CURRENCY",$moneda); #
//$myObj->setParameter("DS_MERCHANT_CUSTOMER_MAIL",$email); #
//$myObj->setParameter("DS_MERCHANT_TERMINAL",$terminal); #
//$myObj->setParameter("DS_MERCHANT_MERCHANTURL",$url); #
//$myObj->setParameter("DS_MERCHANT_URLOK",$urlOK); #
//$myObj->setParameter("DS_MERCHANT_URLKO",$urlKO); #

//$params = $myObj->createMerchantParameters();

//$claveModuloAdmin = 'I/HA7gCKDQbIWrrePdSvKENPd09Ek7p2';
//$signature = $myObj->createMerchantSignature($claveModuloAdmin);

$email = mysqli_real_escape_string($conn, $email);
$firstname = mysqli_real_escape_string($conn, $firstname);
$lastname = mysqli_real_escape_string($conn, $lastname);
$gender = mysqli_real_escape_string($conn, $gender);
$organization = mysqli_real_escape_string($conn, $organization);
$address1 = mysqli_real_escape_string($conn, $address1);
$address2 = mysqli_real_escape_string($conn, $address2);
$city = mysqli_real_escape_string($conn, $city);
$postal = mysqli_real_escape_string($conn, $postal);
$country = mysqli_real_escape_string($conn, $country);
$paper = mysqli_real_escape_string($conn, $paper);
$package = mysqli_real_escape_string($conn, $package);
$amount = mysqli_real_escape_string($conn, $amount);


if( !function_exists('random_bytes') )
{
    function random_bytes($length = 6)
    {
        $characters = '0123456789';
        $characters_length = strlen($characters);
        $output = '';
        for ($i = 0; $i < $length; $i++)
            $output .= $characters[rand(0, $characters_length - 1)];

        return $output;
    }
}

$bytes = random_bytes(6);
$userId = (bin2hex($bytes));



$sql = "INSERT INTO participantes (id, email, first_name, last_name, gender, organization_name, address_line_1, address_line_2, city, postal_code, country, food_allergies, conftool_id, program_type, amount, accepted_conditions) VALUES 
('$userId', '$email', '$firstname','$lastname', '$gender', '$organization', '$address1', '$address2', '$city', '$postal', '$country', '$fa', '$paper', '$package', '$amount', 'YES')";
$stmt = $conn->prepare($sql);

echo "SQL Query: " . $sql . "<br>";

//Something to write to txt log
$log  = "-------------------------".PHP_EOL.
        "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
        "Query: ".$sql.PHP_EOL.
        "-------------------------".PHP_EOL;
file_put_contents($logfile, $log, FILE_APPEND);

if ( false===$stmt ) {
  $log  ="ERROR: SQL from ".$_SERVER['REMOTE_ADDR']." prepare() failed: " . htmlspecialchars($conn->error);
  file_put_contents($logfile, $log, FILE_APPEND);
  echo "Error en la preparación de la consulta: " . htmlspecialchars($conn->error);
  echo "<pre>";
  echo "Log file: $logfile\n\n";
  echo "Log content:\n";
  readfile($logfile);
  echo "</pre>";
  // header("Location: /icsoc2022/failedRegistration/index.html?code=360");
  die();
}

$result = $stmt->execute();

if ( false===$result ) {
  $log  ="ERROR: SQL from ".$_SERVER['REMOTE_ADDR']." execute() failed: " . htmlspecialchars($conn->error);
  file_put_contents($logfile, $log, FILE_APPEND);
  echo "Error en la preparación de la consulta: " . htmlspecialchars($conn->error);
  echo "<pre>";
  echo "Log file: $logfile\n\n";
  echo "Log content:\n";
  readfile($logfile);
  echo "</pre>";

  //header("Location: /icsoc2022/failedRegistration/index.html?code=370");
  die();
}

$affectedRows = $stmt->affected_rows;

//Something to write to txt log
$log  = "-------------------------".PHP_EOL.
        "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
        "Attempt: ".$result.PHP_EOL.
        "Query: ".$sql.PHP_EOL.
        "Affected Rows: ".$affectedRows.PHP_EOL.
        "-------------------------".PHP_EOL;

  if($affectedRows != 1)
         $log = $log."===========================".PHP_EOL.
               "WARNING: AFFECTED ROWS != 1: ".$affectedRows.PHP_EOL.
               "===========================".PHP_EOL;

//Save string to log, use FILE_APPEND to append.
file_put_contents($logfile, $log, FILE_APPEND);

mysqli_close($conn);
header("Location: https://rociogoni14.github.io/2023.djangocon.eu/index.html");
exit();


?>

<!DOCTYPE html>
<html>
 <head>
 </head>
<!-- Automated submit for production --> 
	<body style='display:none'> 
<!-- -->

<!-- Manual submit for development
  <body>
-->

  <!-- PPRODUCCION -->
     <!--<form id='payForm' action="https://sis.redsys.es/sis/realizarPago" method="POST" target="_self"> -->
  <!-- -->
  <!-- PRE-PPRODUCCION 
     <form id='payForm' action="https://sis-t.redsys.es:25443/sis/realizarPago" method="POST" target="_self"> 
   -->

		<!--<input type="text" name="Ds_SignatureVersion" value="HMAC_SHA256_V1"/>

		<input type="text" name="Ds_MerchantParameters" value="<?php echo $params;?>" />

		<input type="text" name="Ds_Signature" 	value="<?php echo $signature;?>"/>

		<input type="submit"  value="Realizar Pago"/>-->
		<!--<script type="text/javascript">
    		 Automated submit for prodction 
			document.getElementById('payForm').submit();
		</script>
		
		</form> --> 
	<p>Probando a ver si funciona</p>
</body>
</html>
