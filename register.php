<?php  
 
 if (isset($_POST['insert'])) {
     // Get values from submitted form
     $username = $_POST['username'];
     $password = $_POST['password'];
     $name = $_POST['name'];
     $email = $_POST['email'];
     $telephone = $_POST['telephone'];
     $city = $_POST['city'];

     $host = 'localhost';
     $uname = 'root';
     $passwd = '';
     $dbname = 'project-workcard';

     // Create connection
     $conn = mysqli_connect($host, $uname, $passwd, $dbname);

     if (!$conn) {
         die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "INSERT INTO users VALUES (DEFAULT, '$username', '$password', '$name', '$email', '$telephone', '$city')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully! Please wait, until direct you to login page!";
            header("Refresh:3, url=begin.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        mysqli_close($conn);

    }  
  
?>