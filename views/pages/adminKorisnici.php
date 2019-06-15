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
      <th scope="col">Име и презиме</th>
      <th scope="col">Улога</th>
      <th scope="col">Едит</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $users=getUsers();

    foreach($users as $user):
  ?>
    <tr>
      <th scope="row"><?=$user->korisnikId?></th>
      <td><?=$user->ime.' '.$user->prezime?></td>
      <td><?=$user->naziv?></td>
      <td>
        <a href="#" name="updateKor" class="updateKor" data-id="<?=$user->korisnikId?>" title="Уреди корисника"><i class="fa fa-edit" style="font-size:24px"></i></a>
        <a href="#" class="deleteKor" name="deleteKor" data-id="<?=$user->korisnikId?>" title="Избриши корисника"><i class="fa fa-trash-o" style="font-size:24px" ></i></a>
      </td>
    </tr>
    <?php endforeach;?>
  </tbody>
</table>
<div class="row">
        <form method="POST">
            <a href="models/excel.php" class="btn btn-secondary"> Преузми табелу</a>
        </form>
</div>
    </div>
    </div>
    </main> 