<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../Images/DjanamLogo.jfif">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap JS bundle (including Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap">
    <link rel="stylesheet" href="../RegisterPage/registerStyle.css">
    <?php include '../RegisterPage/registerFunction.php'; ?>
    <title>Регистрация | Djanam Sky Club</title>
</head>
<body>
    <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../IndexPage/index.php">
            <img src="../Images/DjanamLogo2.svg" alt="Djanam Logo">
            Djanam Sky Club
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto" id="navbarNav">
                <li class="nav-item">
                    <a class="nav-link active" href="../IndexPage/index.php">Начало</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Gallery/gallery.php">Галерия</a>
                </li>
                <?php
                // Стартиране на сесията
                session_start();
                // Проверка дали потребителят е логнат
                if(isset($_SESSION['user'])) {
                    // Проверка дали ролята на потребителя е администратор
                    if($_SESSION['user']['RoleID'] == 2) {
                        // Показване на администраторския панел в навигационния бар
                        echo '<li class="nav-item">
                                <a class="nav-link" href="../AdminPanel/adminPage.php">Админ-панел</a>
                              </li>';
                    }
                }
                ?>
                <?php if(isset($_SESSION['user'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="../Reservation/reservation.php">Резервация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?php echo $_SESSION['user']['Name']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../LogOut/logout.php">Изход</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="../LoginPage/login.php">Вход</a>
                </li>
                <?php endif; ?>
                <!-- Добавяне на линк за контакти -->
                <li class="nav-item">
                    <a class="nav-link" href="../ContactPage/contact.php">Контакти</a>
                </li>
            </ul>
        </div>
    </div>
</nav> 

    <section class="hero">
        <div class="dark-overlay"></div>
        <div class="form-container">
            <form action="register.php" method="post">
                <h3>Регистрация</h3>

                <div class="inputbox">
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" placeholder="Име" name="username">
                </div>

                <div class="inputbox">
                    <ion-icon name="mail-outline"></ion-icon>
                    <input type="email" placeholder="Имейл" name="email">
                </div>

                <div class="inputbox">
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" placeholder="Парола" name="password">
                </div>
                <button type="submit" name="submit">Регистрирай се</button>
                <div class="login-link">
                    <p>Вече имате профил? <a href="../LoginPage/login.php">Вход</a></p>
                </div>
            </form>
        </div>
    </section>
 <!-- Footer section -->
 <?php include '../Footer/footer.html'; ?>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-wuslBqJUYvdF95LMOi8ftJ7nMz7ZCkMZov3UexNjth5cwwEBH5mGwl0tG2d0zTqE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-EzFjo0aJ6IhUZ7KE/PIfZ3FXk4IkTCuhN/t6EAoXxWkDFZCsqdgL5drJz7fehphh" crossorigin="anonymous"></script>
</body>
</html>