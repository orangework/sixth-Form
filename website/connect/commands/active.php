<?php

if(!isset($_COOKIE[login])) {
    header( 'Location: main.php' ) ;
}

$db = new SQLite3('data.db');
$r = $db->query('SELECT * FROM access LIMIT 10');
echo "<table style='border:1px solid black;width:30%;'><tr><td style='border:1px solid black;width:50%;'>Username</td><td style='border:1px solid black;'>timestamp</td>";
while($row = $r->fetchArray(SQLITE3_ASSOC) ){

  echo "<tr >";
  $r2 = $db->query("SELECT * FROM details WHERE clientId=$row[clientId] ");
  $row2 = $r2->fetchArray(SQLITE3_ASSOC);
   echo "<td>". $row2['username'] . "</td>";
   echo "<td>". $row['datetime'] . "</td>";
   echo "</tr>";

}

$db->close();





 ?>
