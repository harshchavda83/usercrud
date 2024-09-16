<?php require_once("../db/config.php");

$response = array();

if(isset($_POST['submit'])){
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

// query init


$result = $mysqli->query("INSERT INTO usercrud1table(firstname,lastname,user_email,contact,user_status,is_deleted)VALUES('".$_POST['txt_fname']."','".$_POST['txt_lname']."','".$_POST['txt_email']."','".$_POST['txt_contact']."','1','0')");

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