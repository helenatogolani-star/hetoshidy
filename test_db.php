<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

// Adjust host/port if your XAMPP uses different settings
$host = '127.0.0.1';
$port = 3306;
$user = 'root';
$pass = '';
$db   = 'medical_system';

$conn = mysqli_connect($host, $user, $pass, $db, $port);

if (!$conn) {
    echo 'Connect error: ' . mysqli_connect_error();
    exit;
}

echo 'Connected OK';

?>