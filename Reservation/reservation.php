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
    <link rel="stylesheet" href="../Reservation/reservationStyle.css">
    <title>Резервация за маса | Djanam Sky Club</title>
</head>
<body>
    
      <!-- Навигационно меню -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../IndexPage/index.html">
                <img src="../Images/DjanamLogo2.svg" alt="Djanam Лого">
                Djanam Sky Club
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="../IndexPage/index.html">Начало</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Gallery/gallery.html">Галерия</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../Reservation/reservation.html">Резервация</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../LoginPage/login.html">Вход</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="dark-overlay">
        <div class="form-container">
            <form>
                <h3>Резервация за маса</h3>

                <div class="inputbox">
                    <input type="text" placeholder="Вашето име" id="name">
                </div>

                <div class="inputbox">
                    <input type="tel" placeholder="Телефонен номер" id="phone">
                </div>

                <div class="inputbox">
                    <input type="number" placeholder="Брой хора" id="people">
                </div>

                <div class="inputbox">
                    <input type="date" id="date">
                </div>

                <div class="inputbox">
                    <input type="time" id="time">
                </div>

                <button>Резервирай маса</button>
            </form>
        </div>
    </div>
   <!-- Footer section -->
 <?php include '../Footer/footer.html'; ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-wuslBqJUYvdF95LMOi8ftJ7nMz7ZCkMZov3UexNjth5cwwEBH5mGwl0tG2d0zTqE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-EzFjo0aJ6IhUZ7KE/PIfZ3FXk4IkTCuhN/t6EAoXxWkDFZCsqdgL5drJz7fehphh" crossorigin="anonymous"></script>
</body>

</html>

