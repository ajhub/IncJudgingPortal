<?php

session_start();

$connection=mysql_connect("localhost","root","");
if(!$connection)
{
	die("Connection Error");
}

$db=mysql_select_db("incportal",$connection);
if(!$db)
	die("Error in db delection..");
?>

<html>
<link rel="stylesheet" type="text/css" href="style.css" />

<?php
if(!empty($_POST['gui_userid']) && !empty($_POST['gui_pass']))
{

    $username = mysql_real_escape_string($_POST['gui_userid']);
    $password = mysql_real_escape_string($_POST['gui_pass']);
     
     
     $query = " SELECT * FROM pro_details WHERE pro_id = '$username' ";
     $result=mysql_query($query,$connection);
   if(!$result)
    die("Connection Error");
   else
   {
     $row = mysql_fetch_array($result);
     $pass = $row['password'];
     
     if($pass == $password)
     {
          
          $_SESSION['Username'] = $username;
          $_SESSION['LoggedIn'] = 1;
          header("refresh:0,home.php");
     }
     else
     {header("refresh:0,index.php");      
     }
   }
}
else
{
?>


<body>


<div id="login">
<form method="post" action="index.php" name="loginform">
 PARTICIPANT LOGIN<br><br>User ID  <input name="gui_userid" type="text" /><br>
Password <input name ="gui_pass" type="password" /><br><br>
<input type="submit" name="loginbutton" value="Login"/>
</form>
</div>
</body>
<?php
}
?>


</html>