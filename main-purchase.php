<?php  
 session_name("user"); 
 session_start();  
?> 
<!DOCTYPE html>
<html>
      <head>
          <title>Main page</title>
          <meta name="viewport" content>
          <meta name="login form">
          <link rel="stylesheet" href="style.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        </head>
        <body style="background-color:#2eb82e">
        <div class="box">
            <center>
                <h4>Welcome to our shop!</h4><br>
                
                <button type="button" onclick="window.location.href='main.php'" class="myButton">Go back</button>
                <form action="logout.php" method="post">
                    <button class="myButton">Log out</button>
                </form>
            </center>
        </div>
    </body>
</html>