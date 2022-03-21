<?php

session_name("user");
session_start();

if (isset($_POST['delete'])) {

    $host = 'localhost';
    $uname = 'root';
    $passwd = '';
    $dbname = 'project-workcard';
    $user = $_SESSION["username"];

    // Create connection
    $conn = mysqli_connect($host, $uname, $passwd, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
       }
       $sql = "DELETE FROM users WHERE username='$user'";
       if (mysqli_query($conn, $sql)) {
           echo "<h2>Your profile is deleted from system! Please wait, until direct you to login page!</h2>";
           header("Refresh:3, url=begin.php");
       } else {
           echo "Error: " . $sql . "<br>" . mysqli_error($conn);
       }
       mysqli_close($conn);

   }  


?>