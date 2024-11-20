<?php

require "web_dbconnect.php";

$option = $_POST["option"];

switch($option) {
    case "1" : check_phone(); break;
    case '2' : load_cust_phone($conn); break;
    case '3' : load_cust_acc_info(); break;
    case '4' : load_close_group_1($conn); break;
    case '5' : load_close_group_2($conn); break;
    case '6' : load_status_2(); break;
    case '7' : load_favorite_group_1(); break;
    case '8' : load_favorite_group_2(); break;
    case '9' : check_phone2(); break;
    case '10' : load_cust_acc_info2(); break;
    case '11' : load_member_group_1(); break;
    case '12' : load_member_group_2(); break;
}

function check_cgroup() {
    $cg = $_POST["cg"];
    $query = "select IFNULL(count(*) , 0) As found from partner where ID = '$cg' and close_group = 'Y'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    echo $row["found"]; 
}

function check_phone() {
    $phone = $_POST["phone"];
    $query = "select IFNULL(count(*) , 0) As found from customer_registration where mobile_number = '$phone'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    echo $row["found"];
}

function check_phone2() {
    $phone = $_POST["phone"];
    $partner = $_POST["partner"];
 //   $status = check_favorite($phone , $partner);
    $query = "select IFNULL(count(*) , 0) As found , name , ID from customer_registration where mobile_number = '$phone'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    $text =  $row["found"]."*".$row["name"];
    $status = check_favorite($row["ID"] , $partner);
    $text = $text ."*".$status;
    echo $text;
}

function check_favorite($user , $partner) {
    $query = "select IFNULL(count(*) , 0) As found from customer_favorite_partner where user_id = '$user' and partner_id = '$partner'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    return $row["found"];
}

function load_cust_phone($conn) {
   // $type = $_POST["type"];
    $partner = $_POST["partner"];
  //  $type = '';
    if($type == ''){
        $query = "select a.ids , b.name from customer_favorite_partner a , customer_registration b where a.user_id = b.ID and a.partner_id = '$partner' order by b.name";
        $result = mysqli_query($conn , $query);
        $text = '<select class="form-control" size="8">';
        while($row = mysqli_fetch_assoc($result)){
            $text = $text . ' <option value='.$row["ids"].'> '.$row['name'].' </option>';
        }
        $text = $text.' </select>';
                       
    }
    
    echo $text;
}

function load_cust_acc_info(){
    $ids = $_POST["ids"];
    $query = "select a.user_id , a.partner_id , a.member ,  a.favorite , b.name , a.close_group , a.status , b.mobile_number , a.add_by_partner from customer_favorite_partner a , customer_registration b where a.user_id = b.ID and a.ids = '$ids' order by b.name";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    $text =  $row["favorite"]."*".$row["name"]."*".$row["close_group"]."*".$row["status"]."*".$row["mobile_number"]."*".$row["add_by_partner"]."*".$row["member"]."*";
    $user_id = $row["user_id"];
    $partner_id = $row["partner_id"];
    
    $query = "select value1 from special_list where user_id = '$user_id' and partner_id = '$partner_id' and type = '10004'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    
    echo $text . $row["value1"];
}

function load_cust_acc_info2(){
    $partner = $_POST["partner"];
    $mobile = $_POST["mobile"];
    $query = "select a.user_id , a.partner_id , a.ids , a.member , a.favorite , b.name , a.close_group , a.status , b.mobile_number , a.add_by_partner from customer_favorite_partner a , customer_registration b where a.user_id = b.ID and a.partner_id = '$partner' and b.mobile_number = '$mobile'";
  //  display($query);
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    $text =  $row["favorite"]."*".$row["name"]."*".$row["close_group"]."*".$row["status"]."*".$row["mobile_number"]."*".$row["add_by_partner"]."*".$row["ids"]."*".$row["member"]."*";
    
    $user_id = $row["user_id"];
    $partner_id = $row["partner_id"];
    
    $query = "select value1 from special_list where user_id = '$user_id' and partner_id = '$partner_id' and type = '10004'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    
    echo $text . $row["value1"];
}


function load_close_group_1($conn) {
 $id = $_POST["partner"];
 $found = check_close_group($conn , $id);
 if($found > 0){
 $text = '   <select class="w3-select w3-border">
    <option value="X" >Select Status</option>
    <option value="Y" >Yes</option>
    <option value="N" >No</option>
    </select> ';
 }
 else {
    $text = '   <select class="w3-select w3-border">
    <option value="X" >Not Close Group</option>
    </select> ';
 }
 echo $text;    
}

function check_close_group($conn , $id){
   // $query = "select IFNULL(count(*) , 0) AS found from partner_acc where partner_id = '$id' and category = '80040'";
    $query = "select IFNULL(count(*) , 0) AS found from partner where ID = '$id' and close_group = 'Y'";
    $result = mysqli_query($conn , $query);
    $row = mysqli_fetch_assoc($result);
    return $row["found"];
}



function load_close_group_2() {
 $decision = $_POST["decision"];    
 $text = '   <select class="w3-select w3-border">
    <option value="X" >Select Status</option>';
 if($decision == 'Y'){
     $text = $text . '<option value="Y" selected >Yes</option>';
 }
 else {
     $text = $text . '<option value="Y">Yes</option>';
 }
 
  if($decision == 'N'){
     $text = $text . '<option value="N" selected >No</option>';
 }
 else {
     $text = $text . '<option value="N" >No</option>';
 }
    
$text = $text . '</select> ';
 echo $text;
}


function load_status_2() {
    $dec = $_POST["decision"];
  //  $type = '';
    if($type == ''){
        $query = "select ID , name , special_value from partner_status where module = 'Acc Status'";
        $result = mysql_query($query);
        $text = '<select class="w3-select w3-border"> <option value="X">Select Acc Status</option>';
        while($row = mysql_fetch_array($result)){
          if($row["special_value"] == $dec) {
              $text = $text . ' <option value='.$row["special_value"].' selected> '.$row['name'].' </option>';
          }
          else {
              $text = $text . ' <option value='.$row["special_value"].'> '.$row['name'].' </option>';
          }
            
        }
        $text = $text.' </select>';
                       
    }
    
    echo $text;
}


function load_member_group_1() {
 $text = '   <select class="w3-select w3-border">
    <option value="Y" >Yes</option>
    <option value="N" selected>No</option>
    </select> ';
 echo $text;    
}

function load_member_group_2() {
 $decision = trim($_POST["decision"]);  
 //display($decision);
 $text = '   <select class="w3-select w3-border">';
 if($decision == 'Y'){
     $text = $text . '<option value="Y" selected >Yes</option>';
 }
 else {
     $text = $text . '<option value="Y">Yes</option>';
 }
 
  if($decision == 'N'){
     $text = $text . '<option value="N" selected >No</option>';
 }
 else {
     $text = $text . '<option value="N" >No</option>';
 }
    
$text = $text . '</select> ';
 echo $text;
}



function load_favorite_group_1() {
 $text = '   <select class="w3-select w3-border">
    <option value="X" >Select Status</option>
    <option value="Y" >Yes</option>
    <option value="N" >No</option>
    </select> ';
 echo $text;    
}



function load_favorite_group_2() {
 $decision = $_POST["decision"];    
 $text = '   <select class="w3-select w3-border">
    <option value="X" >Select Favorite Status</option>';
 if($decision == 'Y'){
     $text = $text . '<option value="Y" selected >Yes</option>';
 }
 else {
     $text = $text . '<option value="Y">Yes</option>';
 }
 
  if($decision == 'N'){
     $text = $text . '<option value="N" selected >No</option>';
 }
 else {
     $text = $text . '<option value="N" >No</option>';
 }
    
$text = $text . '</select> ';
 echo $text;
}

?>


