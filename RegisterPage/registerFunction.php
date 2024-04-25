<?php

$servername = "127.0.0.1";
$username = "root";
$password = "AlexiaTs";
$database = "djanam";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if (isset($_POST['submit'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    


    $errors = [];

    if (strlen($username) < 3 || strlen($username) > 20) {
        $errors[] = "Invalid username!";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email!";
    }

    $pattern = "/^(?=.*\d)(?=.*[A-Z]).{8,}$/";
    if (!preg_match($pattern, $password)) {
        $errors[] = "Password must contain at least one uppercase letter and one digit, and be at least 8 characters long!";
    }

    $sql = "SELECT * FROM user WHERE Email = ?";
    $pdoStatement = $connection->prepare($sql);
    $pdoStatement->execute([$email]);
    $data = $pdoStatement->fetchAll();

    if (count($data) != 0) {
        $errors[] = "Email already registered!";
    }

    if (!$errors) {
     
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT, ["cost" => 8]);

        $sql = "INSERT INTO user (Name, Email, Password) VALUES (?,?,?)";
        $pdoStatement = $connection->prepare($sql);
        
$pdoStatement->bindParam(1, $username, PDO::PARAM_STR);
$pdoStatement->bindParam(2, $email, PDO::PARAM_STR);
$pdoStatement->bindParam(3, $hashedPassword, PDO::PARAM_STR);

        $pdoStatement->execute();

        $userId = $connection->lastInsertId();
        $defaultRoleId = 1; 
        $sqlUserRole = "INSERT INTO user_role (RoleID, UserID) VALUES (?, ?)";
        $pdoStatementUserRole = $connection->prepare($sqlUserRole);
        $pdoStatementUserRole->execute([$defaultRoleId, $userId]);

        header("Location:http://localhost/Djanam-Sky-Club/LoginPage/login.php");
        exit();
    } else {
       
        foreach ($errors as $error) {
            $message = $error . "\\nTry again.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
    } 
}
?>
