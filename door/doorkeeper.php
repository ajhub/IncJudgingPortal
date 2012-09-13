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
<link rel="stylesheet" type="text/css" href="style.css" />
<h1> INC Portal 2012 </h1>

<?php

if(!empty($_SESSION['mUsername']) && !empty($_SESSION['mLoggedIn']))
{
       
       if(!empty($_POST['dkjd']) && !empty($_POST['dkproid1']))
       {
          $dkqjd=$_POST['dkjd'];
          $dkqproid1=$_POST['dkproid1'];
          $dkqescort=$_POST['dkescort'];
          
          $query="INSERT INTO floating_db (fjdid, fproid, fescort) VALUES ('$dkqjd','$dkqproid1','$dkqescort')";
          $result=mysql_query($query,$connection);
          if(!($result))
          {
 	 	die("canot");
          }
          if(!(empty($_POST['dkproid2'])))
          {
          	$dkqproid2=$_POST['dkproid2'];
         	$query="INSERT INTO floating_db (fjdid, fproid, fescort) VALUES ('$dkqjd','$dkqproid2','$dkqescort')";
          	$result=mysql_query($query,$connection);
          	if(!($result))
          	{
  			die("canotxx");
          	}
          }
          if(!(empty($_POST['dkproid3'])))
          {
         	$dkqproid3=$_POST['dkproid3'];
        	$query="INSERT INTO floating_db (fjdid, fproid, fescort) VALUES ('$dkqjd','$dkqproid3','$dkqescort')";
          	$result=mysql_query($query,$connection);
          	if(!($result))
          	{
  			die("canot");
          	}
          }
          if(!(empty($_POST['dkproid4'])))
          {
          	$dkqproid4=$_POST['dkproid4'];
          	$query="INSERT INTO floating_db (fjdid, fproid, fescort) VALUES ('$dkqjd','$dkqproid4','$dkqescort')";
          	$result=mysql_query($query,$connection);
          	if(!($result))
          	{
  			die("canot");
          	}
          }
          if(!(empty($_POST['dkproid5'])))
          {
          	$dkqproid5=$_POST['dkproid5'];
          	$query="INSERT INTO floating_db (fjdid, fproid, fescort) VALUES ('$dkqjd','$dkqproid5','$dkqescort')";
          	$result=mysql_query($query,$connection);
          	if(!($result))
          	{
  			die("canot");
          	}
          }
       }
        
?>

<div id="one">
	<form method="post" action="doorkeeper.php" name="dkform">
		Judge ID <input  name="dkjd" type="text"><br><br>
		Escort No<input name="dkescort" type="text"><br><br>
		Pro ID 1 <input  name="dkproid1" type="text"><br>
		Pro ID 2 <input  name="dkproid2" type="text"><br>	
		Pro ID 3 <input  name="dkproid3" type="text"><br>
		Pro ID 4 <input  name="dkproid4" type="text"><br>
		Pro ID 5 <input  name="dkproid5" type="text"><br><br>
		<input type="submit" name="dksubmit" value="Update">
	</form>
</div>
       
<div id=two>
	<form method="post" action="report.php" name="dkreport">
		Judge ID<input name="reportjdid" type="text"><br><br>
		<input type="submit" value="Reported">
	</form>
</div>               

	

<div id=toppanel>
	<div  id="topbutton">
    		<div id=topbutton1>
    			<a href="home.php" >HOME </a>    
                </div>
	<div id=topbutton2>
   	<a href="notices.php" >NOTICES</a>  
</div>
 
<div id="topbutton3">
     	<a href="rules.php" >MANUAL</a>  
</div>

<div id=topbutton5>  
        <a href="logout.php" >LOGOUT</a>   
</div>
	

</div>
</div>


<?php       
}
else
{
	echo "going to index";
	header("refresh:0,index.php");
}
?>

</html>
