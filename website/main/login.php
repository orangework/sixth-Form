<?php


$u = $_POST["u"];
$p = $_POST["p"];

if($u =="test" && $p == "test"){
	setcookie("login", $u, time() + (86400 * 30), "/");
	header( 'Location: main.php' ) ; 
}

else{
	
header( 'Location: ../index.php' ) ; 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Internal</title>

</head>

<body>


<h1>You should not be on this page.</h1>

</body>

</html>
