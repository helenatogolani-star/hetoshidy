<?php
session_start();

if(!isset($_SESSION['doctor_id'])){
    header("Location: doctor_login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Doctor Dashboard</title>

<style>

body{
    background:#F4F9FF;
    font-family:Arial;
}

.navbar{
    background:#0A6EBD;
    color:white;
    padding:15px;
    text-align:center;
    font-size:20px;
}

.container{
    width:90%;
    margin:auto;
    margin-top:40px;
}

.card{
    background:white;
    padding:30px;
    border-radius:10px;
    text-align:center;
    box-shadow:0px 0px 10px #ccc;
}

.button{
    display:inline-block;
    background:#2BB673;
    color:white;
    padding:12px 20px;
    text-decoration:none;
    border-radius:5px;
    margin-top:20px;
}

</style>

</head>
<body>

<div class="navbar">

Welcome Doctor
<?php echo $_SESSION['doctor_name']; ?>

</div>

<div class="container">

<div class="card">

<h2>Doctor Dashboard</h2>

<p>Upload medical results for patients.</p>

<a class="button" href="upload_result.php">
Upload Result
</a>

</div>

</div>

</body>
</html>
