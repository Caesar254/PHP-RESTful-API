<?php

error_reporting(0);

$db_name = "movies_api";
$mysql_username = "root";
$mysql_pass = "";
$server_name = "127.0.0.1";

$con = mysqli_connect($server_name,$mysql_username,$mysql_pass,$db_name);

if(!$con){
    echo'{"message" :"Unable to connect"}';
    die();
}
// }else{
//     echo"Connected succssfully";
// }


?>