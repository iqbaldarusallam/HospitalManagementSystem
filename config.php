<?php 
$server       = "localhost";
$username     = "root";
$password     = "";
$database     = "dbhospitalms";

$connection = mysqli_connect($server,$username,$password,$database);

if($connection == true){
}else{
    echo "Connection error";
    exit();
}
