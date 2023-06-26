<?php
require_once "connect.php";
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1>Login</h1>
    <form method="POST" action="">
    <label>user name: </label>
    <input type="text" name="name" required><br><br>
    <label>password: </label>
    <input type="password" name="pass" required><br><br>
    <input type="submit"  name="submit" value="login">
</form>
<a href="sign up.php" >Sign Up </a>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
   
    $name= htmlspecialchars($_POST['name']);
    $pass= htmlspecialchars($_POST['pass']);
    $newpass=md5($pass);
    $sql3="select * from student where name=:name And password=:pass";
    $stat3=$conn->prepare($sql3);
    $stat3->execute(array(
        ':name'=>$name,
        ':pass'=>$newpass
    ));
    $exist=$stat3->fetch(PDO::FETCH_ASSOC);
    if(!$exist)
    echo"Login failed ";
    else
    {
    $_SESSION['username']=$exist['name'];
    $_SESSION['role']=$exist['role'];
    $_SESSION['sid']=$exist['id'];
    if($exist['role']=="admin")
    header('location:admin.php');
    else
    header('location:student.php');
    
    
    }
 
} 
?>
</body>
</html>