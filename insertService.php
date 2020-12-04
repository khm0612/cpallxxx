<?php
header("Content-Type:application/json");
include('dbCon.php');

insert_customer();

function insert_customer()
{
   global $con;
   $data = json_decode(file_get_contents('php://input'), true);
   print_r($data);

   $customer_Name = $data["name"];
   $customer_price = $data["price"];



   $query = "INSERT INTO datapeaw SET          
        name ='" . $customer_Name . "', 
        price ='" . $customer_price . "'";

   // echo $query;

   $result = mysqli_query($con, $query) or die($con->error);
}
if (mysqli_affected_rows($con)) {
   $response = array(
      'status' => 1,
      'status_message' => 'customer Added Successfully.'
   );
} else {
   $response = array(
      'status' => 0,
      'status_message' => 'customer Addition Failed.'
   );
}
print_r($response);