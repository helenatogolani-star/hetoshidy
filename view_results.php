<?php
session_start();
include 'db.php';

if(!isset($_SESSION['patient_adm_no'])){
    header("Location: patient_login.php");
}

$patient_adm_no = $_SESSION['patient_adm_no'];

$sql = "SELECT * FROM results
        WHERE patient_adm_no='$patient_adm_no'";

$result = mysqli_query($conn,$sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>View Results</title>

<style>

body{
    background:#F4F9FF;
    font-family:Arial;
}

.container{
    width:90%;
    margin:auto;
    margin-top:40px;
}

h2{
    text-align:center;
    color:#0A6EBD;
}

table{
    width:100%;
    border-collapse:collapse;
    background:white;
}

table th{
    background:#0A6EBD;
    color:white;
    padding:15px;
}

table td{
    padding:15px;
    border:1px solid #ddd;
    text-align:center;
}

.download{
    background:#2BB673;
    color:white;
    padding:8px 12px;
    text-decoration:none;
    border-radius:5px;
}

</style>

</head>
<body>

<div class="container">

<h2>My Medical Results</h2>

<table>

<tr>
<th>Result Title</th>
<th>Date</th>
<th>Download</th>
</tr>

<?php while($row = mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['result_title']; ?></td>

<td><?php echo $row['created_at']; ?></td>

<td>
<a class="download"
href="uploads/<?php echo $row['result_file']; ?>"
download>
Download
</a>
</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>
