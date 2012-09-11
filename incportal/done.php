<?php

{
$connection=mysql_connect("localhost","root","");
if(!$connection)
{
die("Connection Error");
}

session_start();

$db=mysql_select_db("incportal",$connection);
if(!$db)
die("Error in db delection..");
}
?>

<html>

<?php

if(!empty($_SESSION['LoggedIn']) && !empty($_POST['ddjdid']))
{
 echo"entered";
 $homeq_jdone=$_POST['ddjdid'];
 $homeq_pdone=$_SESSION['Username'];
 $query=" DELETE from floating_db where fjdid = '$homeq_jdone' and fproid = '$homeq_pdone' ";
 $result=mysql_query($query,$connection);
 if(!($result)) 
 {
 die("Eror");
 }
 
 $query=" INSERT into done_db (djdid,dproid) VALUES('$homeq_jdone','$homeq_pdone')";

 $result=mysql_query($query,$connection);
 if(!($result)) 
 {
 die("Eror0");
 }

  
 echo "Done | Redirecting you in 2 seconds";
 header("refresh:2,home.php");
}
else
{
header("refresh:0,home.php");
}

?>

</html>