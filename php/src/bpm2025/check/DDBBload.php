<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/Exception.php';
require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';

include_once '../utils/connDB.php';
$conn = getConnection();

function mylog($str){


    $logfilename = "log.txt";

    // For developlment environment, this vars are overrided  
    //  with the values in docker-compose.yaml
    
    if (array_key_exists('LOG_FILENAME', $_ENV)) {
        $logfilename = $_ENV["LOG_FILENAME"];   
    }
    
    $logfile = dirname(__FILE__)."/../".$logfilename;

    $log  = "####################### DDBBload ###########################".PHP_EOL.
    "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
    $str.PHP_EOL.
    "####################################################################".PHP_EOL;
    file_put_contents($logfile, $log, FILE_APPEND);
}

require 'vendor/autoload.php';
include_once 'apiRedsys.php';

include_once "../data.php";

$sasa = ($_REQUEST['Ds_MerchantParameters']);
$decoded = base64_decode($sasa);
$data = json_decode($decoded, true);
$id = $data['Ds_Order'];
$amount = $data['Ds_Amount']/100;

mylog(json_encode($data,JSON_PRETTY_PRINT));

mysqli_set_charset($conn,'utf8');

$sqlData = "SELECT * FROM REGISTRYDATA WHERE MERCODE = ".$id;

$result = $conn->query($sqlData);

if ($result->num_rows < 1){
    mylog("WARNING: Query [".$sqlData."] returned ".$result->num_rows." rows!!");
    header( "Location: /icsoc2022/failRegistration" );
    die();
}

if ($result->num_rows > 1){
    mylog("WARNING: Query [".$sqlData."] returned MULTIPLE ROWS: ".$result->num_rows."!!");
    
}

$followingdata = $result->fetch_assoc();

if($amount != $packages_price[$followingdata['PACKAGE']]){
    mylog("WARNING: CHARGED AMOUNT FOR <".$followingdata['MERCODE']."> IS NOT CORRECT!: Charged Amount: <".$amount.">, Expected Amount: <".$packages_price[$followingdata['PACKAGE']].">");
}


/****  DEV LOG
   mylog(json_encode($followingdata,JSON_PRETTY_PRINT));
   mylog(json_encode($packages_price,JSON_PRETTY_PRINT));
**********************************************************/

if($amount != $packages_price[$followingdata['PACKAGE']]){
    mylog("WARNING: CHARGED AMOUNT FOR <".$followingdata['MERCODE']."> IS NOT CORRECT!: Charged Amount: <".$amount.">, Expected Amount: <".$packages_price[$followingdata['PACKAGE']].">");
}

$mail = new PHPMailer(TRUE);

try {
    $mail->isSMTP();
    $mail->Host = 'mail.us.es';
    $mail->SMTPAuth = TRUE;
    $mail->SMTPSecure = 'tls';
    $mail->Username = 'icsoc2022@us.es';
    $mail->Password = '[0ngr3s01CS0C';
    $mail->Port = 587;

    // Set the mail sender. 
    $mail->setFrom('icsoc2022@us.es');
    // Add a recipient. 
    $mail->addAddress($followingdata['EMAIL']);
    $mail->addBCC('pablofm@us.es');
    // Set the subject. 
    $mail->Subject = 'ICSOC 2022 Registration';
    // Set the mail message body. 
    $mail->Body = 'Dear '.$followingdata['FIRSTNAME'].',

   Thank you for registering for  ICSOC 2022, please find your registration record below:
   
   Email: '.$followingdata['EMAIL'].'
   First name: '.$followingdata['FIRSTNAME'].'
   Last Name: '.$followingdata['LASTNAME'].'
   Organitation: '.$followingdata['ORGANITATION'].'
   Address 1: '.$followingdata['ADDRESS1'].'
   Address 2: '.$followingdata['ADDRESS2'].'
   City: '.$followingdata['CITY'].'
   Postal Code: '.$followingdata['POSTALCODE'].'
   Country: '.$followingdata['COUNTRY'].'

   ---------------------------------------------------
   '.(($followingdata['PAPER']!='')? "Paper ID: ".$followingdata['PAPER'] :'') .'
   Registration Type: '.$packages_title[$followingdata['PACKAGE']].'
   Total amount: '.$amount.' euro

   ---------------------------------------------------

   We look forward to seeing you in Sevilla during ICSOC 2022! Please contact us if you have any questions at icsoc2022@us.es.
   
   You can find the invoice at: https://institucional.us.es/icsoc2022/check/invoice.php?id='.$followingdata['ID'].'
   
   The ICSOC 2022 Organization Team ';
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    // Finally send the mail. 
    $mail->send();
 }
 catch (Exception $e)
 {
    // PHPMailer exception. 
    mylog("PHPMailer ERROR Sending email : ".$e->errorMessage());    
    echo $e->errorMessage();
 }
 catch (\Exception $e)
 {
    // PHP exception (note the backslash to select the global namespace Exception class).
    mylog("PHP ERROR Sending email : ".$e->errorMessage());    
    echo $e->getMessage();
 }



$stmtAmount = $conn->prepare("UPDATE REGISTRYDATA SET AMOUNT = ".$amount." WHERE MERCODE = ".$id);

$stmtAmount->execute();

//DEV LOG: mylog("Updated Amount in RegistryData to ".$amount);


$sql = "UPDATE REGISTRYDATA SET PAID = 'Yes' WHERE MERCODE = ".$id;

if ($conn->query($sql) === TRUE) {
    mysqli_close($conn);
    //DEV LOG:  mylog("Updated PAID in RegistryData to YES");    
    header( "Location: https://institucional.us.es/icsoc2022/correct/" );

} else {
    mysqli_close($conn);
    mylog("ERROR EXECUTING SQL : ".$sql);    
    header( "Location: /icsoc2022/maintenance.html?code=331" );

}
exit ;

?>



