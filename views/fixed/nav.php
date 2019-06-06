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
                    <?php
                        $menuItems=getMenuItems();
                        foreach($menuItems as $item):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$item->putanja?>" title="<?=$item->naziv?>"><?=$item->naziv?></a>
                    </li>
                        <?php endforeach; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="Документација">Документација</a>
                    </li>
                    <!-- admin panel 
                    <li class="nav-item">
                        <a class="nav-link" href="#">Додај производ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Корисници</a>
                    </li>
                    -->
                </ul>
            </div>