<?php
include 'db.php';

if(isset($_POST['register'])){

    $patient_adm_no = $_POST['patient_adm_no'];
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO patients(patient_adm_no,fullname,phone,password)
            VALUES('$patient_adm_no','$fullname','$phone','$password')";

    mysqli_query($conn,$sql);

    header("Location: patient_login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Patient Register</title>

<style>

body{
    background:#F4F9FF;
    font-family:Arial;
}

.box{
    width:400px;
    background:white;
    margin:auto;
    margin-top:50px;
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

<h2>Patient Registration</h2>

<form method="POST">

<input type="text" name="patient_adm_no"
placeholder="Admission Number" required>

<input type="text" name="fullname"
placeholder="Full Name" required>

<input type="text" name="phone"
placeholder="Phone Number" required>

<input type="password" name="password"
placeholder="Password" required>

<button name="register">Register</button>

</form>

</div>

</body>
</html>
