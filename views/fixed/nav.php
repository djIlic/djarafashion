<main class="mr-5">
        <div class="row">
            <div class="col-md-3 pt-5">
                <ul class="nav flex-column">
                    <?php
                        $categories=getCategories();
                        foreach($categories as $category):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link proizvodi" href="#" title="<?=$category->naziv?>" data-id="<?= $category->kategorijaId?>"><?=$category->naziv?></a>
                    </li>
                    <?php endforeach; ?>
                    <?php if(!isset($_SESSION['korisnik'])):?>
                    <?php
                        $menuItems=getMenuItems();
                        foreach($menuItems as $item):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$item->putanja?>" title="<?=$item->naziv?>"><?=$item->naziv?></a>
                    </li>
                        <?php endforeach; ?>
                    <?php endif;?>
                    <?php if(isset($_SESSION['korisnik'])):?>
                    <li class="nav-item">
                        <a class="nav-link" href="models/logout.php" title="Одјави се">Одјави се</a>
                    </li>
                    <?php endif;?>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=autor" title="О аутору">О аутору</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Документација">Документација</a>
                    </li>
                    <?php 
                    if(isset($_SESSION['korisnik'])):
                    if($_SESSION['korisnik']->ulogaId==1):?>
                    <li class="nav-item border-top">
                        <a class="nav-link" href="index.php?page=admin">Додај производ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=adminProizvodi">Производи</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php?page=adminKorisnici">Корисници</a>
                    </li>
                    <?php endif;?>
                    <?php endif;?>
                </ul>
            </div>