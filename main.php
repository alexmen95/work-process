<?php  
 session_name("user");
 session_start();  
   
?> 
<!DOCTYPE html>
<html>
      <head>
          <title>Main page</title>
          <meta name="login form">
          <link rel="stylesheet" href="style.css">
          <link rel="stylesheet" href="style-table.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        </head>
        <body style="background-color:#2eb82e">
        <div class="box">
            <center>
                <?php
                if(isset($_SESSION["username"])) { 
                    echo '<h3>Login Success, Welcome: '.$_SESSION["username"].'</h3>';
                } else { 
                    header("begin.php");  
                }
                ?>
                <h3>This your workcard's results and your colleagues.</h3>
                <center>
                <?php 
                echo "<table class='customTable'>";
                echo "<tr><th>Number</th><th>Username</th><th>Name</th><th>Name of project</th><th>Date</th><th>Collaboration</th></tr>";
                
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
                
                try {
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conn->prepare("SELECT * FROM purchases");
                    $stmt->execute();
                    
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
                <br>
                <form action="main-update-work.php" method="post">
                    <table>
                        <tr>
                            <td>
                                <h4>Username: </h4>
                                <input type="text" id="username" name="username"><br>
                            </td>
                            <td>
                                <h4>Name: </h4>
                                <input type="text" name="name" style="margin: 4px"><br><br>
                            </td>
                            <td>
                                <h4>Name of project:</h4>
                                <input type="text" name="name-of-project" style="margin: 4px"><br>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h4>Date: </h4>
                                <input type="text" name="date" style="margin: 4px"><br><br>
                            </td>
                            <td>
                                <h4>Collaboration: </h4>
                                <input type="text" name="collaboration" style="margin: 4px"><br><br>
                            </td>
                        </tr>
                    </table>
                    <button name="let" class="myButton" style="margin:5px" action="">Upload results</button>
                </form>
                <br>
                <hr>
                <br>
                <h4>You want to change your profile settings?</h4>
                <br>
                <button type="button" onclick="window.location.href='main-profile.php'" class="myButton">Change profile's settings</button>
                <form action="logout.php" method="post">
                    <br>
                    <hr>
                    <br>
                    <h4>Do you want to leave?Click here!</h4>
                    <button class="myButton">Log out</button>
                </form>
            </center>
        </div>
    </body>
</html>