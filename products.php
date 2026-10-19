<?php
session_start();
$category = isset($_GET['category']) ? $_GET['category'] : '';
$categoryTitles = array('supersport' => 'Supersport motocikli', 'naked' => 'Naked motocikli', 'cross' => 'Cross motocikli');
$pageTitle = isset($categoryTitles[$category]) ? $categoryTitles[$category] : 'Svi Honda motocikli';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Honda Moto Store - Motocikli</title>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="shortcut icon" href="img/HONDA_CB1000_Hornet.jpg" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css">
<script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/style.css" type="text/css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700;800&display=swap" rel="stylesheet">
</head>
<body class="catalog-page">
    <?php require 'header.php'; ?>
    <div class="container">
        <div class="jumbotron moto-jumbotron">
            <h1><?php echo htmlspecialchars($pageTitle); ?></h1>
            <p>Motocikli se dohvaćaju putem vlastitog PHP API-ja u JSON obliku i dinamički prikazuju JavaScriptom.</p>
        </div>
        <div id="messageBox"></div>
        <div class="row" id="productsContainer">
            <div class="col-xs-12"><div class="alert alert-info">Učitavam motocikle...</div></div>
        </div>
    </div>
    <footer class="footer">
    <div class="container">
        <center>
            <p>Copyright &copy; Honda Moto Store. Sva prava pridržana. | Kontakt: +385 99 0000 000</p>
            <p>FERIT - Web programiranje</p>
        </center>
    </div>
</footer>
    <script>
        window.currentCategory = <?php echo json_encode($category); ?>;
        window.isLoggedIn = <?php echo isset($_SESSION['id']) ? 'true' : 'false'; ?>;
    </script>
    <script src="js/products.js"></script>
    <script src="js/logout.js"></script>
</body>
</html>
