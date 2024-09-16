<?php require_once("../db/config.php");

$response = array();

$mysqli = new mysqli($servername, $username, $password, $dbname);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
} 

$result = $mysqli->query("SELECT * FROM usercrud1table");

if($result->num_rows > 0){
    $count = 0;

    while($row = $result->fetch_assoc()){
        $response['data'][$count] = $row;
        $count++;
    }
}

$mysqli->close();
echo json_encode($response);

?>