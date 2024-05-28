
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

// Kullanıcı adı, şifre, e-posta ve doğum tarihinin post edilip edilmediğini kontrol etme
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $birthday = $_POST['birthday'];

    // Kullanıcı adının var olup olmadığını kontrol etme
    $sql = "SELECT * FROM users WHERE username='$username'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "failure"; // Kullanıcı adı zaten mevcut
    } else {
        // Yeni kullanıcı ekleme
        $sql = "INSERT INTO users (username, password, email, birthday) VALUES ('$username', '$password', '$email', '$birthday')";
        if ($conn->query($sql) === TRUE) {
            echo "success"; // Başarılı kayıt
        } else {
            echo "failure"; // Kayıt hatası
        }
    }
}

// MySQL bağlantısını kapatma
$conn->close();
?>
