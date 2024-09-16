<?php require_once("../db/config.php");?>

<?php


$mysqli = new mysqli($servername, $username, $password, $dbname);

if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
} 

$id = $_POST["id"];

$response = array();




$results = mysqli_query($mysqli, "DELETE FROM `usercrud1table` WHERE user_id=$id " );

if($results){

    $response["message"] = "User record deleted";
    $response["status"] = 200;

}else{
    
    $response["message"] = "User record delete failed";
    $response["status"] = 500;

}

echo json_encode($response);

?>