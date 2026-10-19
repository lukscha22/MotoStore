<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Honda Moto Store</title>
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
<body>
    <?php require 'header.php'; ?>
    <div id="bannerImage">
        <div class="container">
            <div id="bannerContent">
                <h1>Honda Moto Store</h1>
                <p>Pregledaj ponudu Honda motocikala, usporedi cijene i snagu te odaberi model za svoju garažu.</p>
                <a href="products.php" class="btn btn-danger btn-lg">Pogledaj ponudu</a>
            </div>
        </div>
    </div>
    <div class="container home-featured">
        <div class="row text-center">
            <div class="col-sm-4"><div class="moto-tile"><img src="img/HONDA_CBR600RR.jpg" alt="Supersport"><div class="caption"><h3>Supersport</h3><p>Motocikli sportskog karaktera, agresivnog položaja vožnje i visokih performansi.</p><a href="products.php?category=supersport" class="btn btn-danger">Pogledaj kategoriju</a></div></div></div>
            <div class="col-sm-4"><div class="moto-tile"><img src="img/HONDA_CB1000_Hornet.jpg" alt="Naked"><div class="caption"><h3>Naked</h3><p>Motocikli bez oklopa, praktični za svakodnevnu vožnju i zabavni na otvorenoj cesti.</p><a href="products.php?category=naked" class="btn btn-danger">Pogledaj kategoriju</a></div></div></div>
            <div class="col-sm-4"><div class="moto-tile"><img src="img/HONDA_CRF1100L_Africa_Twin.jpg" alt="Cross"><div class="caption"><h3>Cross</h3><p>Modeli za avanturu, putovanja i terene izvan gradske vožnje.</p><a href="products.php?category=cross" class="btn btn-danger">Pogledaj kategoriju</a></div></div></div>
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
    <script src="js/logout.js"></script>
</body>
</html>
