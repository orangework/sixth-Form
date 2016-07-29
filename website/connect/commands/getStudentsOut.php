<?php
if(!isset($_COOKIE[login])) {
    header( 'Location: ../index.php' ) ;
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
echo "<table style='border:1px solid black;width:60%'><tr><td style='border:1px solid black;width:20%'>Name</td><td style='width:50%; border:1px solid black;'>Reason</td><td style='width:30%; border:1px solid black;'>Time</td></tr>";
   while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
	   if($row['in']=='no'){
	   echo "<tr >";

      echo "<td>". $row['username'] . "(" . $row['clientId'] . ")</td>";
      echo "<td>". $row['reason'] . "</td>";
     echo "<td>". $row['edit'] . "</td>";
      echo "</tr>";
  }
   }

   $db->close();



?>
