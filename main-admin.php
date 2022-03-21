<?php  
 session_name("admin");
 session_start();  
?> 
<!DOCTYPE html>
<html>
      <head>
          <title>Main Admin page</title>
          <meta name="viewport" content>
          <meta name="main admin page">
          <link rel="stylesheet" href="style.css">
          <link rel="stylesheet" href="style-table.css">
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        </head>
        <body style="background-color:#99ccff">
        <div class="box">
            <center>
                <h4>Your peoples!</h4><br>
                <?php // style='border: solid 2px black;'
                echo "<table class='customTable'>";
                echo "<tr><th>Username</th><th>Name</th><th>Email</th><th>Phone</th><th>City</th></tr>";
                
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
                    $stmt = $conn->prepare("SELECT username, name, email, telephone, city FROM users");
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
                <hr>
                <br>
                <h4>User's results</h4>
                <?php 
                echo "<table class='customTable'>";
                echo "<tr><th>Number</th><th>Username</th><th>Name</th><th>Name of project</th><th>Date</th><th>Collaboration</th></tr>";
                
                class TableRow extends RecursiveIteratorIterator {
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
                    
                    foreach(new TableRow(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
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
                <hr>
                <br>
                <h4>Do you want to leave? Click here!</h4>
                <br>
                <form action="logout-admin.php" method="post">
                    <button class="But">Log out</button>
                </form>
            </center>
        </div>
    </body>
</html>