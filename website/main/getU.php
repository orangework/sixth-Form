<?php
if(!isset($_COOKIE[login])) {
    header( 'Location: main.php' ) ; 
} 



 class MyDB extends SQLite3
   {
      function __construct()
      {
         $this->open('data.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      //echo "Opened database successfully\n";
   }






   $sql ="SELECT * from details;";
$ret = $db->query($sql);
echo "<table style='border:1px solid black;'><tr><td style='border:1px solid black;'>Name</td><td style='border:1px solid black;'>Form</td></tr>";
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	   if($row['in']=='no'){
	   echo "<tr >";
	   
      echo "<td>". $row['username'] . "</td>";
     echo "<td> No value </td>";
      echo "</tr>";
  }
   }
  
   $db->close();

?>
