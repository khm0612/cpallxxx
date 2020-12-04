<?php
include('dbCon.php');
if (isset($_GET['id']) && $_GET['id'] != '') {

    $post_vars = json_decode(file_get_contents("php://input"), true);

    print_r($post_vars);
    print_r($_GET['id']);
    $name = $post_vars["name"];
    $price = $post_vars["price"];
    //UPDATE `datapeaw` SET `name`=[value-2],`price`=[value-3] WHERE 1`id`
    $query = "UPDATE `datapeaw` SET   `name` ='" . $name . "', 	`price` ='" . $price . "' WHERE id=" . $_GET['id'];
    //echo $query;



    $result = mysqli_query($con, $query);
    if (mysqli_affected_rows($con) > 0) {
        $response = array(
            'status' => 1,
            'status_message' => 'Member Updated Successfully.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'Member Updation Failed.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}