<?php
require_once "connect.php";
echo"<h1> set mark for students </h1>" ;
echo "Grading a Student With Id = " , htmlentities($_GET["ID"]) , " in The Course " , htmlentities($_GET["course"]);
?>
<br>
<form method="POST">
MARK: <input type="number" name="mark">
<br><br>
<input type="submit"  name="submit" value="Grade">
        <a href="admin.php">cancel</a>
</form>
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