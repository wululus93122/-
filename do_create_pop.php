<?php
require_once ("../db_connect.php");
date_default_timezone_set('Asia/Taipei');


if (!isset($_POST["name"]) || !isset($_POST["account"])||!isset($_POST["email"])||!isset($_POST["password"])||!isset($_POST["phone"])||!isset($_POST["birthday"])||!isset($_POST["ptex"])){
//    echo "請透過表單傳送資料，並確實填寫。";
    header("Location:member.php");
    exit();
}

$account=$_POST["account"];
$email=$_POST["email"];

$sql="SELECT member_account,member_email FROM member WHERE member_account='$account' OR member_email='$email' ";
$result=$conn->query($sql);
if($result->num_rows>0){
    echo "帳號已存在";

    exit();
}
$password=$_POST["password"];
$repassword=$_POST["repassword"];

if($password!==$repassword){
    echo "密碼不一致";
    exit();
}
$now=date('Y-m-d');
$stmt = $conn->prepare("INSERT INTO member(member_name,member_account,member_email,member_password,member_phone,member_birthday,member_gender,member_ex,member_create_date) VALUES(?,?,?,?,?,?,?,?,?)");
$stmt->bind_param('sssssssis',$name,$account,$email,$password,$phone,$birthday,$gender,$ex,$create_date);
$name=$_POST["name"];
$account=$_POST["account"];
$email=$_POST["email"];
$password=$_POST["password"];
$phone=$_POST["phone"];
$birthday=$_POST["birthday"];
$gender=$_POST["gender"];
$ex=$_POST["ptex"];
$create_date=$now;
$stmt->execute();

//$last_id=$conn->insert_id;
//echo "新會員 建立成功,編號為 $last_id";

$stmt->close();
$conn->close();


