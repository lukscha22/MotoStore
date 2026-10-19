<?php
session_start();

$references = array(
    array(
        'title' => 'JavaScript Fetch API i JSON',
        'items' => array(
            array(
                'name' => 'MDN Web Docs: Using the Fetch API',
                'url' => 'https://developer.mozilla.org/en-US/docs/Web/API/Fetch_API/Using_Fetch'
            ),
            array(
                'name' => 'MDN Web Docs: Response.json()',
                'url' => 'https://developer.mozilla.org/en-US/docs/Web/API/Response/json'
            ),
            array(
                'name' => 'Stack Overflow: Fetch POST JSON data',
                'url' => 'https://stackoverflow.com/questions/29775797/fetch-post-json-data'
            )
        ),
        'used_for' => array(
            'Slanje zahtjeva iz JavaScripta prema vlastitom PHP API-ju',
            'Slanje i primanje podataka u JSON obliku',
            'Datoteke js/products.js, js/cart.js, js/login.js, js/register.js, js/settings.js i js/logout.js'
        )
    ),
    array(
        'title' => 'PHP password_hash() i password_verify()',
        'items' => array(
            array(
                'name' => 'PHP Manual: password_hash()',
                'url' => 'https://www.php.net/manual/en/function.password-hash.php'
            ),
            array(
                'name' => 'PHP Manual: password_verify()',
                'url' => 'https://www.php.net/manual/en/function.password-verify.php'
            )
        ),
        'used_for' => array(
            'Hashiranje lozinke kod registracije korisnika',
            'Provjera lozinke kod prijave i promjene lozinke',
            'Datoteke api/register.php, api/login.php i api/changePassword.php'
        )
    ),
    array(
        'title' => 'PHP i MySQL / prepared statements',
        'items' => array(
            array(
                'name' => 'PHP Manual: MySQLi prepared statements',
                'url' => 'https://www.php.net/manual/en/mysqli.quickstart.prepared-statements.php'
            ),
            array(
                'name' => 'PHP Manual: mysqli::prepare',
                'url' => 'https://www.php.net/manual/en/mysqli.prepare.php'
            )
        ),
        'used_for' => array(
            'Rad s MySQL bazom podataka',
            'Sigurnija obrada podataka prije SQL upita',
            'API skripte koje dohvaćaju, dodaju, mijenjaju ili brišu podatke iz baze'
        )
    ),
    array(
        'title' => 'Bootstrap dokumentacija',
        'items' => array(
            array(
                'name' => 'Bootstrap Navbar dokumentacija',
                'url' => 'https://getbootstrap.com/docs/5.3/components/navbar/'
            ),
            array(
                'name' => 'Bootstrap 3 CSS / Grid dokumentacija',
                'url' => 'https://getbootstrap.com/docs/3.4/css/'
            ),
            array(
                'name' => 'W3Schools Bootstrap Navbar',
                'url' => 'https://www.w3schools.com/bootstrap/bootstrap_navbar.asp'
            )
        ),
        'used_for' => array(
            'Navigaciju i responzivni raspored',
            'Grid sustav, gumbe, forme, tablice i alert poruke',
            'Frontend stranice kao index.php, products.php, cart.php, login.php, signup.php i settings.php'
        )
    ),
    array(
        'title' => 'ChatGPT - WebPilot',
        'items' => array(
            array(
                'name' => 'OpenAI ChatGPT',
                'url' => 'https://chatgpt.com/'
            ),
            array(
                'name' => 'WebPilot Copilot for All - Chrome Web Store',
                'url' => 'https://chromewebstore.google.com/detail/webpilot-copilot-for-all/biaggnjibplcfekllonekbonhfgchopo?hl=en'
            )
        ),
        'used_for' => array(
            'Pomoć pri planiranju strukture projekta i objašnjavanju arhitekture aplikacije',
            'Pomoć pri pisanju i uređivanju PHP, JavaScript, SQL i CSS dijelova projekta'
        )
    ),
);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Honda Moto Store - Reference</title>
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

    <div class="container references-page">
        <div class="jumbotron moto-jumbotron">
            <h1>Reference koda</h1>
            <p>Ovdje su navedeni izvori dokumentacije i primjeri korišteni kao pomoć pri izradi projekta.</p>
        </div>

        <div class="row">
            <?php foreach($references as $reference){ ?>
                <div class="col-md-6">
                    <div class="panel panel-default reference-card">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?php echo htmlspecialchars($reference['title']); ?></h3>
                        </div>
                        <div class="panel-body">
                            <h4>Izvori</h4>
                            <ul>
                                <?php foreach($reference['items'] as $item){ ?>
                                    <li>
                                        <a href="<?php echo htmlspecialchars($item['url']); ?>" target="_blank" rel="noopener noreferrer">
                                            <?php echo htmlspecialchars($item['name']); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>

                            <h4>Korišteno za</h4>
                            <ul>
                                <?php foreach($reference['used_for'] as $usedFor){ ?>
                                    <li><?php echo htmlspecialchars($usedFor); ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <div class="alert alert-info">
            <strong>Napomena:</strong> projekt nije izrađen u CMS-u. Reference su korištene kao dokumentacija za Bootstrap, JavaScript Fetch API, JSON razmjenu podataka, PHP i MySQL, a ChatGPT - WebPilot je naveden kao pomoćni alat pri izradi projekta.
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
