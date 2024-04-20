<?php

// Връзка с MySQL базата данни
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "djanam";

// Създаване на връзка с базата данни
$conn = new mysqli($servername, $username, $password, $database);

// Проверка на връзката
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Извличане на ID на реда за редактиране от query string
if(isset($_GET["id"])) {
    $id = $_GET["id"];
} else {
    echo "Error: ID parameter is missing.";
    exit;
}

// Извличане на данните за потребителя от таблицата user
$sql_user = "SELECT name, email FROM user WHERE id = $id";
$result_user = $conn->query($sql_user);
$row_user = $result_user->fetch_assoc();
$name = $row_user["name"];
$email = $row_user["email"];

// Извличане на ролята на потребителя от таблицата user_role
$sql_role = "SELECT RoleID FROM user_role WHERE UserID = $id";
$result_role = $conn->query($sql_role);
$row_role = $result_role->fetch_assoc();
$role_id = isset($row_role["RoleID"]) ? $row_role["RoleID"] : 1; // Ако RoleID не е дефиниран, задайте му стойност 1 по подразбиране

// Обработка на изпращането на формата
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаване на актуализираните данни от формата
    $name = $_POST["name"];
    $role_id = $_POST["role_id"];

    // Актуализация на данните в таблицата user
    $sql_update_user = "UPDATE user SET name='$name' WHERE id=$id";
    if ($conn->query($sql_update_user) === TRUE) {
        // Актуализация на ролята в таблицата user_role
        $sql_update_role = "UPDATE user_role SET RoleID=$role_id WHERE UserID=$id";
        if ($conn->query($sql_update_role) === TRUE) {
            // Пренасочване към страницата с таблицата
            header("Location:../AdminPanel/adminPage.php");
            exit();
        } else {
            echo "Error updating user role: " . $conn->error;
        }
    } else {
        echo "Error updating user record: " . $conn->error;
    }
}

// Затваряне на връзката с базата данни
$conn->close();
?>

<!-- Форма за редактиране -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../Images/DjanamLogo.jfif">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap">
    <link rel="stylesheet" href="roleEditStyle.css">
    <title>Edit User</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../IndexPage/index.php">
            <img src="../Images/DjanamLogo2.svg" alt="Djanam Logo">
            Djanam Sky Club
        </a>
        <form class="d-flex" action="../AdminPanel/adminPage.php">
            <button class="btn btn-outline-light" type="submit">Назад</button>
        </form>
    </div>
</nav> 
<section class="hero">
<!-- Форма за редактиране на потребителя -->
<div class="form-container">
    <h1 class="text-center mb-4">Edit User</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=$id"; ?>" method="post">
        <div class="mb-3">
            <label for="name" class="form-label">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" readonly>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>"readonly>
        </div>
        <div class="mb-3">
            <label for="role_id" class="form-label">Role:</label>
            <select class="form-select" id="role_id" name="role_id">
                <option value="1" <?php if ($role_id == 1) echo "selected"; ?>>User</option>
                <option value="2" <?php if ($role_id == 2) echo "selected"; ?>>Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<!-- Bootstrap JS bundle (including Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</div>


</body>
</html>