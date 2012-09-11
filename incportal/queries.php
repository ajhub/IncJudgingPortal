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

if(!empty($_SESSION['LoggedIn'])
{
     $query="select * from pro_queries";
	 $result=mysql_query($query,$connection);
	 if(!$result)
			die("error");
	else
    {	
	
	  $n=mysql_numrows($result);
       ?>
       <div id ="nt">
       <?php
	   //echo $n;
	  $i=1;
	
     	While($i <= $n) 
	 {
		$d=$n-$i;
		$f2=mysql_result($result,$pro_id);
		$f1=mysql_result($result,$quer_text);

        echo " <p id=\"noticetype1\"> $f1 |  		$f2 </p><hr width=\"99%\" size=\"1\" color=\"#D3D3D3\">";

		$i++;
     	}

	}
else
{
header("refresh:0,index.php");
}
?>
</div>
	 