<?php

require "web_dbconnect.php";

$option = $_POST["option"];


//$option = '1';

switch($option){
    case '1' : load_partner() ; break;
    case '2' : load_acc_status($conn) ; break;
    case '3' : load_payment_term() ; break;
    case '4' : load_category() ; break;
    case '5' : load_selected_postcode(); break;
    case '6' : load_payment_amt(); break;
    case '7' : load_renewal_date(); break;
    case '8' : load_building($conn); break;
    case '9' : load_location($conn); break;
    case '10' : load_altitude(); break;
    case '11' : load_location2(); break;
    case '12' : load_building2(); break;
    case '13' : reset_password(); break;
    case '14' : load_building3(); break;
    case '15' : load_building4(); break;
    case '16' : load_member(); break;
}

function load_partner() {
    $type = $_POST["type"];
    $partner = $_POST["partner"];
  //  $type = '';
    if($type == ''){
        $query = "select a.ID , a.name from partner a , partner_acc b where a.ID = b.partner_id and b.recruit_by = '$partner'";
        $result = mysql_query($query);
        $text = '<select class="form-control" size="8">';
        while($row = mysql_fetch_array($result)){
            $text = $text . ' <option value='.$row["ID"].'> '.$row['name'].' </option>';
        }
        $text = $text.' </select>';
                       
    }
    
    echo $text;
}

function load_acc_status($conn) {
  //  $type = $_POST["type"];
  //  $type = '';
    if($type == ''){
        $query = "select ID , name , special_value from partner_status where module = 'Acc Status'";
        $result = mysqli_query($conn , $query);
        $text = '<select class="w3-select w3-border"> <option value="X">Select Acc Status</option>';
        while($row = mysqli_fetch_assoc($result)){
            $text = $text . ' <option value='.$row["special_value"].'> '.$row['name'].' </option>';
        }
        $text = $text.' </select>';
                       
    }
    
    echo $text;
}

function load_payment_term() {
  //  $type = $_POST["type"];
    $type = '';
    if($type == ''){
        $query = "select ID , name , special_value from partner_status where module = 'Acc Payment'";
        $result = mysql_query($query);
        $text = '<select class="w3-select w3-border"><option value="none">Select Payment Type</option> ';
        while($row = mysql_fetch_array($result)){
            $text = $text . ' <option value='.$row["ID"].'> '.$row['name'].' </option>';
        }
        $text = $text.' </select>';
                       
    }
    
    echo $text;
}

function load_category() {
  //  $type = $_POST["type"];
  //  $type = '';
    if($type == ''){
        $query = "select ID , name  from item_category order by name";
        $result = mysql_query($query);
        $text = '<select class="w3-select w3-border"> <option value="none">Select Category Type</option>';
        while($row = mysql_fetch_array($result)){
            $text = $text . ' <option value='.$row["ID"].'> '.$row['name'].' </option>';
        }
        $text = $text.' </select>';
                       
    }
    
    echo $text;
}

function load_selected_postcode() {
    $code = $_POST["code"];
    $state = $_POST["state"];
  
        $query = "select ID , postal_code  from postcode where state = '$state'";
     //   display($query);
        $result = mysql_query($query);
        $text = '<select class="w3-select w3-border"> <option value="none" disabled>Select Postcode</option>';
        while($row = mysql_fetch_array($result)){
            if($row["ID"] == $code){
               $text = $text . ' <option value='.$row["ID"].' selected> '.$row['postal_code'].' </option>'; 
            }
            else {
               $text = $text . ' <option value='.$row["ID"].'> '.$row['postal_code'].' </option>'; 
            }
            
        }
        $text = $text.' </select>';
                       
 
    echo $text;
}

function load_payment_amt() {
    $term = $_POST["term"];
    $query = "select special_value from partner_status where ID = '$term'";
   // display($query);
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    echo $row["special_value"];
    
}

function load_renewal_date($conn) {
    $term = $_POST["term"];
    $query = "select special_value from partner_status where name = '$term' and module = 'Acc Duration'";
    $result = mysqli_query($conn , $query);
    $row = mysqli_fetch_assoc($result);
    $duration = $row["special_value"];
    
    $query = "SELECT DATE_ADD(date(current_timestamp()), INTERVAL '$duration' MONTH) AS dates";
   // display($query);
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    
    echo $row["dates"];
}

function load_building($conn) {
    $code = $_POST["code"];
    
  
        $query = "select ids , name  from postcode_building where location = '$code'";
     //   display($query);
        $result = mysqli_query($conn , $query);
        $text = '<select class="w3-select w3-border"> <option value="none" >Select Building</option>';
        while($row = mysqli_fetch_assoc($result)){
               $text = $text . ' <option value='.$row["ids"].'> '.$row['name'].' </option>'; 
            }
        $text = $text.' </select>';
                       
 
    echo $text;
}


function load_building3() {
    $code = $_POST["code"];
    
  
        $query = "select ids , name  from postcode_building where location = '$code'";
     //   display($query);
        $result = mysql_query($query);
        $text = '<select class="w3-select w3-border" size="8"><option value="new" >New Building</option> ';
        while($row = mysql_fetch_array($result)){
               $text = $text . ' <option value='.$row["ids"].'> '.$row['name'].' </option>'; 
            }
        $text = $text.' </select>';
                       
 
    echo $text;
}

function load_location($conn) {
    $code = $_POST["code"];
    
  
        $query = "select ids , name  from postcode_location where postcode_id = '$code'";
     //   display($query);
        $result = mysqli_query($conn , $query);
        $text = '<select class="w3-select w3-border"> <option value="none" >Select Location</option>';
        while($row = mysqli_fetch_assoc($result)){
               $text = $text . ' <option value='.$row["ids"].'> '.$row['name'].' </option>'; 
            }
        $text = $text.' </select>';
                       
 
    echo $text;
}

function load_altitude() {
    $code = $_POST["code"];
    $query = "select * from postcode_building where ids = '$code'";
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
    echo $row["longitude"]."*".$row["latitude"];
}

function load_location2() {
    $code = $_POST["code"];
    $area = $_POST["area"];
    
  
        $query = "select ids , name  from postcode_location where postcode_id = '$code'";
     //   display($query);
        $result = mysql_query($query);
        $text = '<select class="w3-select w3-border"> <option value="none" >Select Location</option>';
        while($row = mysql_fetch_array($result)){
              if($row["ids"] == $area){
               $text = $text . ' <option value='.$row["ids"].' selected> '.$row['name'].' </option>'; 
            }
            else {
               $text = $text . ' <option value='.$row["ids"].'> '.$row['name'].' </option>'; 
            }
            }
        $text = $text.' </select>';
                       
 
    echo $text;
}

function load_building2() {
    $code = $_POST["code"];
    $building = $_POST["building"];
    
  
        $query = "select ids , name  from postcode_building where location = '$code'";
     //   display($query);
        $result = mysql_query($query);
        $text = '<select class="w3-select w3-border"> <option value="none" >Select Building</option>';
        while($row = mysql_fetch_array($result)){
            if($row["ids"] == $building){
               $text = $text . ' <option value='.$row["ids"].' selected> '.$row['name'].' </option>'; 
            }
            else {
               $text = $text . ' <option value='.$row["ids"].'> '.$row['name'].' </option>'; 
            }
            }
        $text = $text.' </select>';
                       
 
    echo $text;
}


function reset_password() {
    $partner_id = $_POST["partner"];
    $query = "update employee set password = '12345' where employee_id = '$partner_id'";
    $stat = insert_query($query , "Employee" , "Reset Password Failed");
    echo $stat;
}

function load_building4() {
    $code = $_POST["code"];
    $building = $_POST["building"];
    
  
        $query = "select ids , name  from postcode_building where location = '$code'";
     //   display($query);
        $result = mysql_query($query);
        $text = '<select class="w3-select w3-border" size="8"> <option value="new" >New Building</option>';
        while($row = mysql_fetch_array($result)){
            if($row["ids"] == $building){
               $text = $text . ' <option value='.$row["ids"].' selected> '.$row['name'].' </option>'; 
            }
            else {
               $text = $text . ' <option value='.$row["ids"].'> '.$row['name'].' </option>'; 
            }
        }
        $text = $text.' </select>';
                       
 
    echo $text;
}


function load_member() {
    
        $text = '<select class="w3-select w3-border"> <option value="none" >Select Member Status</option>
                 <option value="Y" >Member</option><option value="N" >Non-Member</option>
                 </select>';
                       
 
    echo $text;
}



?>