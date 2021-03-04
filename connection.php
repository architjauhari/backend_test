<?php

$server="localhost";
$dbName="attnd";
$username="root";
$password="";

$link=  mysqli_connect($server,$username,$password,$dbName);
if(!$link){
  die("connection to this database failed due to" . mysqli_connect_error());
}
else{
  //echo "Connection successful";
}
?>
