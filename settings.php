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
    <title>Honda Moto Store - Postavke</title>
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
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <h1>Promjena lozinke</h1>
                <div id="messageBox"></div>
                <form id="settingsForm">
                    <div class="form-group"><input type="password" class="form-control" id="oldPassword" placeholder="Stara lozinka" required></div>
                    <div class="form-group"><input type="password" class="form-control" id="newPassword" placeholder="Nova lozinka" required minlength="6"></div>
                    <div class="form-group"><input type="password" class="form-control" id="retype" placeholder="Ponovite novu lozinku" required minlength="6"></div>
                    <div class="form-group"><input type="submit" class="btn btn-primary" value="Promijeni"></div>
                </form>
            </div>
        </div>

        <?php if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1){ ?>
        <div class="row admin-panel">
            <div class="col-md-10 col-md-offset-1">
                <hr>
                <h2>Administracija korisnika</h2>
                <div id="adminMessageBox"></div>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Ime</th>
                                <th>Email</th>
                                <th>Kontakt</th>
                                <th>Grad</th>
                                <th>Adresa</th>
                                <th>Akcija</th>
                            </tr>
                        </thead>
                        <tbody id="usersTableBody">
                            <tr><td colspan="7">Učitavam korisnike...</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
    <footer class="footer">
    <div class="container">
        <center>
            <p>Copyright &copy; Honda Moto Store. Sva prava pridržana. | Kontakt: +385 99 0000 000</p>
            <p>FERIT - Web programiranje</p>
        </center>
    </div>
</footer>
    <script src="js/settings.js"></script>
    <script src="js/logout.js"></script>
</body>
</html>
