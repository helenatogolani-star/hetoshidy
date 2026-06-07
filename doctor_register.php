<?php
include 'db.php';

if(isset($_POST['register'])){

    $doctor_id = $_POST['doctor_id'];
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO doctors
    (doctor_id,fullname,email,phone,department,password)

    VALUES

    ('$doctor_id','$fullname','$email',
    '$phone','$department','$password')";

    mysqli_query($conn,$sql);

    header("Location: doctor_login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Doctor Register</title>

<style>

body{
    background:#F4F9FF;
    font-family:Arial;
}

.box{
    width:450px;
    background:white;
    margin:auto;
    margin-top:40px;
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
    background:#2BB673;
    color:white;
    border:none;
    margin-top:15px;
    border-radius:5px;
}

</style>

</head>
<body>

<div class="box">

<h2>Doctor Registration</h2>

<form method="POST">

<input type="text" name="doctor_id"
placeholder="Doctor ID" required>

<input type="text" name="fullname"
placeholder="Full Name" required>

<input type="email" name="email"
placeholder="Email" required>

<input type="text" name="phone"
placeholder="Phone Number" required>

<input type="text" name="department"
placeholder="Department" required>

<input type="password" name="password"
placeholder="Password" required>

<button name="register">Register</button>

</form>

</div>

</body>
</html>
