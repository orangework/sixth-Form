<?php
if(!isset($_COOKIE[login])) {
    header( 'Location: main.php' ) ;
}



$db = new SQLite3('data.db');
$r = $db->query('SELECT * FROM details');
while($row = $r->fetchArray(SQLITE3_ASSOC) ){

  echo $row['username'];
  echo ",";

}

$db->close();


 ?>
