<body>
    <header class="mr-5">
        <div class="row" id="header">
            <div class="col-md-3 pl-5 pt-2">
                <a href="index.php?page=pocetna"><img src="assets/images/logo.png" alt="Djara Fesn" id="logo" title="Ђара Фешн"></a>
            </div>
            <div class="col-md-9 m-auto">
            <?php if(!isset($_SESSION['korisnik'])):?>
                    <a href="index.php?page=prijava" class="float-right">Пријави се</a>
            <?php endif; ?>
            <?php if(isset($_SESSION['korisnik'])):?>
                    <a href="models/logout.php" class="float-right">Одјави се</a>
            <?php endif; ?>
            </div>
            </div>
            </div>
        </div>
    </header>