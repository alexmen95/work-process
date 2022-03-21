<?php

session_name("user");
session_start();

if (isset($_POST['let'])) {
    // Get values from submitted form
    $username = $_POST['username'];
    $name = $_POST['name'];
    $nameOfProject = $_POST['name-of-project'];
    $date = $_POST['date'];
    $collaboration = $_POST['collaboration'];

    $host = 'localhost';
    $uname = 'root';
    $passwd = '';
    $dbname = 'project-workcard';

    // Create connection
    $conn = mysqli_connect($host, $uname, $passwd, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
       }
       $sql = "INSERT INTO purchases VALUES (DEFAULT, '$username', '$name', '$nameOfProject', '$date', '$collaboration')";
       if (mysqli_query($conn, $sql)) {
           echo "<h2>New record created successfully! Please wait just a little!</h2>";
           header("Refresh:3, url=main.php");
       } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
       mysqli_close($conn);

    }  

?>