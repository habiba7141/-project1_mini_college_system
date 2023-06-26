<?php
require_once "connect.php";
session_start();
$sql7="select name,sid,title,ccode,mark from student s,course c,mark m where s.id=m.sid and c.code=m.ccode";
$stat7=$conn->prepare($sql7);
$stat7->execute();

if ($stat7)
{
    echo"<table border=1>";
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