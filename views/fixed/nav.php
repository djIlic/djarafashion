<main class="mr-5">
        <div class="row">
            <div class="col-md-3 pt-5">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link" href="#" title="">Кошуље</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Сакои</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Панталоне</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Aксесоари</a>
                    </li>
                    <?php
                        $menuItems=getMenuItems();
                        foreach($menuItems as $item):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=$item->putanja?>" title="<?=$item->naziv?>"><?=$item->naziv?></a>
                    </li>
                        <?php endforeach; ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Документација</a>
                    </li>
                </ul>
            </div>