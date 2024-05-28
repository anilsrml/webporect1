<?php
// MySQL veritabanı bağlantısı
$servername = "localhost";
$username = "dbusr22360859018";
$password = "VpvBFxpI9KvR";
$dbname = "dbstorage22360859018";

// Bağlantı oluşturma
$conn = new mysqli($servername, $username, $password, $dbname);

// Bağlantıyı kontrol etme
if ($conn->connect_error) {
    die("Bağlantı hatası: " . $conn->connect_error);
}

// Kullanıcı adı ve şifrenin post edilip edilmediğini kontrol etme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // SQL sorgusu oluşturma (kullanıcı adı ve şifreyi kontrol eden)
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    // Sorgu sonucunu kontrol etme
    if ($result->num_rows > 0) {
        echo "success"; // Kullanıcı doğrulandı
    } else {
        echo "failure"; // Kullanıcı adı veya şifre yanlış
    }
}



// MySQL bağlantısını kapatma
$conn->close();
?>
