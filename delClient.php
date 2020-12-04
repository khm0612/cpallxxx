<html>

<body>
    <form action="" method="POST">
        <label>Enter Customer ID:</label><br />
        <input type="text" name="id" placeholder="delete" required />
        <br /><br />
        <button type="submit" name="submit">delete</button>
    </form>

    <?php
    print_r($_POST);
    if (isset($_POST['id']) && $_POST['id'] != "") {

        $id = $_POST['id'];
        $url = "http://localhost/peawkub/delService.php?id=" . $id;
        $client = curl_init($url);

        //print_r(curl_setopt($client, CURLOPT_RETURNTRANSFER, true));



        // User data to send using HTTP POST method in curl
        $data = array();

        // Data should be passed as json format
        $data_json = json_encode($data);

        // API URL to send data
        $url = "http://localhost/peawkub/delService.php?id=" . $id;

        // curl intitite
        $curl_handle = curl_init();

        curl_setopt($curl_handle, CURLOPT_URL, $url);

        // Set json header to received json response properly
        curl_setopt($curl_handle, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_json)));

        // SET Method as a DELETE
        curl_setopt($curl_handle, CURLOPT_CUSTOMREQUEST, "DELETE");

        // Pass user data in POST command
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $data_json);

        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);

        // Execute curl and assign returned data into
        $response  = curl_exec($curl_handle);

        // Close curl
        curl_close($curl_handle);

        // See response if data is posted successfully or any error
        print_r($response);
    }



    ?>






</body>

</html>