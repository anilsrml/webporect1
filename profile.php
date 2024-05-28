<?php
$servername = "localhost";
$username = "dbusr22360859018";
$password = "VpvBFxpI9KvR";
$dbname = "dbstorage22360859018";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];

    $sql = "SELECT username, password ,email, birthday FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(array("error" => "User not found"));
    }
}

$conn->close();
?>
