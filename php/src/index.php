<?php

include_once './icsoc2022/utils/connDB.php';

$conn = getConnection();

// select query
$sql = 'SELECT * FROM REGISTRYDATA';

if ($result = $conn->query($sql)) {
    header("Location: /icsoc2022/registration.html");
}else{
    header("Location: /icsoc2022/maintenance.html?code=313");
}
$conn->close();
exit();    
?>


