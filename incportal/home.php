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

<?php
if(!empty($_SESSION['LoggedIn']))
{
 $home_username = $_SESSION['Username'];
  $query="SELECT * from done_db where dproid = '$home_username'";
  $result=mysql_query($query,$connection);
  if(!($result)) 
  {
  die("Eror0");
  }
  else
  {
    $cnt1=mysql_num_rows($result);
    $query1="UPDATE pro_details SET judging_done = $cnt1 where pro_id = '$home_username'";
    $result1=mysql_query($query1,$connection);
    if(!($result1)) 
    {
    die("Eror0");
    }
    
  }
}
?>

<html>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" href="msgbox.css">
<script type="text/javascript" src="msgbox.js"></script>
<head>
<script type="text/javascript">

// normal message
function notify(){
	alert("Example 1","Hello,<br />This is a normal message");
}


</script>
</head>
<body>
<input type="submit" onclick="notify()/">

<?php


if(!empty($_SESSION['LoggedIn']) && !empty($_SESSION['Username']))
{

$home_username = $_SESSION['Username'];
$query="SELECT * FROM pro_details WHERE pro_id = '$home_username'";
$result=mysql_query($query,$connection);

   if(!$result)
    die("Connection Error");
   else
   {
     $row = mysql_fetch_array($result);
     $home_pro_name=$row['pro_name'];
     $home_pro_colg=$row['pro_college'];
     $home_contact=$row['pro_contact'];
     $home_pro_noj=$row['judging_done'];
    }

$query="SELECT * FROM floating_db WHERE fproid = '$home_username'";
$result=mysql_query($query,$connection);

   if(!$result)
    die("Query`Failed!");
   else
   {
    
     $cnt=mysql_num_rows($result);
     ?>
	<div id=leftpanel>
	<div id = "dt">
	<table class=floattable>
	<tr>
	<th>Floating Judge ID</th>
	<th>Escort</th>
	</tr>
      <?php

       while($row = mysql_fetch_array($result))
       {
	echo "<tr>";
	$f_jdid=$row['fjdid'];
	$f_escort=$row['fescort'];
 	echo "<td> $f_jdid </td>";
	echo "<td> $f_escort </td>";
	echo "</tr>";
       }
    
	?>
	</table>
	</div>
	<?php
   }


$query="SELECT * FROM done_db WHERE dproid = '$home_username'";
$result=mysql_query($query,$connection);
echo "<br><br>";
if(!$result)
    die("Query`Failed!");
   else
   {
    
     $cnt=mysql_num_rows($result);
     ?>
	<div id= "dt">
	<table class=donetable>
	<tr>
	<th>Done Judge ID</th>	
	</tr>
               <td>
      <?php

       while($row = mysql_fetch_array($result))
       {
	$f_jdid=$row['djdid'];
	echo " $f_jdid | ";	
       }
    
	
	?>
              </td>
	</table>
	</div>
	<hr width="20%" size="1" color="#D3D3D3">
	</div>
	
	  
	<?php
   }
$query="SELECT * FROM notices_db WHERE notice_proid = '$' or notice_proid = '$home_username'";
$result=mysql_query($query,$connection);

   if(!$result)
    die("Query`Failed!");
   else
   {
    
     $cnt=mysql_num_rows($result);
     ?>

	<div id = "nt">
	
		<!--<table <table CELLSPACING="0" CELLPADDING="0" WIDTH="50%">
		<tr>
		<th>Date</th/>
		<th>Time</th> 
		<th>Notice</th>
		</td></table>-->
      <?php

       while($row = mysql_fetch_array($result))
       {
	$notice_c =$row['notice_content'];
	$notice_d =$row['notice_date'];
              $notice_type=$row['notice_proid'];
			  ?>
			
		
<?php
$date = date("d/m/y  H:i:s", time()) ;		
 	if($notice_type == '$' )
              {
			  
			  
               echo " <p id=\"noticetype1\">  $notice_c </p><hr width=\"99%\" size=\"1\" color=\"#D3D3D3\">";}
              else
              {
			  //$date = date('Y-m-d');
               echo " <p id=\"noticetype2\"> &nbsp$notice_c </p><hr width=\"99%\" size=\"1\" color=\"#D3D3D3\">";}
              
          
       }
    
	?>
	</div>
	<?php
   }
?>

<h1>
INC 2012 Judging Portal
</h1>
<div id="title">

</div>
<div id="one">

<?php 
$query3="SELECT * FROM flash_notice";
$result3=mysql_query($query3,$connection);

   if(!$result3)
    die("Query`Failed!");
   else
   {
    
   $row= mysql_fetch_array($result3);
   $home_flash=$row['f_notice'];
   echo " <blink width=\"90%\">  $home_flash</blink>"; 
   }
?>
<br>
</div>

         <div id = "doneform" >
	<form method="post" action="done.php" name="done_form">
	Select the Judge Id who has Judged you..<br><br>
	<select name="ddjdid" style="position:absolute; left:80px;top :80px; height : 30px; width : 90px;">
	
 	<?php
	$query="SELECT * FROM floating_db WHERE fproid = '$home_username'";
	$result=mysql_query($query,$connection);

	 if(!$result)
    	die("Query`Failed!");
   	else
   	{
    
   	  $cnt=mysql_num_rows($result);
	  while($row = mysql_fetch_array($result))
       	{
	echo "<option>";
	$f_jdid=$row['fjdid'];
	echo " $f_jdid";
	echo "</option>";
      	 }
    

	}
	?> 
             
	</select>
               <br>
	<input type="submit" onClick="notify()" value="Done"  style="font-family:Arial; font-size:1em; position:absolute; left: 180px; top :80px;display:block; padding: 4px 5px 4px 25px; color : white; background-color: black; opacity:0.8; border: 2px groove gray;">
	</form>
         </div>  


<?php
header("refresh:10,home.php");
}
else
{
echo "going to index";
header("refresh:0,index.php");
}
?>

<div id=toppanel>
  
    <div  id="topbutton">
    	
	<div id=topbutton1>
    	<a href="home.php" >HOME </a>    
              </div>

     	 
     	<div id=topbutton2>
     	<a href="rules.php" >RULES</a>  
     	</div>


   	<div id=topbutton5>  
              <a href="logout.php" >LOGOUT</a>   
   	</div>
	
	<div id=topbutton6>
	JUDGES DONE: <?php echo "$home_pro_noj"?>
	</div>    
	
	<div id=topbutton7>
	<?php echo " USER ID :$home_username"?>
	</div>    

    </div>
</div>



<div id="query">
<form name = "from_query" action="submitquery.php" method="post">
<input type="text" name= "user_query" style=" width : 250px"><br />
<input type="submit" meyhod="POST" value="Submit Query" style="font-family:Arial; font-size:1em; position:absolute; left: 25px; display:block; padding: 4px 5px 4px 5px; color : white; background-color: black; opacity:0.8; border: 2px groove grey;">
</div>

<div id="authors">
<i>Nikhil | Chaitanya | Ankit | Avinash</i>
</div>
</body>
 </html>