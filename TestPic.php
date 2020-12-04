<html>

<body>
    <form action="" method="POST">
        <label>Enter insert:</label><br />
        <input type="text" name="name" placeholder="Enter Name" required />
        <br /><br />
        <input type="number" name="price" placeholder="price" required />
        <br>
        <br>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
        <br /><br />

        <br /><br />
        <button type="submit" name="submit">Submit</button>
    </form>
    <?php
    if (isset($_Pic['submit'])) {

        $data["name"] = $_POST['name'];
        $data["price"] = $_POST['price'];
        $data["picc"] = $_POST['picc'];
        $json_response = json_encode($data);
        $data = json_encode($data, JSON_UNESCAPED_UNICODE); //thai languge
        echo $data;
        $ch = curl_init('http://localhost/sing9/TestPic.php');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        $result = json_decode($response);
        echo "<script type='text/javascript'>";
        echo "alert('add data Successfull');";
        echo "window.location = 'insertClient.php'; ";
        echo "</script>";
    }
    ?>


    <?php
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    ?>

</body>

</html>