<?php
$con = mysqli_connect("localhost", "root", "", "peawkub");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
} //else echo "connected success";
// Initiate curl session in a variable (resource)
$curl_handle = curl_init();

$url = "http://localhost/peawkub/getallService.php";

// Set the curl URL option3

curl_setopt($curl_handle, CURLOPT_URL, $url);

// This option will return data as a string instead of direct output
curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

// Execute curl & store data in a variable
$curl_data = curl_exec($curl_handle);

curl_close($curl_handle);

// Decode JSON into PHP array
$response_data = json_decode($curl_data);


foreach ((array) $response_data  as $sing) {
    echo "id: " . $sing->id;
    echo "<br />";
    echo "name: " . $sing->name;
    echo "<br />";
}
