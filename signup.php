<?php
session_start();
if(isset($_SESSION['email'])){
    header('location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Honda Moto Store - Registracija</title>
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
    <br><br>
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <h1><b>REGISTRACIJA</b></h1>
                <div id="messageBox"></div>
                <form id="registerForm">
                    <div class="form-group"><input type="text" class="form-control" id="name" placeholder="Ime" required></div>
                    <div class="form-group"><input type="email" class="form-control" id="email" placeholder="Email" required></div>
                    <div class="form-group"><input type="password" class="form-control" id="password" placeholder="Lozinka (min. 6 znakova)" required minlength="6"></div>
                    <div class="form-group"><input type="password" class="form-control" id="confirm_password" placeholder="Potvrda lozinke" required minlength="6"></div>
                    <div class="form-group"><input type="tel" class="form-control" id="contact" placeholder="Kontakt" required></div>
                    <div class="form-group"><input type="text" class="form-control" id="city" placeholder="Grad" required></div>
                    <div class="form-group"><input type="text" class="form-control" id="address" placeholder="Adresa" required></div>
                    <div class="form-group"><input type="submit" class="btn btn-primary" value="Registracija"></div>
                </form>
            </div>
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
    <script src="js/register.js"></script>
</body>
</html>
