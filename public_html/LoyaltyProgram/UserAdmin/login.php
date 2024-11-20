<?php

require "web_dbconnect.php";

$option = $_POST["option"];

switch($option) {
    case '1' : cs_login($conn); break;
    case '2' : technician_login($conn); break;
    case '3' : check_33013_passcode($conn); break;
    case '4' : store_login($conn); break;
    case '5' : purchasing_login($conn); break;
}

function cs_login($conn) {
    $username = $_POST["usrname"];
    $password = $_POST["psw"];
    
   // insert_to_temp_list($username , $password , "" , "notification_load.php");
    
    $query = "select IFNULL(count(*) , 0) AS found , outlet_id , employee_id , name from employee where employee_id = '$username' and password = '$password' ";
   // display($query);
    $result = mysqli_query($conn , $query);
    $row = mysqli_fetch_assoc($result);
    
    $text =  $row["found"]."*".$row["outlet_id"]."*".$row["employee_id"]."*";
    $name = get_partner_name($conn , $row["employee_id"]);
    echo $text.$name;
}

function get_partner_name($conn , $id){
    $query = "select name from partner where ID = '$id'";
   // display($query);
    $result = mysqli_query($conn , $query);
    $row = mysqli_fetch_assoc($result);
    return $row["name"];
}


function technician_login() {
    $username = $_POST["usrname"];
    $password = $_POST["psw"];
    
   // insert_to_temp_list($username , $password , "" , "notification_load.php");
    
    $query = "select IFNULL(count(*) , 0) AS found from menu1 where name = '$username' and password = '$password' and location = '30013' and  work_position_id in ( '33010' , '33012' , '33011')";
   // display($query);
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    echo $row["found"];
}


function store_login() {
    $username = $_POST["usrname"];
    $password = $_POST["psw"];
    
   // insert_to_temp_list($username , $password , "" , "notification_load.php");
    
    $query = "select IFNULL(count(*) , 0) AS found from menu1 where name = '$username' and password = '$password' and location = '30017' and  work_position_id in ( '33010' , '33012' , '33011')";
   // display($query);
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    echo $row["found"];
}

function purchasing_login() {
    $username = $_POST["usrname"];
    $password = $_POST["psw"];
    
   // insert_to_temp_list($username , $password , "" , "notification_load.php");
    
    $query = "select IFNULL(count(*) , 0) AS found from menu1 where name = '$username' and password = '$password' and location = '30018' and  work_position_id in ( '33010' , '33012' , '33011')";
   // display($query);
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    echo $row["found"];
}




function check_33013_passcode() {
    $user_id = $_POST["user_id"];
    $passcode = $_POST["passcode"];
    
   // insert_to_temp_list($username , $password , "" , "notification_load.php");
    
    $query = "select IFNULL(count(*) , 0) AS found from menu1 where ID = '$user_id' and passcode = '$passcode' ";
   // display($query);
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    echo $row["found"];
}




?>