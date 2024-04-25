<!DOCTYPE html>
<html lang="bg">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../Images/DjanamLogo.jfif">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&display=swap">
    <link rel="stylesheet" href="adminPageStyle.css">
    <title>Админ-панел | Djanam Sky Club</title>
    
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="../IndexPage/index.php">
            <img src="../Images/DjanamLogo2.svg" alt="Djanam Logo">
            Djanam Sky Club
        </a>
        <form class="d-flex" action="../IndexPage/index.php">
            <button class="btn btn-outline-light" type="submit">Назад</button>
        </form>
    </div>
</nav>
    <section class="hero">
        
        <div class="button-container">
            <button class="button" onclick="window.location.href='../AdminPanel/userEdit.php'">База с потребители</button>
            <button class="button" onclick="window.location.href='../AdminPanel/userReservation.php'">База с резерваций</button>
        </div>
    </section>

    <?php include '../Footer/footer.html'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
