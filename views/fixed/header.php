<body>
    <header class="mr-5">
        <div class="row" id="header">
            <div class="col-md-3 pl-5 pt-2">
                <a href="index.php?page=pocetna"><img src="assets/images/logo.png" alt="Djara Fesn" id="logo" title="Ђара Фешн"></a>
            </div>
            <?php if(!isset($_SESSION['korisnik'])):?>
                <div class="col-md-9 m-auto">
                    <a href="index.php?page=prijava" class="float-right">Пријави се</a>
                </div>
            <?php endif; ?>
            <?php if(isset($_SESSION['korisnik'])):?>
                <div class="col-md-9 m-auto">
                    <a href="models/logout.php" class="float-right">Одјави се</a>
                </div>
            <?php endif; ?>
        </div>
    </header>