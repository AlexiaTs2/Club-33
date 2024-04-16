<?php
    // Връзка към базата данни
    $db_host = "localhost"; // Името на хоста, където се намира базата данни
    $db_name = "djanam"; // Името на базата данни
    $db_user = "root"; // Потребителско име за достъп до базата данни
    $db_pass = "1234"; // Парола за достъп до базата данни

    // Създаване на връзка към базата данни
    $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);

    // Проверка за грешки при връзката
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    // Извличане на информацията от формата
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $people = $_POST['people'];
        $phone = $_POST['phone'];
        $date = $_POST['date'];
        $time = $_POST['time'];

        // Проверка за грешки при извличането на данните
        $errors = array();

        $result = $conn->query("SELECT * FROM reservation WHERE Date = '$date' AND Time = '$time'");

        if (!$errors) {
            // Записване на информацията в базата данни
            $sql = "INSERT INTO reservation (Name, Phone, People, Date, Time) 
                    VALUES ('$name', '$phone', '$people', '$date', '$time')";

            // Проверка за грешки при записването на данните
            if ($conn->query($sql) === TRUE) {
                header("Location: ../IndexPage/index.php");
                exit();
            } else {
                $errors[] = "Error: " . $sql . "<br>" . $conn->error;
            }
        }  

        // Изведете грешките, ако има такива
        if (!empty($errors)) {
            print_r($errors);
        }
    }
?>
