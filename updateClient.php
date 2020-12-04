<html>

<body>
    <form action="" method="POST">
        <label>Enter insert:</label><br />
        <input type="number" name="id" placeholder="id" required />
        <br /><br />
        <input type="text" name="name" placeholder="Enter Name" required />
        <br /><br />
        <input type="number" name="price" placeholder="price" required />
        <br /><br />

        <br /><br />
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        /*
        $data["name"] = $_POST['id'];
        $data["name"] = $_POST['name'];
        $data["price"] = $_POST['price'];
        $json_response = json_encode($data);
        $data = json_encode($data, JSON_UNESCAPED_UNICODE); //thai languge
        echo $data;
        $ch = curl_init('http://localhost/peawkub/insertService.php');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response);
        echo "<script type='text/javascript'>";
        echo "alert('add data Successfull');";
        echo "window.location = 'insertClient.php'; ";
        echo "</script>";

        */
        // User data to send using HTTP PUT method in curl


        //'" . $_POST['daywarranty'] . "'
        $id = $_POST['id'];
        $data = array('name' => $_POST['name'], 'price' =>  $_POST['price']);
        print_r($data);
        // Data should be passed as json format
        $data_json = json_encode($data);


        // API URL to update data with employee id
        $url = "http://localhost/peawkub/updateService.php?id=" . $id;

        // curl initiate
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($data_json)));

        // SET Method as a PUT
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');

        // Pass user data in POST command
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_json);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Execute curl and assign returned data
        $response  = curl_exec($ch);

        // Close curl
        curl_close($ch);

        // See response if data is posted successfully or any error
        print_r($response);
    }
    ?>
</body>

</html>