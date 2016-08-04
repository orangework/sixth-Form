<?php
$command = $_GET["command"];
if(!isset($_COOKIE[login])) {
    header( 'Location: ../index.php' ) ;
}

if($command=="out"){
  $name = $_POST["student"];
  $reason = $_POST["reason"];

  $db = new SQLite3('data.db');

  $db->query("UPDATE details SET 'in'='no',reason='$reason' WHERE username='$name'");
   header( 'Location: ../students.php' ) ;



}


if($command=="in"){
  $name = $_POST["clientId"];


  $db = new SQLite3('data.db');

  $db->query("UPDATE details SET 'in'='yes' WHERE clientId=$name");
   header( 'Location: ../students.php' ) ;


}



 ?>
