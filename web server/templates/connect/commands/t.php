<?php
$db = new SQLite3('data.db');
$db->exec('DELETE FROM whoIsNotIn WHERE teacher="Bobby"');
echo "Row deleted \n";
?>
