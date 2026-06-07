<?php
// Database configuration - edit these to match your MySQL setup
define('DB_HOST', '127.0.0.1');
// Use a dedicated web user instead of root for improved safety
define('DB_USER', 'webuser');
define('DB_PASS', 'StrongPass123'); // change this to your chosen password
define('DB_NAME', 'medical_system');
define('DB_PORT', 3306);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

$hosts_to_try = [DB_HOST, 'localhost'];
$conn = null;
foreach ($hosts_to_try as $h) {
    try {
        $conn = mysqli_connect($h, DB_USER, DB_PASS, DB_NAME, DB_PORT);
        if ($conn) {
            mysqli_set_charset($conn, 'utf8mb4');
            break;
        }
    } catch (Exception $e) {
        // continue to next host
    }
}

if (!$conn) {
    http_response_code(500);
    $msg = "Access denied or cannot connect using provided credentials/host.";
    echo "<h2>Database connection failed</h2>";
    echo "<p>Error: " . htmlspecialchars($msg, ENT_QUOTES) . "</p>";
    echo "<p>What to try next:</p>";
    echo "<ul>";
    echo "<li>Start MySQL in the XAMPP Control Panel.</li>";
    echo "<li>Ensure `DB_USER` and `DB_PASS` in <strong>db.php</strong> match a valid MySQL user/password.</li>";
    echo "<li>If you created the user only for 'localhost' but <strong>DB_HOST</strong> is set to '127.0.0.1', either set DB_HOST to 'localhost' or create the account for both hosts.</li>";
    echo "</ul>";
    echo "<h3>SQL you can run as root to create the user for both hosts</h3>";
    echo "<pre>CREATE DATABASE IF NOT EXISTS `medical_system` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;\n";
    echo "CREATE USER IF NOT EXISTS 'webuser'@'localhost' IDENTIFIED BY 'StrongPass123';\n";
    echo "CREATE USER IF NOT EXISTS 'webuser'@'127.0.0.1' IDENTIFIED BY 'StrongPass123';\n";
    echo "GRANT ALL PRIVILEGES ON `medical_system`.* TO 'webuser'@'localhost';\n";
    echo "GRANT ALL PRIVILEGES ON `medical_system`.* TO 'webuser'@'127.0.0.1';\n";
    echo "FLUSH PRIVILEGES;";
    echo "</pre>";
    echo "<p>Run the SQL using the MySQL client or phpMyAdmin. Example (PowerShell):<br><code>cd \"C:\\xampp\\mysql\\bin\"\nmysql -u root -p &lt; \"C:\\xampp\\htdocs\\medical management\\create_webuser.sql\"</code></p>";
    exit;
}

?>

