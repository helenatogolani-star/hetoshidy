<?php
session_start();

if(!isset($_SESSION['patient_adm_no'])){
    header("Location: patient_login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Patient Dashboard</title>

<style>

body{
    font-family:Arial;
    background:#F4F9FF;
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
    box-shadow:0px 0px 10px #ccc;
    text-align:center;
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

Welcome
<?php echo $_SESSION['fullname']; ?>

</div>

<div class="container">

<div class="card">

<h2>Patient Dashboard</h2>

<p>View your medical results.</p>

<a class="button" href="view_results.php">
View Results
</a>

</div>

</div>

</body>
</html>
