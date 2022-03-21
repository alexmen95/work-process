<?php  
 session_name("user");
 session_start();    
?> 
<!DOCTYPE html>
<html>
      <head>
          <title>Profile page</title>
          <meta name="main profile page">
          <link rel="stylesheet" href="style.css">
          <link rel="stylesheet" href="style-table.css">
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
        </head>
        <body style="background-color:#2eb82e">
        <div class="box">
            <center>
                <h4>Do you want to change your profile?!</h4><br>
                <h4>This is your current profile's data</h4>
                <?php
                echo "<table class='customTable'>";
                echo "<tr><th>Username</th><th>Password</th><th>Name</th><th>Email</th><th>Phone</th><th>City</th></tr>";
                
                class TableRows extends RecursiveIteratorIterator {
                    function __construct($it) {
                        parent::__construct($it, self::LEAVES_ONLY);
                    }
                    
                    function current() {
                        return "<td style='width: 150px; border: 2px solid black;'>" . parent::current(). "</td>";
                    }
                    
                    function beginChildren() {
                        echo "<tr>";
                    }
                    
                    function endChildren() {
                        echo "</tr>" . "\n";
                    }
                }
                
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project-workcard";
                $user = $_SESSION["username"];
                
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT username, password, name, email, telephone, city FROM users WHERE username = '$user'");
                    $stmt->execute();
                    
                    // set the resulting array to associative
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    
                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                        echo $v;
                    }
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conn = null;
                echo "</table>";
                ?>
                <br>
                <h4>Fill these fields and then click the button Submit to update your profile.</h4>
                <form action="main-change.php" method="post">
                    <table>
                        <tr>
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
                    <button name="insert" class="myButton" style="margin:5px">Submit profile's settings</button>
                </form>
                <br>
                <hr>
                <br>
                <h4>No, thanks! I just want to work!</h4>
                <button type="button" onclick="window.location.href='main.php'" class="myButton">Go back to main page</button><br>
                <br>
                <hr>
                <form action="logout.php" method="post">
                    <br>
                    <h4>You want to leave the system? Click here!</h4>
                    <button class="myButton">Log out</button>
                </form>
                <br>
                <hr>
                <br>
                <h4>Delete your profile? Click here!</h4>
                <form action="main-delete.php" method="post">
                    <button class="myButton" name="delete">Delete profile</button>
                </form>
            </center>
        </div>
    </body>
</html>