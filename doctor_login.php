<?php
session_start();
include 'db.php';

$error = '';
$doctor_id_value = '';

if (isset($_POST['login'])) {
    $doctor_id = trim($_POST['doctor_id'] ?? '');
    $password = $_POST['password'] ?? '';
    $doctor_id_value = htmlspecialchars($doctor_id, ENT_QUOTES);

    $sql = "SELECT * FROM doctors WHERE doctor_id = ? LIMIT 1";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $doctor_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($password, $row['password'])) {
                $_SESSION['doctor_id'] = $row['doctor_id'];
                $_SESSION['doctor_name'] = $row['fullname'];
                header('Location: doctor_dashboard.php');
                exit;
            } else {
                $error = 'Wrong password.';
            }
        } else {
            $error = 'Doctor not found.';
        }
    } else {
        $error = 'Database query failed.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Doctor Login</title>

<style>

body{
    background:#F4F9FF;
    font-family:Arial;
}

.box{
    width:400px;
    background:white;
    margin:auto;
    margin-top:80px;
    padding:30px;
    border-radius:10px;
    box-shadow:0px 0px 10px #ccc;
}

h2{
    text-align:center;
    color:#0A6EBD;
}

input{
    width:100%;
    padding:12px;
    margin-top:10px;
    border:1px solid #ccc;
    border-radius:5px;
}

button{
    width:100%;
    padding:12px;
    background:#0A6EBD;
    color:white;
    border:none;
    margin-top:15px;
    border-radius:5px;
}

</style>

</head>
<body>

<div class="box">

<h2>Doctor Login</h2>

<?php if ($error): ?>
    <div class="alert"><?php echo htmlspecialchars($error, ENT_QUOTES); ?></div>
<?php endif; ?>

<form method="POST" novalidate>

    <input type="text" name="doctor_id" placeholder="Doctor ID" required value="<?php echo $doctor_id_value; ?>">

    <input type="password" name="password" placeholder="Password" required>

    <button name="login">Login</button>

    <p class="small">Don’t have an account? <a href="doctor_register.php">Register</a></p>

</form>

</div>

</body>
</html>
