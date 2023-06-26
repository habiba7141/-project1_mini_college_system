<?php
require_once"connect.php";
session_start();
if(!isset($_SESSION['username']))
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
    <title>Document</title>
</head>
<body>
    <form method='POST'>
Courses :<select name="courses[]" size="3" multiple>
        <option>102</option>
        <option>104</option>
        <option>106</option>
      </select><br><br>
      <input type="submit" name="submit" value="add course">
      <br><br>
      <a href="show.php">show my grades</a>
</form>
<?php

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $course=$_POST['courses'];
   
    foreach($course as $c)
    $sql4="insert into mark (sid,ccode) values (:id,:code)";
    $stat4=$conn->prepare($sql4);
    $stat4->execute(array(
        ':id'=>$_SESSION['sid'],
        ':code'=>$c
    ));
}
?>
</body>
</html>