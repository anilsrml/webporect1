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

// Kullanıcı metninin post edilip edilmediğini kontrol etme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $userInput = $_POST['userInput'];
    $rating = $_POST['rating'];


    // Metni veritabanına ekleme
    $sql = "UPDATE users SET text='$userInput', rating='$rating' WHERE username='$username'";
    if ($conn->query($sql) === TRUE) {
        echo "success"; // Metin başarıyla kaydedildi
    } else {
        echo "failure"; // Kayıt hatası
    }
}

// MySQL bağlantısını kapatma
$conn->close();
?>
