<html>

<body>
    <form action="" method="POST">
        <label>Enter insert:</label><br />
        <input type="text" name="name" placeholder="Enter Name" required />
        <br /><br />
        <input type="number" name="price" placeholder="price" required />
        <br /><br />

        <br /><br />
        <button type="submit" name="submit">Submit</button>
    </form>

    <?php
  if (isset($_POST['submit'])) {

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
  }
  ?>
</body>

</html>