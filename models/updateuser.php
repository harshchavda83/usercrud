<?php require_once("../db/config.php");

$response = array();

if(isset($_POST['submit'])){
    $user_id = $_POST["txt_order_id"];
    $firstname = $_POST["txt_fname"];
    $lastname = $_POST["txt_lname"];
    $user_email = $_POST["txt_email"];
    $contact = $_POST["txt_contact"];
    $user_status = "1";
    $is_deleted = "0";

    $mysqli = new mysqli($servername, $username, $password, $dbname);
if (!$mysqli) {
    die("Connection failed: " . mysqli_connect_error());
} 

//update query init

$result = $mysqli->query(" UPDATE usercrud1table SET firstname='$firstname', lastname='$lastname', user_email='$user_email', contact='$contact' WHERE user_id=$user_id ");


if($result != null){ 
    $response["message"] = "User record saved ";
    $response["status"] = 200;

} else{
    $response["message"] = "User record is not saved";
    $response["status"] = 500;

}

$mysqli->close();
echo json_encode($response);


}

?>