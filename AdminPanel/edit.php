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
$sql_user = "SELECT name FROM user WHERE id = $id";
$result_user = $conn->query($sql_user);
$row_user = $result_user->fetch_assoc();
$name = $row_user["name"];

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
            header("Location:../AdminPanel/panel.php");
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
    <title>Edit User</title>
</head>
<body>

<!-- Форма за редактиране на потребителя -->
<div>
    <h1>Edit User</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . "?id=$id"; ?>" method="post">
        <label for="name">Name:</label><br>
        <!-- Поле за въвеждане на името -->
        <input type="text" name="name" id="name" value="<?php echo $name; ?>"><br><br>
        <label for="role_id">Role:</label><br>
        <!-- Поле за избор на роля -->
        <select name="role_id" id="role_id">
            <option value="1" <?php if ($role_id == 1) echo "selected"; ?>>User</option>
            <option value="2" <?php if ($role_id == 2) echo "selected"; ?>>Admin</option>
        </select><br><br>
        <!-- Бутон за потвърждение на редакцията -->
        <input type="submit" value="Update">
    </form>
</div>

</body>
</html>