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
<head>

</head>
<?php

if(!empty($_POST['gui_m_userid']) && !empty($_POST['gui_m_pass']))
{
    
    $musername = mysql_real_escape_string($_POST['gui_m_userid']);
    $mpassword = mysql_real_escape_string($_POST['gui_m_pass']);
     
     
     $query = " SELECT * FROM master_login WHERE master_id = '$musername' ";
     $result=mysql_query($query,$connection);
   if(!$result)
    die("Connection Error");
   else
   {
     $row = mysql_fetch_array($result);
     $pass = $row['master_pass'];
     echo "$pass";
     if($pass == $mpassword)
     {
        
          $_SESSION['mUsername'] = $musername;
          $_SESSION['mLoggedIn'] = 2;
          header("refresh:0,doorkeeper.php");
     }
     else
     {
          echo " Invalid Username | Password <br/> Redirecting you to LOGIN PAGE in 3 Seconds...";
          header("refresh:3,index.php");
     }
   }
}
else
{
?>


<body>
<div id="login">
<form method="post" action="index.php" name="mloginform">
MASTER LOGIN<br><br>User ID  <input name="gui_m_userid" type="text" /><br>
Password <input name ="gui_m_pass" type="password" /><br><br>
<input type="submit" name="mloginbutton" value="Login"/>
</form>
</div>
              
</body>
<?php
}
?>


</html>