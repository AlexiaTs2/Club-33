<?php
session_start();

// Connect to the MySQL database
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "djanam";
$conn = new mysqli($servername, $username, $password, $database);

// Проверка за връзка с базата данни
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Разрешение на идентификационния параметър ID от URL адреса
$id = isset($_GET["ID"]) ? $_GET["ID"] : null;
if ($id === null) {
    echo "Missing ID parameter";
    exit;
}

// Извличане на данни за потребителя от базата данни
$sql = "SELECT name, role FROM user WHERE ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

// Проверка за успешно извличане на данни
if (!$row) {
    echo "User not found";
    exit;
}

// Инициализация на променливите с данните за потребителя
$name = $row["name"];
$role = $row["role"];

// Обработка на формата при изпращане
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Вземане на данните от формата
    $name = $_POST["name"];
    $role = $_POST["role"];

    // Обновяване на данните в базата данни
    $sql = "UPDATE user SET name=?, role=? WHERE ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $name, $role, $id);
    if ($stmt->execute()) {
        // Пренасочване към страницата с потребителите
        header("Location: Panel.php");
        exit;
    } else {
        echo "Error updating user: " . $conn->error;
    }
}

// Затваряне на връзката с базата данни
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>

<h1>Edit User</h1>
<form method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $name; ?>"><br>
    <label for="role">Role:</label><br>
    <input type="radio" id="user" name="role" value="1" <?php echo ($role == 1) ? "checked" : ""; ?>>
    <label for="user">User</label><br>
    <input type="radio" id="admin" name="role" value="2" <?php echo ($role == 2) ? "checked" : ""; ?>>
    <label for="admin">Admin</label><br>
    <input type="submit" value="Save">
</form>

</body>
</html>
