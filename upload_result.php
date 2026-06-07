<?php
session_start();
include 'db.php';

if(!isset($_SESSION['doctor_id'])){
    header("Location: doctor_login.php");
    exit();
}

if(isset($_POST['upload'])){

    $patient_adm_no = $_POST['patient_adm_no'];
    $result_title = $_POST['result_title'];

    $doctor_id = $_SESSION['doctor_id'];

    // FILE HANDLING
    $file_name = $_FILES['result_file']['name'];
    $tmp_name = $_FILES['result_file']['tmp_name'];

    $folder = "uploads/";

    // UNIQUE NAME (prevents overwrite)
    $new_file_name = time() . "_" . $file_name;

    if(move_uploaded_file($tmp_name, $folder.$new_file_name)){

        $sql = "INSERT INTO results(patient_adm_no,doctor_id,result_title,result_file)
                VALUES('$patient_adm_no','$doctor_id','$result_title','$new_file_name')";

        mysqli_query($conn,$sql);

        echo "<script>alert('Result Uploaded Successfully');</script>";

    } else {
        echo "<script>alert('File Upload Failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Upload Result</title>

<style>

body{
    background:#F4F9FF;
    font-family:Arial;
}

.box{
    width:500px;
    margin:auto;
    margin-top:40px;
    background:white;
    padding:25px;
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
    margin-top:15px;
    background:#2BB673;
    color:white;
    border:none;
    border-radius:5px;
    font-weight:bold;
}

</style>

</head>
<body>

<div class="box">

<h2>Upload Medical Result</h2>

<form method="POST" enctype="multipart/form-data">

<input type="text" name="patient_adm_no"
placeholder="Patient Admission Number" required>

<input type="text" name="result_title"
placeholder="Result Title" required>

<input type="file" name="result_file" required>

<button name="upload">Upload Result</button>

</form>

</div>

</body>
</html>
