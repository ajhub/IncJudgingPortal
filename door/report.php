<?php
$connection=mysql_connect("localhost","root","");
if(!$connection)
{
die("Connection Error");
}

session_start();

$db=mysql_select_db("incportal",$connection);
if(!$db)
die("Error in db delection..");
?>

<html>

<?php

if((!empty($_SESSION['mLoggedIn'])) && (!empty($_POST['reportjdid'])))
{
 
 $reportqjdid=$_POST['reportjdid'];
 $query=" DELETE from floating_db where fjdid = '$reportqjdid'";
 $result=mysql_query($query,$connection);
 if(!($result)) 
 {
 die("Eror");
 }
 else
 {
 echo"DONE | Redirecting in 3 seconds";
 header("refresh:3,doorkeeper.php");
 }
}
else
{
header("refresh:0,doorkeeper.php");
}

?>

</html>