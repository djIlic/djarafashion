<div class="col-md-9">
<?php include "views/partials/divSort.php"; ?>
    <?php
    $item=getOneProduct($_GET["id"]);

    if($item):
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
    <?php endif; ?>
    
        </div> 
    </div>
</main>