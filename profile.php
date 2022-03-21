<!DOCTYPE html>
<html>
      <head>
          <title>Fill form</title>
          <meta name="viewport" content>
          <meta name="login form">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
          <script>
          $(document).ready(function(){
              $('#showPass').on('click', function(){
                  var passInput = $("#password");
                  if (passInput.attr('type')==='password') {
                      passInput.attr('type','text');
                    } else {
                        passInput.attr('type','password');
                    }
                });
            });
            
            $(document).ready(function() {
                $("#but").click(function() {
                    $("#input").reset()
                });
            });
            </script>
            <link rel="stylesheet" href="style.css">
        </head>
        <body style="background-color:#2eb82e">
        <div class="box">
            <center>
                <h2>You don't have an account?<br> Please fill this blank to create an account!</h2><br>
                <form action="register.php" method="post">
                    <table>
                        <tr>
                            <td>
                                <h4>Username: </h4>
                                <input type="text" id="username" name="username"><br>
                            </td>
                            <td>
                                <h4>Password: </h4>
                                <input type="password" id="password" name="password"><br>
                                <input type="checkbox" id="showPass" class="checkm" ><label>Show password</label><br><br>
                            </td>
                            <td>
                                <h4>Name: </h4>
                                <input type="text" name="name" style="margin: 4px"><br><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Telephone: </h4>
                                <input type="number" name="telephone" style="margin: 4px"><br><br>
                            </td>
                            <td>
                                <h4>City: </h4>
                                <input type="text" name="city" style="margin: 4px"><br><br>
                            </td>
                            <td>
                                <h4>Email: </h4>
                                <input type="text" name="email" style="margin: 4px"><br><br>
                            </td>
                        </tr>
                    </table>
                    <button name="insert" class="myButton" style="margin:5px" action="">Submit</button><button id="but" class="myButton" action="">Clear</button>
                </form>
                <br>
            </center>
            <center>
                <br>
            </center>
            <center>
                <button class="myButton" onclick="window.location.href='begin.php'">Back to main page</button>
            </center>
        </div>
    </body>
</html>