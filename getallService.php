<?php
header("Content-Type:application/json");

include('dbCon.php');
$sql = "SELECT * FROM datapeaw ";
//echo $sql;
$result = mysqli_query($con, $sql);


if (mysqli_num_rows($result) > 0) {

    $query = "SELECT * FROM datapeaw";
    $response = array();
    $result = mysqli_query($con, $query);
    $i = 1;
    while ($row = mysqli_fetch_array($result)) {
        //$response[] = $row;
        $response[$i]['id'] = $row['id'];
        $response[$i]['name'] = $row['name'];
        $response[$i]['price'] = $row['price'];
        $i++;
    }
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    response(NULL, 200, "No Record Found");
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
