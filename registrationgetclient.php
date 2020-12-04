<html>

<body>
    <form action="" method="POST">
        <label>Enter Customer ID:</label><br />
        <input type="text" name="id" placeholder="Enter Customer ID" required />
        <br /><br />
        <button type="submit" name="submit">Search</button>
    </form>

    <?php
    print_r($_POST);


    if (isset($_POST['id']) && $_POST['id'] != "") {
        $id = $_POST['id'];
        $url = "http://localhost/peawkub/registrationgetservice.php?id=" . $id;
        //print_r($url);


        $client = curl_init($url);
        //print_r($client);
        //echo ('<br> 1122 <br>');
        print_r(curl_setopt($client, CURLOPT_RETURNTRANSFER, true));
        //echo ('<br>');
        //echo ('<br> 1122 <br>');
        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($client);
        $result = json_decode($response);
        print_r($result);


        if ($result != NULL) {

            echo "<table>";
            echo "<tr><td>CustomerID:</td><td>$result->id</td></tr>";
            echo "<tr><td>Name:</td><td>$result->name</td></tr>";
            echo "<tr><td>Email:</td><td>$result->price</td></tr>";

            echo "</table>";
        } else {
            echo "NOT Found data of customer_id = $id";
        }
    }



    ?>






</body>

</html>