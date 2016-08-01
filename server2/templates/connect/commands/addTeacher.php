<?php
if(!isset($_COOKIE[login])) {
    header( 'Location: ../index.php' ) ;
}
$name = $_POST["teacher"];
$subject = $_POST["subject"];
$comment = $_POST["comment"];
echo $name;

$db = new SQLite3('data.db');

$db->query("INSERT INTO whoIsNotIn (teacher,subject,comment) VALUES ('$name','$subject','$comment')");
 header( 'Location: ../teachers.php' ) ;


?>
