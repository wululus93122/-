<?php
$server_name="localhost";
$user_name="root";
$password="12345";
$db_name="project_dashboard";

$conn=new mysqli($server_name,$user_name,$password,$db_name);
if($conn->connect_error){
    die("連線錯誤".$conn->connect_error);
}