<?php

if ( ( (count($_GET) == 1) && isset($_GET['pass']))  && ($_GET['pass'] == "pomelo") ) {
    mylog("Good access",true);
}else{

    mylog("WRONG access: (URI: [".$_SERVER['REQUEST_URI']."])",true);
    header('HTTP/1.0 403 Forbidden');
    die();
}


include_once './connDB.php';

function mylog($str,$only_log = false){


    $logfilename = "log.txt";

    // For developlment environment, this vars are overrided  
    //  with the values in docker-compose.yaml
    
    if (array_key_exists('LOG_FILENAME', $_ENV)) {
        $logfilename = $_ENV["LOG_FILENAME"];   
    }
    
    $logfile = dirname(__FILE__)."/../".$logfilename;

    $log  = "User: ".$_SERVER['REMOTE_ADDR'].' - '.date("F j, Y, g:i a").PHP_EOL.
    "SETUP DB :".$str.PHP_EOL.
    "//////////////////////////////////////////////////////////////////".PHP_EOL;
    file_put_contents($logfile, $log, FILE_APPEND);
    if($only_log == false)
        echo $str."<br/>";
}


function func(){

    mylog("Connecting...");

    $conn = getConnection();

    mysqli_set_charset($conn, 'utf8');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        mylog("Connected!");
    }

    $query = "SELECT ID FROM REGISTRYDATA";
    $result = mysqli_query($conn, $query);

    if(empty($result)) {
        echo "REGISTRYDATA don't exist, creating table<br/>";

        $query = "CREATE TABLE REGISTRYDATA (
            ID varchar(12) NOT NULL,
            EMAIL varchar(255) NOT NULL,
            FIRSTNAME varchar(255) NOT NULL,
            LASTNAME varchar(255) NOT NULL,
            GENDER varchar(255) NOT NULL,
            ORGANITATION varchar(255) NOT NULL,
            ADDRESS1 varchar(255) NOT NULL,
            ADDRESS2 varchar(255),
            CITY varchar(255) NOT NULL,
            POSTALCODE varchar(20) NOT NULL,
            COUNTRY varchar(255) NOT NULL,
            FOODALLERGIES varchar(255),
            PACKAGE varchar(255) NOT NULL,
            PAID varchar(255),
            MERCODE BIGINT,
            AMOUNT int(11),
            PAPER varchar(20),
            TS TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY  (ID)
            )";
        $result = mysqli_query($conn, $query);
    }else{
        mylog("REGISTRYDATA TABLE exists");
    }

    $sql = "SELECT * FROM REGISTRYDATA";

    $result = $conn->query($sql);
    $registryData = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $userData['AllUsers'][] = $row;
        }

        //showing property
        echo '<table class="data-table">
                <tr class="data-heading">';  //initialize table tag
        while ($property = mysqli_fetch_field($result)) {
            echo '<td>' . $property->name . '</td>';  //get field name for header
            $all_property[] = $property->name;  //save those to array
        }
        echo '</tr>'; //end tr tag

        //showing all data
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            foreach ($all_property as $item) {
                echo '<td>' . $row[$item] . '</td>'; //get items using property value
            }
            echo '</tr>';
        }
        echo "</table>";

    }else{
        mylog("Empty Registry Table");
    }

}
echo "<h3>DB Setup/Check</h3>";
func();
?>
