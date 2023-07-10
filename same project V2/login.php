<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body{
            
            padding:10px;
        }
        .container{
            background-color:#f2f2f2;
            padding: 20px;
            margin: 0;
        }
        a{
            text-decoration:none;
            color:black;
            appearance: auto;
            user-select: none;
            white-space-collapse: preserve;
            text-wrap: nowrap;
            align-items: flex-start;
            text-align: center;
            cursor: default;
            box-sizing: border-box;
            background-color: buttonface;
            color: buttontext;
        padding: 1px 6px;
        margin:3px 0px;
        border-width: 2px;
        border-style: outset;
        border-color: buttonborder;
        border-image: initial;
        }
      
      
    </style>

</head>
<body>
<div class="container">
    <h1>Login</h1>
    <form method="POST" action="">
    <label>user name: </label>
    <input type="text" name="name" required><br><br>
    <label>password: </label>
    <input type="password" name="pass" required><br><br>
    <input type="submit"  name="submit" value="login">
</form>
<a href="sign up.php" >Sign Up </a>
    </div>
<?php

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    require_once "connect.php";
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
    if(!$exist){
    echo"Login failed ";
    }
    else
    {
    $_SESSION['username']=$exist['name'];
    $_SESSION['role']=$exist['role'];
    $_SESSION['sid']=$exist['id'];
    if($exist['role']=="admin")
    {
        echo "Login Successful! You will be redirected to the Admin Dashboard soon!";
        echo '<script>
            setTimeout(function() {
                window.location.href = "admin.php";
            }, 2000);
        </script>';
    }
    else{
    echo "Login Successful! You will be redirected to the user Dashboard soon!";
    echo '<script>
        setTimeout(function() {
            window.location.href = "student.php";
        }, 2000);
    </script>';
    }
 
} }
?>
</body>
</html>