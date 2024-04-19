<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$database = "djanam";

try {
    $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Проверка дали има заявка за редактиране на запис
if(isset($_GET['id'])) {
    $reservation_id = $_GET['id'];
    
    // Ако формата за редактиране е изпратена
    if(isset($_POST['submit'])) {
        // Получаване на новите данни от формата
        $new_name = $_POST['name'];
        $new_phone = $_POST['phone'];
        $new_people = $_POST['people'];
        $new_date = $_POST['date'];
        $new_time = $_POST['time'];
        
        // Актуализиране на данните в базата данни
        try {
            $sql = "UPDATE reservation SET Name = ?, Phone = ?, People = ?, Date = ?, Time = ? WHERE ID = ?";
            $stmt= $connection->prepare($sql);
            $stmt->execute([$new_name, $new_phone, $new_people, $new_date, $new_time, $reservation_id]);
            echo "Reservation updated successfully";
            header('Location: userReservation.php'); // Пренасочване към userReservation.php
            exit(); // Уверете се, че скриптът спира тук, за да не продължи изпълнението
        } catch(PDOException $e) {
            echo "Error updating record: " . $e->getMessage();
        }
    }
    
    // Извличане на текущите данни за редактиране
    try {
        $stmt = $connection->prepare("SELECT Name, Phone, People, Date, Time FROM reservation WHERE ID = ?");
        $stmt->execute([$reservation_id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error fetching record: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reservation</title>
</head>
<body>
    <h2>Edit Reservation</h2>
    <form action="" method="POST">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" value="<?php echo isset($result['Name']) ? $result['Name'] : ''; ?>"><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" value="<?php echo isset($result['Phone']) ? $result['Phone'] : ''; ?>"><br>
        <label for="people">People:</label><br>
        <input type="text" id="people" name="people" value="<?php echo isset($result['People']) ? $result['People'] : ''; ?>"><br>
        <label for="date">Date:</label><br>
        <input type="text" id="date" name="date" value="<?php echo isset($result['Date']) ? $result['Date'] : ''; ?>"><br>
        <label for="time">Time:</label><br>
        <input type="text" id="time" name="time" value="<?php echo isset($result['Time']) ? $result['Time'] : ''; ?>"><br><br>
        <input type="submit" name="submit" value="Save">
    </form>
  
</body>
</html>
