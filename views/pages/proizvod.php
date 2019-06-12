<div class="col-md-9">
<?php include "views/partials/divSort.php"; ?>
    <?php
    $id=$_GET["id"];
    $proizvodi=executeQuery("SELECT * FROM artikl a INNER JOIN slika s ON a.artiklId=s.artiklId WHERE a.artiklId=$id");

    foreach($proizvodi as $proizvod):
    ?>
    <div class="row" id="main">
        <div class="row">
            <div class="col">
                <img src="<?= $proizvod->velikaSlika?>" alt="<?= $proizvod->naziv?>" style="width:500px;">
            </div>
            <div class="col">
                <div class="col">
                    <h1><?= $proizvod->naziv?></h1>
                </div>
                <div class="col text-justify">
                    <p><?= $proizvod->opis?></p>
                </div>
                <div class="col">
                    <h3> <?= $proizvod->cena?> РСД</h3>
                </div>
    <div class="container">
    <h3> Коментари </h3>
    <hr/>
        <?php
        if(!isset($_SESSION["korisnik"])): ?>
        <div class="row">
            <p> За остављање коментара морате бити <a href="index.php?page=prijava">улоговани</a>.</p>
        </div>
        <?php endif;?>
        <div class="col">
        <?php 
        $komentari=executeQuery("SELECT * FROM komentar k INNER JOIN artikl a ON k.artiklId=a.artiklId INNER JOIN korisnik ko ON k.korisnikId=ko.korisnikId WHERE k.artiklId=$id");

        foreach($komentari as $komentar):?>
            <div class="row">
                <p><?= $komentar->ime.' '.$komentar->prezime?></p>
            </div>
            <div class="row">
                <p><?= $komentar->komentar?></p>
            </div>
        <?php endforeach;?>
        </div>
         <?php if(isset($_SESSION["korisnik"])):
            if($_SESSION['korisnik']->ulogaId==1 || $_SESSION['korisnik']->ulogaId==2):?>
        <div class="row">
            <div class="col-md-3">
            <!-- prazno-->
            </div>
            <div class="col-md-9">
                <div class="form-group">
                <form method="post" action="php/komentar.php">
                    <div class="form-row">
                        <input type="hidden" name="model" value=""/>
                        <textarea class="form-control" id="komentar" name="komentar" rows="3" placeholder="Ваш коментар..."></textarea>
                    </div>
                    <div class="form-row">
                        <input type="submit" class="btn btn-secondary" id="btnKomentar" name="btnKomentar" value="Пошаљи коментар">
                    </div>
                </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        </div> 
            </div>
        </div>
        <?php endforeach;?>
    </div>
</main>