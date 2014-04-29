<html>
 <head>
   <title>Simple Login with CodeIgniter</title>
 </head>
 <body>
   <h1>Please Log In</h1>

   <form name="login" method="post" action="<?php echo($_SERVER['PHP_SELF']);?>">
     <label for="username">Username:</label>
     <input type="text" size="20" id="username" name="username"/>
     <br/>
     <label for="password">Password:</label>
     <input type="password" size="20" id="password" name="password"/>
     <br/>
     <input type="submit" value="Login" name="submit-login"/>
   </form>
 </body>
</html>

