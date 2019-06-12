<div class="col-md-9 form">
<?php
if(isset($_SESSION['korisnik'])){
    if($_SESSION['korisnik']->ulogaId != 1){
        header("Location: index.php");
    }
}
else {
    $_SESSION['greska'] ="Niste ulogovani!";
    header("Location: index.php");
}
?>
<?php include "views/partials/divSort.php"; ?>
    <div class="row mt-0" id="main">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Назив артикла</th>
      <th scope="col">Категорија</th>
      <th scope="col">Едит</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $artikli=getProductsWithCategory();

    foreach($artikli as $artikl):
  ?>
    <tr>
      <th scope="row"><?=$artikl->artiklId?></th>
      <td><?=$artikl->artiklNaziv?></td>
      <td><?=$artikl->kategorijaNaziv?></td>
      <td>
        <a href="#" data-id="<?=$artikl->artiklId?>" title="Уреди производ"><i class="fa fa-edit" style="font-size:24px" name="update" id="update"></i></a>
        <a href="#" data-id="<?=$artikl->artiklId?>" title="Избриши производ"><i class="fa fa-trash-o" style="font-size:24px" name="delete" id="delete"></i></a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
    </div>
    </div>
    </main>