<?php
header("Content-Type:application/json");
if (isset($_GET['id']) && $_GET['id'] != "") {
    include('dbCon.php');
    $id = $_GET['id'];
    $sql = "SELECT * FROM datapeaw WHERE id= '$id'";
    //echo $sql;
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_array($result);
        $id = $row['id'];
        $name = $row['name'];
        $price = $row['price'];



        response(
            $id,
            $name,
            $price

        );
        mysqli_close($con);
    } else {
        response(NULL, NULL, 200, "No Record Found");
    }
} else {
    response(NULL, NULL, 400, "Invalid Request");
}

function response(
    $id,
    $name,
    $price


) {
    $response['id'] = $id;
    $response['name'] = $name;
    $response['price'] = $price;

    //$json_response = json_encode($response);
    $json_response = json_encode($response, JSON_UNESCAPED_UNICODE); //thai languge
    echo $json_response;
}