<?php
session_start();
if(!isset($_SESSION['email'])){
    header('location:index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Honda Moto Store - Narudžba potvrđena</title>
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
    <br>
    <div class="container">
        <div class="row"><div class="col-xs-8 col-xs-offset-2"><div class="panel panel-primary">
            <div class="panel-heading"><h3>Narudžba potvrđena</h3></div>
            <div class="panel-body"><p>Vaša narudžba je potvrđena. Hvala što kupujete kod nas.</p><p><a href="products.php" class="btn btn-danger">Nastavi kupnju</a></p></div>
        </div></div></div>
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
