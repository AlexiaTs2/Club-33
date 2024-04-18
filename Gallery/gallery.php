<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Галерия | Djanam Sky Club</title>
    <link rel="icon" type="image/x-icon" href="../Images/DjanamLogo.jfif">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap">
    
    <link rel="icon" type="image/x-icon" href="../Images/DjanamLogo.jfif">
    <link rel="stylesheet" href="galleryStyle.css">
</head>

<body>
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
                    session_start();
                    if(isset($_SESSION['user'])):
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="../Reservation/reservation.php">Резервация</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><?php echo $_SESSION['user']['Name']; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../LogOut/logout.php"> Изход</a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="../LoginPage/login.php"> Вход</a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
    <section class="hero">
        <div class="dark-overlay"></div>
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/Lobby1.jpg" alt="Lobby 1">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/Lobby3.jpg" alt="Lobby 3">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/Lobby2.jpg" alt="Lobby 2">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/Lobby4.jpg" alt="Lobby 4">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/ChefResat.jpg" alt="Chef Resat">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/Food2.jpg" alt="Food 2">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/Food.jpg" alt="Food">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/Food3.jpg" alt="Food 3">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/Food4.jpg" alt="Food 4">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/Coffee.jpg" alt="Coffee">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/Bar.jpg" alt="Bar">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/Love.jpg" alt="Love">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/BalletNova2.jpg" alt="Ballet Nova 2">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/BalletNova3.jpg" alt="Ballet Nova 3">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/BalletNova.jpg" alt="Ballet Nova">
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="gallery-item">
                        <img src="../Images/BalletNova4.jpg" alt="Ballet Nova 4">
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- Footer section -->
 <?php include '../Footer/footer.html'; ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
