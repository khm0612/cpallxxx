<?php
$con = mysqli_connect("localhost", "root", "", "peawkub");
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    die();
}//else echo "connected success";