<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>School app - Display</title>

<?php

if(!isset($_COOKIE[login])) {
    header( 'Location: main.php' ) ; 
} 


?>


</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>

<body>


<h1>Display</h1>  


<h3>Teachers out</h3>
<div id="t"></div>
<h3>Students out</h3>
<div id="s"></div>





















</body>



<script>
$("#s").load("getU.php");
$("#t").load("getT.php");
</script>



</html>
