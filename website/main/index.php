<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>School app - Login</title>





<?php
if(isset($_COOKIE[login])) {
    header( 'Location: main.php' ) ; 
} 

?>



</head>

<body>


<h1>Login</h1>  



<!-- This is the form, it's insecure no encryption and the information is sent using plan GET -->

<form action="login.php">
	
<p>Username: <input type="text" name="u" /> </p>

<p>Password: <input type="password" name="p" /> </p>
<input type="submit" value="Login" \>
</form>


</body>

</html>
