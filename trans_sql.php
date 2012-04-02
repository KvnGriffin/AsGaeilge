 <?php   
 

 
 /***** Start database connection *****/
 $con = mysql_connect("localhost","root","*******YOUR PASSWORD*******");
 if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
   
/******   Create tables   ************/
// Database 'Translate' created through PhpMyAdmin

 mysql_select_db("Translate", $con);
 

 $sql1 = "CREATE TABLE Dictionary
 (

 Id int not null auto_increment,
 English varchar(100) not null,
 Irish varchar(100),
 primary key (id)
  )";
  
 mysql_query($sql1, $con);  
 mysql_close($con);
 
  echo "<p>Table created</p>";
  
?> 
