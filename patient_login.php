<?php
session_start();
include 'db.php';

if(isset($_POST['login'])){

    $patient_adm_no = $_POST['patient_adm_no'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM patients
            WHERE patient_adm_no='$patient_adm_no'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){

        $row = mysqli_fetch_assoc($result);

        if(password_verify($password,$row['password'])){

            $_SESSION['patient_adm_no'] = $row['patient_adm_no'];
            $_SESSION['fullname'] = $row['fullname'];

            header("Location: patient_dashboard.php");

        }else{
            echo "Wrong Password";
        }

    }else{
        echo "Patient Not Found";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Patient Login</title>

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

<h2>Patient Login</h2>

<form method="POST">

<input type="text" name="patient_adm_no"
placeholder="Admission Number" required>

<input type="password" name="password"
placeholder="Password" required>

<button name="login">Login</button>

</form>

</div>

</body>
</html>
