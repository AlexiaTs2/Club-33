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

if(isset($_GET['id'])) {
    $reservation_id = $_GET['id'];
    
    if(isset($_POST['submit'])) {
        $new_name = $_POST['name'];
        $new_phone = $_POST['phone'];
        $new_people = $_POST['people'];
        $new_date = $_POST['date'];
        $new_time = $_POST['time'];
        
        
        try {
            $sql = "UPDATE reservation SET Name = ?, Phone = ?, People = ?, Date = ?, Time = ? WHERE ID = ?";
            $stmt= $connection->prepare($sql);
            $stmt->execute([$new_name, $new_phone, $new_people, $new_date, $new_time, $reservation_id]);
            echo "Reservation updated successfully";
            header('Location: userReservation.php'); 
            exit(); 
        } catch(PDOException $e) {
            echo "Error updating record: " . $e->getMessage();
        }
    }
    
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
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../Images/DjanamLogo.jfif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap">
    <link rel="stylesheet" href="reservationEditStyle.css">
    <title>Таблица с резервации | Djanam Sky Club</title>
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
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Edit Reservation</h2>
                        <form action="" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo isset($result['Name']) ? $result['Name'] : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo isset($result['Phone']) ? $result['Phone'] : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="people" class="form-label">People:</label>
                                <input type="text" class="form-control" id="people" name="people" value="<?php echo isset($result['People']) ? $result['People'] : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Date:</label>
                                <input type="text" class="form-control" id="date" name="date" value="<?php echo isset($result['Date']) ? $result['Date'] : ''; ?>">
                            </div>
                            <div class="mb-3">
                                <label for="time" class="form-label">Time:</label>
                                <input type="text" class="form-control" id="time" name="time" value="<?php echo isset($result['Time']) ? $result['Time'] : ''; ?>">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>


