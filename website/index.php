<!DOCTYPE html>
<html >
  <head>
	  
	  <?php
if(isset($_COOKIE[login])) {
    header( 'Location: connect/index.php' ) ; 
} 

?>

	  
    <meta charset="UTF-8">
    <title>6th form login</title>




        <link rel="stylesheet" href="css/style.css">




  </head>

  <body>

    <h1>Sixth form login</h1>

<!-- Login Container -->n
<section class="login">
    <form action="connect/login.php" method="post">

        <!-- The Username Field -->
        <label for="username">Username
        <input type="text" name="u" id="username" />
    	</label>

        <!-- The Password Field -->
        <label for="password">Password
        <input type="password" name="p" id="password" />
        </label>

        
        <!-- Clearn both sides -->
        <div class="clear"></div>

        

        <!-- The Login Button -->
        <input type="submit" value="Login" />
    </form>
    </section>





  </body>
</html>
