<?php
require_once"connect.php";
session_start();
if(!isset($_SESSION['username'])&&( $_SESSION['role']=="admin"))
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
<h1> student information</h1>
<?php
$sql5="select name,sid,title,ccode from student s,course c,mark m where s.id=m.sid and c.code=m.ccode";
$stat5=$conn->prepare($sql5);
$stat5->execute();

if ($stat5)
{
    echo"<table border=1>";
    while($table=$stat5->fetch(PDO::FETCH_ASSOC))
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
        echo "<a href=grade.php?ID=" , (htmlentities($table['sid'])) , "&course=" , urldecode(htmlentities($table['ccode'])) , ">Grading</a></td></tr>";
        
    }
}
      ?>
</body>
</html>