<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Начало | Djanam Sky Club</title>

    <link rel="icon" type="image/x-icon" href="../Images/DjanamLogo.jfif">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap">
    <link rel="stylesheet" href="../IndexPage/indexStyle.css">

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
            <h1 class="display-3">Добре дошли в Djanam Sky Club!</h1>
            <p class="lead">Открийте лукса в Djanam Sky Club</p>
            <a class="btn btn-primary btn-lg" href="../IndexPage/Menu.pdf" target="_blank" role="button">Разгледай нашето меню</a>
        </div>
    </header>
    
    <!-- Секция със събития -->
    <div class="events-section">
        <div class="container">
            <a href="../Events/events.php" style="text-decoration: none;">
                <h2>↠ Бъдещи събития ↞</h2>
            </a>
            <div class="row">
                <div class="col-md-4">
                    <div class="card event-card">
                        <img src="../Images/Event1.jpg" class="card-img-top" alt="Event 1">
                        <div class="card-body">
                            <h5 class="card-title">Гръцка вечер</h5>
                            <p class="card-text">Насладете се на вълнуваща гръцка музика и атмосфера през четвъртък вечер!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card event-card">
                        <img src="../Images/Event2.jpg" class="card-img-top" alt="Event 2">
                        <div class="card-body">
                            <h5 class="card-title">Петъчно Разтърсване</h5>
                            <p class="card-text">Танцувайте цялата нощ и се забавлявайте с нас в петък с уникална жива музика!</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card event-card">
                        <img src="../Images/Event3.jpg" class="card-img-top" alt="Event 3">
                        <div class="card-body">
                            <h5 class="card-title">Ексклузивна VIP Вечер</h5>
                            <p class="card-text">Преживейте лукса и комфорта на VIP обслужването с балет "Нова"!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Footer section -->
    <?php include '../Footer/footer.html'; ?>

    <!-- Bootstrap JS bundle (including Popper.js) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
