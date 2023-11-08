<?php


include_once '../utils/connDB.php';
$conn = getConnection();

mysqli_set_charset($conn, 'utf8');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$queryAmount = "SELECT ID FROM REGISTRYDATA WHERE PAID = 'YES'";

$resultMoney = $conn->query($queryAmount);

while($result = $resultMoney->fetch_assoc()){
    $array[] = $result['ID'];
}

echo '<h1>List of paid invoices</h1>';

for($i=0; $i< sizeof($array); $i++){

    echo '<a href="https://institucional.us.es/icsoc2022/check/invoice.php?id='.$array[$i].'">https://institucional.us.es/icsoc2022/check/invoice.php?id='.$array[$i].'</a><br><br>';
}


?>