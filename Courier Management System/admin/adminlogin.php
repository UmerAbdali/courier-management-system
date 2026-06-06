<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login - Logistics Transport</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Poppins',sans-serif;
}
body{
    overflow-x:hidden;
    background:#f8f9fa;
}
.navbar{
    background:#071c2d;
}
.navbar-brand{
    color:#fff !important;
    font-size:28px;
    font-weight:700;
}
.navbar-nav .nav-link{
    color:#fff !important;
    margin:0 12px;
}
.login-container{
    display:flex;
    min-height:calc(100vh - 80px);
    align-items:center;
    justify-content:center;
    padding:40px 20px;
}
.login-card{
    background:#fff;
    border-radius:8px;
    box-shadow:0 4px 15px rgba(0,0,0,0.1);
    padding:50px 40px;
    width:100%;
    max-width:420px;
}
.login-card h2{
    color:#071c2d;
    margin-bottom:10px;
    font-weight:700;
}
.login-card p{
    color:#666;
    margin-bottom:30px;
    font-size:14px;
}
.form-group{
    margin-bottom:20px;
}
.form-group label{
    color:#071c2d;
    font-weight:600;
    margin-bottom:8px;
    display:block;
}
.form-group input{
    width:100%;
    padding:12px 15px;
    border:1px solid #ddd;
    border-radius:4px;
    font-size:14px;
    transition:0.3s;
}
.form-group input:focus{
    border-color:#e31e24;
    outline:none;
    box-shadow:0 0 0 3px rgba(227,30,36,0.1);
}
.login-btn{
    background:#e31e24;
    color:#fff;
    border:none;
    padding:12px 20px;
    border-radius:4px;
    font-weight:600;
    cursor:pointer;
    width:100%;
    margin-top:10px;
    transition:0.3s;
}
.login-btn:hover{
    background:#c71a1f;
}
.nav-links{
    margin-top:25px;
    padding-top:25px;
    border-top:1px solid #eee;
    text-align:center;
    font-size:14px;
}
.nav-links a{
    color:#e31e24;
    text-decoration:none;
    font-weight:600;
    margin:0 10px;
}
</style>
</head>
<body>
    <main>
        
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="../index.php">
            <i class="fa-solid fa-truck-fast text-danger"></i>
            Courier Management
        </a>
        <button class="navbar-toggler bg-light" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>        
    </div>
</nav>
<div class="login-container">
    <div class="login-card">
        <h2><i class="fa-solid fa-shield"></i> Admin Login</h2>
        <p>Access the admin panel to manage your logistics system</p>
        <form method="post" action="#">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button class="login-btn" name="btn" type="submit">Login</button>
        </form>
       
    </div>
</div>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php 
include("../includes/dbconnect.php");

if(isset($_POST["btn"])){
    $username=$_POST["username"];
    $password=$_POST["password"];

    $query="SELECT * FROM admin WHERE a_username='$username' AND a_password='$password'";
    $execute=mysqli_query($conn,$query);
    
    $row = mysqli_num_rows($execute);
    if($row>0){
        $admin = mysqli_fetch_assoc($execute);
        $_SESSION["AdminID"]=$admin["a_id"];
        $_SESSION["AdminUsername"]=$admin["a_username"];
        echo"<script>
        alert('Login successful')
        window.location.href='dashboard.php'
        </script>";
    }else{
        echo"<script>
        alert('Invalid username or password')
        window.location.href='adminlogin.php'
        </script>";
    }
}

?>