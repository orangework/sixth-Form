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






   $sql ="SELECT * from whoIsNotIn;";
$ret = $db->query($sql);
echo "<table style='border:1px solid black;'><tr><td style='border:1px solid black;'>Teacher</td><td style='border:1px solid black;'>Subject</td><td style='border:1px solid black;'>Comment</td></tr>";
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	   echo "<tr >";
	   
      echo "<td>". $row['teacher'] . "</td>";
      echo "<td>". $row['subject'] ."</td>";
      echo "<td>". $row['comment'] ."</td>";
      echo "</tr>";
   }
  
   $db->close();

?>
