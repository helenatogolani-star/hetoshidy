<!DOCTYPE html>
<html>
<head>
<title>Medical Result System</title>

<style>

body{
    margin:0;
    font-family:Arial;
    background:#F4F9FF;
}

/* TOP BAR */
.navbar{
    background:#0A6EBD;
    color:white;
    padding:18px;
    text-align:center;
    font-size:22px;
    font-weight:bold;
}

/* HERO SECTION */
.hero{
    text-align:center;
    padding:50px 20px;
}

.hero h1{
    color:#0A6EBD;
    font-size:32px;
}

.hero p{
    font-size:18px;
    color:#444;
    max-width:700px;
    margin:auto;
}

/* MAIN CONTAINER */
.container{
    width:90%;
    margin:auto;
    display:flex;
    justify-content:center;
    gap:30px;
    flex-wrap:wrap;
    margin-top:30px;
}

/* CARDS */
.card{
    background:white;
    width:320px;
    padding:25px;
    border-radius:10px;
    box-shadow:0px 0px 10px #ccc;
    text-align:center;
}

.card h2{
    color:#0A6EBD;
}

.card p{
    color:#555;
}

/* BUTTONS */
.btn{
    display:block;
    text-decoration:none;
    padding:12px;
    margin-top:10px;
    border-radius:5px;
    color:white;
    font-weight:bold;
}

.patient{
    background:#2BB673;
}

.doctor{
    background:#0A6EBD;
}

/* FOOTER */
.footer{
    margin-top:50px;
    background:#0A6EBD;
    color:white;
    text-align:center;
    padding:15px;
}

</style>

</head>

<body>

<!-- NAVBAR -->
<div class="navbar">
Hospital Medical Result System
</div>

<!-- HERO -->
<div class="hero">

<h1>Welcome to Digital Medical System</h1>

<p>
Doctors upload medical results securely.
Patients can view and download results using their Admission Number.
</p>

</div>

<!-- CARDS -->
<div class="container">

<!-- PATIENT SECTION -->
<div class="card">

<h2>Patient Section</h2>

<p>
Access your medical results anytime using your admission number.
</p>

<a href="patient_login.php" class="btn patient">
Patient Login
</a>

<a href="patient_register.php" class="btn patient">
Patient Register
</a>

</div>

<!-- DOCTOR SECTION -->
<div class="card">

<h2>Doctor Section</h2>

<p>
Upload and manage patient medical results securely.
</p>

<a href="doctor_login.php" class="btn doctor">
Doctor Login
</a>

<a href="doctor_register.php" class="btn doctor">
Doctor Register
</a>

</div>

</div>

<!-- FOOTER -->
<div class="footer">
© 2026 Medical System | Secure Healthcare Platform
</div>

</body>
</html>
