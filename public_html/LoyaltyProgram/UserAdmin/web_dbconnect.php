<?php

$servername = "sdb-76.hosting.stackcp.net";
$username = "customized_user";
$password = "custom1011####";
$dbname = "LoyaltyProgram-353037331fb6";
//mysql_set_charset('utf8');
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn , 'utf8');

function insert_query($conn , $query)
{
  // echo $query;
   if(!mysqli_query($conn , $query))
      {
        // $status = "Failed";
        // insertLog($table , $statement , mysql_errno());
         return 'N';
      }
      else {
          return 'Y';
      }
}


function display($statement)
{
  echo $statement."</br>";
}

function getRandomStringSha1($length = 32)
{
    $string = sha1(rand());
    $randomString = substr($string, 0, $length);
    return $randomString;
}


?>