<!DOCTYPE html>
<html>
    <head>
          <title>Account form</title>
          <meta name="viewport" content>
          <meta name="login form">
          <link rel="stylesheet" href="style.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script>
              // Hides password
              $(document).ready(function(){
                  $('#password').on('click', function(){
                      var passInput = $("#password");
                      passInput.attr('type','password');
                    })
                });
                // Checks username and password field are empty
                //$(document).ready(function() {
                    //$('#login').click(function() {
                        //if (!$('#password').val() || !$('#username').val()) {
                        //    alert('Your have an empty field');
                        //}
                        //if (!$('#username').val()) {
                        //    alert('Please try to correct it!');
                        //}
                   //})
                //});
            </script>
        </head>
        <body style="background-color:#2eb82e">
            <div class="main">
                <h2>Project-workcard</h2>
            </div>
            <div class="box">
                <center>
                    <h4>Welcome! Please enter you username and password to login.</h4><br>
                    <?php 
                    if(isset($message)) { 
                        echo '<label class="text-danger">'.$message.'</label>'; 
                    } 
                    ?>  
                    <form action="login.php" method="post">
                        <h4>Username:</h4>
                        <input type="text" name="username"><br><br>
                        <h4>Password: </h4>
                        <input type="password" id="password" name="password"><br><br>
                        <button name="login" id="login" class="myButton" value="Login">Login</button>
                    </form>
                    <br>
                    <h3>You don't have an account?</h3>
                    <button class="myButton" onclick="window.location.href='profile.php'">Click here</button>
                </center>
            </div>
        </body>
</html>