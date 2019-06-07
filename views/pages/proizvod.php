<div class="col-md-9">
    <div class="row" id="main">
    <div class="row">
        <div class="col">
            <img src="assets/images/s1.jpg" alt="" style="width:500px">
        </div>
        <div class="col">
            <div class="col">
                <h1>Naziv</h1>
            </div>
            <div class="col">
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
            </div>
            <div class="col">
                <h2>Dostupne velicine</h2>
                <hr/>
                    <table class="text-left">
                        <tr>
                            <th> M </th>
                        </tr>
                        <tr>
                            <th> L </th>
                        </tr>
                        <tr>
                            <th> XL </th>
                        </tr>
                    </table>
                <hr/>
            </div>
            <div class="col">
                <h3>Cena</h3>
            </div>
        </div>
    </div>
    <div class="row">
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
    </div>
</main>