<!DOCTYPE html>
<html lang="bg">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Бъдещи събития | Djanam Sky Club</title>
    <link rel="icon" type="image/x-icon" href="../Images/DjanamLogo.jfif">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap">
    <link rel="icon" type="image/x-icon" href="../Images/DjanamLogo.jfif">
    <link rel="stylesheet" href="eventsStyle.css">
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
    <!-- Hero section -->
    <header class="hero">
        <div class="container">
            <h1 class="display-3">Бъдещи събития</h1>
            <p class="lead">Открийте нашите предстоящи събития и се насладете на уникални изживявания!</p>
        </div>
    </header>

    <!-- Events section -->
    <section class="events-section">
        <div class="container">
            <div class="row">
                <!-- Event 1 -->
                <div class="col-md-4">
                    <div class="card event-card">
                        <img src="../Images/Event4.jpg" class="card-img-top" alt="Концерт на открито">
                        <div class="card-body">
                            <h5 class="card-title">Звестни гости</h5>
                            <p class="card-text">На 26 и 27 март 2024 г., Djanam Sky Club ще бъде домакин на голям концерт с участието на звестни гости.</p>
                        </div>
                    </div>
                </div>
                <!-- Event 2 -->
                <div class="col-md-4">
                    <div class="card event-card">
                        <img src="../Images/Event5.jpg" class="card-img-top" alt="Семейно събитие">
                        <div class="card-body">
                            <h5 class="card-title">Тридневен културен фестивал</h5>
                            <p class="card-text">Тридневно музикално пътешествие през гръцката култура с музикални изпълнения и кабаретни представления в Djanam Sky Club.</p>
                        </div>
                    </div>
                </div>
                <!-- Event 3 -->
                <div class="col-md-4">
                    <div class="card event-card">
                        <img src="../Images/Event6.jpg" class="card-img-top" alt="Вечеря с изглед към залеза">
                        <div class="card-body">
                            <h5 class="card-title">Банда & Звезда</h5>
                            <p class="card-text">Насладете се на две вечери изпълнени с музика и забавления с най-добрите местни музиканти и специален гост изненада в Djanam Sky Club!</p>
                        </div>
                    </div>
                </div>
                <!-- Event 4 -->
                <div class="col-md-4">
                    <div class="card event-card">
                        <img src="../Images/Event7.jpg" class="card-img-top" alt="Вкусно изкушение">
                        <div class="card-body">
                            <h5 class="card-title">Тридневно пътешествие</h5>
                            <p class="card-text"> Присъединете се за три вълнуващи дни с гръцка вечер, жива музика и кабаретно шоу, заедно с уникален дрес-код!</p>
                        </div>
                    </div>
                </div>
                <!-- Event 5 -->
                <div class="col-md-4">
                    <div class="card event-card">
                        <img src="../Images/Event8.jpg" class="card-img-top" alt="Кулинарен майсторски клас">
                        <div class="card-body">
                            <h5 class="card-title">Магията на Музиката</h5>
                            <p class="card-text">Присъединете се към нас за два дни с Krissy и невероятния Балет Нова. Не пропускайте това незабравимо изживяване. </p>
                        </div>
                    </div>
                </div>
                <!-- Event 6 -->
                <div class="col-md-4">
                    <div class="card event-card">
                        <img src="../Images/Event9.jpg" class="card-img-top" alt="Веган фестивал">
                        <div class="card-body">
                            <h5 class="card-title">Благотворителна вечер</h5>
                            <p class="card-text">Помогни на абитуриенти сираци! Присъедини се към благотворителното велосипедно събитие. Всички средства са за тях!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer section -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Djanam Sky Club. Всички права запазени.</p>
        </div>
    </footer>

    <!-- Bootstrap JS bundle (including Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
