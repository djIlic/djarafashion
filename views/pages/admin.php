<div class="col-md-9 form">
    <div class="row mt-0" id="main">
        <div class="col">
        <h4>Додај производ</h4>
        <form method="POST" action="models/clothes/dodajProizvod.php">
        <div class="form-row mt-4">
            <label> Назив модела </label>
            <input type="text" class="form-control" id="modelNaziv" name="modelNaziv">
        </div>
        <div class="form-row mt-4">
            <label> Цена </label>
            <input type="text" class="form-control" id="modelNaziv" name="modelNaziv">
        </div>
        <div class="form-row mt-4">
            <label> Категорија </label>
            <select class="form-control" id="ddlKategorija" name="ddlKategorija">
                        <option selected>Изабери...</option>
                        <?php
                        $categories=getCategories();
                        foreach($categories as $category):
                        ?>
                        <option value="<?=$category->kategorijaId?>"><?=$category->naziv?></option>
                        <?php endforeach; ?>
            </select>
        </div>
        <div class="form-row mt-4">
            <textarea class="form-control" id="modelOpis" name="modelOpis" rows="3" placeholder="Опис..."></textarea>
        </div>
        <div class="form-row mt-4">
            <input type="submit" class="btn btn-secondary" id="btnProizvod" name="btnProizvod" value="Сачувај"/>
        </div>
        </form>
        </div>
        <div class="col ml-4">
            <h4>Додај фотографију</h4>
            <form method="post" action="models/clothes/insertSlika.php" enctype="multipart/form-data">
                <div class="form-row mt-4">
                    <label> Артикл </label>
                    <select class="form-control" id="ddlArtikl" name="ddlArtikl">
                                <option selected>Изабери...</option>
                    </select>
                </div>
                <div class="form-row">
                    <input type="file" name="slika" id="slika"/>
                </div>
                <div class="form-row mt-4">
                    <input type="submit" class="btn btn-secondary" id="btnSlika" name="btnSlika" value="Сачувај"/>
                </div>
            </form>
        </div>
    </div>
    </div>
    </main>