<div class="col-md-9">
<?php include "views/partials/divSort.php"; ?>
    <?php
    //$id=$_GET["id"];
    

    foreach($items as $item):
    ?>
    <div class="row" id="main">
    <div class="row">
        <div class="col">
            <img src="<?= $item->velikaSlika?>" alt="<?= $item->naziv?>" style="width:500px;">
        </div>
        <div class="col">
            <div class="col">
                <h1><?= $item->naziv?></h1>
            </div>
            <div class="col text-justify">
                <p><?= $item->opis?></p>
            </div>
            <div class="col">
                <h3><?= $item->cena?> РСД</h3>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <h3> Komentari </h3>
    <hr/>
    <div class="container">
        <?php if(!isset($_SESSION["korisnik"])): ?>
        <div class="row">
            <p> За остављање коментара морате бити <a href="index.php?page=prijava">улоговани</a>.</p>
        </div>
        <?php endif; ?>
        <!-- <?php if(isset($_SESSION["korisnik"])):
            if($_SESSION['korisnik']->ulogaId==1 || $_SESSION['korisnik']->ulogaId==2):?>
        <div class="row">
            <div class="col-md-3">

            </div>
            <div class="col-md-9">
                <div class="form-group">
                <form method="post" action="php/komentar.php">
                    <div class="form-row">
                        <input type="hidden" name="model" value="<?=$id?>"/>
                        <textarea class="form-control" id="komentar" name="komentar" rows="3" placeholder="Vaš komentar..."></textarea>
                    </div>
                    <div class="form-row">
                        <input type="submit" class="btn btn-secondary" id="btnKomentar" name="btnKomentar" value="Pošalji komentar">
                    </div>
                </form>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php endif; ?>
        <?php
        $upit="SELECT * FROM komentar k INNER JOIN korisnik kor ON k.korisnikId=kor.korisnikId 
                                        WHERE modelId=$id";
        $rez=$konekcija->query($upit)->fetchAll();
        foreach ($rez as $item) :
        ?>
        <div class="row mb-3">
            <div class="col-md-3">
                <table>
                    <tr>
                        <td><?=$item->ime?></td>
                        <td><?=$item->prezime?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><?=$item->Datum?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-9 komentar border border-secondary rounded">
                <div class="col pt-2">
                            <p><?=$item->Komentar?></p>
                </div>
            </div>
        </div>
        <?php endforeach;?>
        </div> -->
    </div>
</main>