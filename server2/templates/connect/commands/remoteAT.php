<?php
if(!isset($_COOKIE[login])) {
    header( 'Location: main.php' ) ; 
} 

$what = $_GET['type'];

if($what=="list"){

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


}

if($what=="del"){
echo "Deletin\n";
$name = $_GET["teacher"];
	
$db = new SQLite3('data.db');
$db->query("DELETE FROM whoIsNotIn WHERE teacher=$name");
echo "Row deleted \n";
 header( 'Location: ../teachers.php' ) ; 

}


if($what=="delAll"){
echo "Deletin\n";

	
$db = new SQLite3('data.db');
$db->exec('DELETE FROM whoIsNotIn');
echo "Row deleted \n";
 header( 'Location: ../teachers.php' ) ; 

}


?>
