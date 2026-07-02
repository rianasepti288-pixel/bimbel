<?php
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $cek = mysqli_query($koneksi,
    "SELECT * FROM admin
    WHERE username='$username'
    AND password='$password'");

    if(mysqli_num_rows($cek)>0){

        $_SESSION['admin']=true;

        header("Location: admin.php");
        exit;

    }else{
        echo "<script>alert('Username atau Password Salah!');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Admin</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    background:linear-gradient(135deg,#00c853,#00e676);
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.login-box{
    width:450px;
    background:white;
    padding:40px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,0.2);
}

.login-box h1{
    text-align:center;
    color:#00c853;
    margin-bottom:10px;
}

.login-box p{
    text-align:center;
    color:#666;
    margin-bottom:30px;
}

.input-box{
    width:100%;
    padding:14px;
    margin-bottom:18px;
    border:1px solid #ddd;
    border-radius:10px;
    font-size:16px;
}

.input-box:focus{
    outline:none;
    border:2px solid #00c853;
}

.btn-login{
    width:100%;
    padding:14px;
    border:none;
    background:#00c853;
    color:white;
    font-size:16px;
    border-radius:10px;
    cursor:pointer;
    font-weight:bold;
}

.btn-login:hover{
    background:#009624;
}

.logo{
    text-align:center;
    font-size:60px;
    margin-bottom:10px;
}

</style>

</head>
<body>

<div class="login-box">

    <div class="logo">
        🎓
    </div>

    <h1>SMART BIMBEL</h1>

    <p>Login Administrator</p>

    <form method="POST">

        <input
        type="text"
        name="username"
        class="input-box"
        placeholder="Masukkan Username"
        required>

        <input
        type="password"
        name="password"
        class="input-box"
        placeholder="Masukkan Password"
        required>

        <button
        type="submit"
        name="login"
        class="btn-login">
            Login
        </button>

    </form>

</div>

</body>
</html>