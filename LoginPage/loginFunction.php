<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "AlexiaTs";
    $database = "djanam";

    try {
      $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
      $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      //echo "Connected successfully";
    } catch(PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
    session_start();  
    if ( isset( $_POST['submit'] ) ) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = $connection->prepare("
          SELECT u.*, ur.RoleID 
          FROM user u
          LEFT JOIN user_role ur ON ur.UserID = u.id  
          WHERE u.name = ?
        "); 
        $sql->execute([$username]); 
        $user = $sql->fetch();

      if ( $user && password_verify( $password, $user['Password'] ))

        {
          $_SESSION['user'] = $user;
          header("Location: http://localhost/Djanam-Sky-Club/IndexPage/index.php");
            exit();
        }else{
            $message = "Username and/or Password incorrect.\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        } 
    }
     ?>