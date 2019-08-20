<?php
ini_set("display_errors",1);
session_start();
require_once "config.php";
$resp = null;
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$pw = md5($_POST["password"]);
$sql = "INSERT INTO accounts(firstname , lastname , email , password )
    VALUES ('$fname' ,'$lname','$email' , '$pw')";
if ($link->query($sql) === true) { //if query is successful 
    echo 1;
} else { 
    echo "error : " . mysqli_error($link);
}
// exit;
$link->close(); //disconnect from db