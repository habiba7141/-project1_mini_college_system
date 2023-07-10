<?php
require_once"connect.php";
session_start();
//م
if(($_SESSION['role']!="admin")&&(!isset($_SESSION['username'])))
{ 
    header('location:login.php');
exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>student</title>
    <style>
    body{
            
            padding:10px;
        }
        div{
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
    <div>
    <form method='POST'>
        <h1>Choose your courses</h1>
Courses :<select name="courses[]" size="3" multiple>
        <option>102</option>
        <option>104</option>
        <option>106</option>
      </select><br><br>
      <input type="submit" name="submit" value="add course">
      <br><br>
      <a href="show.php">show my grades</a>
</form>
    </div>
<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $course=$_POST['courses'];
    foreach($course as $c)
   $sql="select count(*) from mark where sid=:id and ccode=:code";
   $stat=$conn->prepare($sql);
   $stat->execute(array(
    ':id'=>$_SESSION['sid'],
    ':code'=>$c
   ));
   $count=$stat->fetchColumn();
   if($count>0)
   {
    echo"this course is already added";
   }
   else{
    foreach($course as $c)
    $sql4="insert into mark (sid,ccode) values (:id,:code)";
    $stat4=$conn->prepare($sql4);
    $stat4->execute(array(
        ':id'=>$_SESSION['sid'],
        ':code'=>$c
    ));
}
}
?>
</body>
</html>