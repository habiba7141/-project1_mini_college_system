<?php
require_once "connect.php";
session_start();
if(!isset($_SESSION['username']))
{
    header("location:login.php");
    exit();
}
$sql7="select name,sid,title,ccode,mark from student s,course c,mark m where s.id=m.sid and c.code=m.ccode and s.id=:id ";
$stat7=$conn->prepare($sql7);
$stat7->execute(array(
    ':id'=>$_SESSION['sid']
));

if ($stat7)
{
    echo"<h1>your information</h1>";
    echo"<table border=1>";
    echo"<tr><td>ID</td>
    <td>Name</td>
    <td>Course</td>
    <td>Course Code</td>
    <td>Mark</td>
    <tr>";
    while($table=$stat7->fetch(PDO::FETCH_ASSOC))
    {
        echo "<tr><td>";
        echo $table['sid'];
        echo "</td><td>";
        echo $table['name'];
        echo "</td><td>";
        echo $table['title'];
        echo "</td><td>";
        echo $table['ccode'];
        echo "</td><td>";
        echo $table['mark'];
        echo "</td>";
       
        
    }
echo "</table>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            
            padding:20px;
            background-color:#f2f2f2;
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
  <a href="log out.php">Log Out</a>  
</body>
</html>