<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Sign Up </h1>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
    <label>user name: </label>
    <input type="text" name="name" required><br><br>
    <label>password: </label>
    <input type="password" name="pass" required><br><br>
    <input type="submit"  name="submit" value="sign up">
</form>
<?php
require_once 'connect.php';
if(isset($_POST['submit']))
{
    $name= htmlspecialchars($_POST['name']);
    $pass= htmlspecialchars($_POST['pass']);
    $newpass=md5($pass);
    $sql1="select name from student where name=:name";
    $stat=$conn->prepare($sql1);
    $stat->execute(array(
        ':name'=>$name
    ));
    
    $exist=$stat->fetchAll();

    if ($exist)
    echo "user name is already exist";
    else{
    $sql2="insert into student (name,password) values (:name,:pass)";
    $stat2=$conn->prepare($sql2);
    $stat2->execute(array(
        ':name'=>$name,
        ':pass'=>$newpass
    ));

    
    echo"Sign Up sucsseful";
}
}

?>
</body>
</html>