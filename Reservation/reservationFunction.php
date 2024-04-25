<?php
    $db_host = "127.0.0.1"; 
    $db_name = "djanam";
    $db_user = "root"; 
    $db_pass = "AlexiaTs";

    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $people = $_POST['people'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $time = $_POST['time'];
    
        $errors = array();
    
        $result = $conn->query("SELECT * FROM reservation WHERE Date = '$date' AND Time = '$time'");
    
        if ($result->num_rows > 0) {
            $errors[] = "Reservation for the selected date and time already exists.";
        }
    
        if (empty($errors)) {
            $sql = "INSERT INTO reservation (Name, Phone, People, Date, Time) 
                    VALUES ('$name', '$phone', '$people', '$date', '$time')";
    
            if ($conn->query($sql) === TRUE) {
                header("Location: ../IndexPage/index.php");
                exit();
            } else {
                $errors[] = "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        }
    }
    ?>