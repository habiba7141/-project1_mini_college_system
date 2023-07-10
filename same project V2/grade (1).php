<?php
require_once "connect.php";
session_start();
if( (!isset($_SESSION['username'])))
{
    header('location:login.php');
exit();
}
echo"<h1> set mark for students </h1>" ;
echo "Grading a Student With Id = " , htmlentities($_GET["ID"]) , " in The Course " , htmlentities($_GET["course"]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Set Mark</title>
    <style>
        body{
            
        
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
<form method="POST">
    <br>
MARK: <input type="number" name="mark">
<br><br>
<input type="submit"  name="submit" value="Grade">
        <a href="admin.php" class="a">cancel</a>
</form>
</body>
</html>


<?php
if(isset($_POST['submit']))
{
    if (isset($_POST['mark']))
    {
        $sql6= 'update mark
        set mark = :M
        where sid = :id and ccode=:course';
$statment6 = $conn->prepare($sql6);
$statment6->execute(array(
':M' => $_POST['mark'],
':id' => htmlentities($_GET["ID"]),
':course' => htmlentities($_GET["course"])
)
);
if($statment6->execute()){
echo "Student mark have been updated successfully" ; 
}
}
    
}
?>