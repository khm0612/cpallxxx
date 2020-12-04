<?php

include('dbCon.php');
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = $_GET["id"];
    $query = "DELETE FROM datapeaw WHERE id=" . $id;
    $result = mysqli_query($con, $query);



    if (mysqli_affected_rows($con) > 0) {
        $response = array(
            'status' => 1,
            'status_message' => 'Member Deleted Successfully.'
        );
    } else {
        $response = array(
            'status' => 0,
            'status_message' => 'Member Deletion Failed.'
        );
    }

    if (mysqli_affected_rows($con) > 0) {

        echo "<script type='text/javascript'>";
        echo "alert('delete data Successfull');";
        echo "</script>";
    } else {
        echo "<script type='text/javascript'>";
        echo "alert('fill delete data Successfull');";
        echo "</script>";
    }
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    //echo ('0000000000000');
}