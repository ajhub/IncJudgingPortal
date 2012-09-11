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

if(!empty($_SESSION['LoggedIn']) && !empty($_POST['user_query']))
{
 
 $home_querytxt=$_POST['user_query'];
 $home_username = $_SESSION['Username'];

 $query="INSERT INTO pro_queries (pro_id,query_text) VALUES ('$home_username','$home_querytxt')";
  
$result=mysql_query($query,$connection);
 if(!($result)) 
 {
 die("Eror");
 }
    
 
 header("refresh:0,home.php");
}
else
{
 echo"else error";
header("refresh:2,home.php");
}

?>

</html>


