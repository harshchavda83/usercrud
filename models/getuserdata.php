<?php require_once("../db/config.php");?>


<?php

$mysqli = new mysqli($servername, $username, $password, $dbname);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
} 

$user_id = $_REQUEST["id"];
$response = array();

$result = mysqli_query($mysqli, "SELECT * FROM `usercrud1table` WHERE user_id = $user_id");


if($result->num_rows > 0){

    $response["message"] = "Data Loaded";
    $response["status"] = "200";
    $response["data"] = $result->fetch_assoc();

}else{
    
    $response["message"] = "Data loading failed";
    $response["status"] = "500";

}

echo json_encode($response);

?>