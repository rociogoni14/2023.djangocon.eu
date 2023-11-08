<?php


function mylog($str){
    $stdout = fopen('php://stdout', 'w');
    fwrite($stdout, $str."\n");
    fclose($stdout);
}


function func(){

    $servername = "localhost";
    $username = "icsoc2022";
    $password = "Dm8QrVab";
    $database = 'icsoc2022';
    mylog("Connecting... ");
    echo "Connecting DB... <br/>";

    /*
        $servername = "localhost";
        $username = "bpm2020";
        $password = "XbJd8Jio";
        $database = 'bpm2020';


        $servername = "localhost";
        $username = "root";
        $password = "root";
        $database = 'mydb';
    */

    $conn = new mysqli($servername, $username, $password, $database);

    mysqli_set_charset($conn, 'utf8');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{
        mylog("Connected!");
        echo "Connected! <br/>";
    }

    $query = "SELECT ID FROM REGISTRYDATA";
    $result = mysqli_query($conn, $query);
    
    mylog("Result:".json_encode($result));


    if(empty($result)) {
        echo "Emtpy REGISTRYDATA, creating table<br/>";

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
            PACKAGE varchar(255) NOT NULL,
            PAID varchar(255),
            MERCODE BIGINT,
            AMOUNT int(11),
            PRIMARY KEY  (ID)
            )";
        $result = mysqli_query($conn, $query);
    }else{
        echo "REGISTRYDATA TABLE exists<br/>";
    }

    $query2 = "SELECT ID FROM AUTHORDATA";
    $result2 = mysqli_query($conn, $query2);

    if(empty($result2)) {
        echo "Emtpy AUTHORDATA, creating table";
        
        $query = "CREATE TABLE AUTHORDATA (
            ID int(11) AUTO_INCREMENT,
            IDUSER bigint(11) NOT NULL,
            IDPONENCIA varchar(255) NOT NULL,
            IDAUTOR varchar(255) NOT NULL,
            PAID varchar(255),
            MERCODE BIGINT,
            PRIMARY KEY  (ID)
            )";
        $result = mysqli_query($conn, $query);
    }else{
        echo "AUTHORDATA TABLE exists<br/>";
    }

    $sql = "SELECT GROUP_CONCAT(IDPONENCIA) FROM AUTHORDATA WHERE PAID = 'yes'";

    $result3 = $conn->query($sql);
    $userData = array();
        if ($result3->num_rows > 0) {
            // output data of each row
            while($row = $result3->fetch_assoc()) {
                $userData['AllUsers'][] = $row;
            }
            //echo json_encode($userData['AllUsers'][0]['GROUP_CONCAT(IDPONENCIA)']);
            echo "Author Data: ".json_encode($userData);
        }else{
            echo "Error getting author data";
        }

}
echo "<h3>DB Setup/Check</h3>";
func();
?>
