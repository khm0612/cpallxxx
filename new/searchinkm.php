<!DOCTYPE html>
<html>


<head>
    <title>Search in webkm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<?php
//include("http://10.183.252.226/sing9/new/searchinkm.php");
//print_r($x);
//include("http://localhost/sing9/new/json_search_km_Sing.php");
//print_r($x);
function _sentparamToLocal()
{

    $url = "http://localhost/sing9/new/json_search_km_Sing.json";

    $json = file_get_contents($url);
    #json = json_decode($json);
    echo $json;
    var_dump($json);
}
function _sentparamToKmDb()
{

    $url = "http://localhost/sing9/new/json_search_km_Sing.php";

    $json = file_get_contents($url);
    header('Content-Type: application/json');
    #$json = json_decode($json);
    #echo $json;
    #var_dump($json);
    #echo json_encode($json, JSON_NUMERIC_CHECK | JSON_UNESCAPED_UNICODE);
}
?>

<body>

    <div class="container mt-3">
        <h1>Search in webkm</h1>

        <form name="form" action="http://localhost/sing9/new/json_search_km_Sing.php" method="GET">
            <p>
                <input type="text" name="x" placeholder="input" value="" />
                <button type="button" class="btn-success">submit</button>
            </p>

            <?php
            #10.183.252.226
            #http://localhost/sing9/new/json_search_km_Sing.php
            if (isset($_GET['x'])) {

                $argument1 = $_GET['x'];
                _sentparamToKmDb();
            }
            ?>

        </form>


    </div>


</body>

</html>