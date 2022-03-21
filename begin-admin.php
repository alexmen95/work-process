<!DOCTYPE html>
<html>
    <head>
          <title>Admin login form</title>
          <meta name="viewport" content>
          <meta name="login form">
          <link rel="stylesheet" href="style.css">
          <link rel="stylesheet" href="style-table.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script>
              // Hides password
              $(document).ready(function(){
                  $('#password').on('click', function(){
                      var passInput = $("#password");
                      passInput.attr('type','password');
                    })
                });
            </script>
        </head>
        <body style="background-color:#99ccff">
            <div class="main">
                <h2>Web-workcard.bg</h2>
            </div>
            <div class="box">
                <center>
                    <h4>Welcome, admin!</h4><br>
                    <form action="login-admin.php" method="post">
                        <h4>Username:</h4>
                        <input type="text" class="put" name="username"><br><br>
                        <h4>Password: </h4>
                        <input type="password" class="put" id="password" name="password"><br><br>
                        <button name="login" id="login" class="But" value="Login">Login</button>
                    </form>
                </center>
            </div>
        </body>
</html>