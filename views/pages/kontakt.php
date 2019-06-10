<div class="col-md-9 form">
<?php include "views/partials/divSort.php"; ?>
    <div class="row mt-0" id="main">
        <div class="col-md-5 m-auto">
        <h4>Контактирајте нас:</h4>
            <form method="post">
                <div class="form-row">
                    <div class="col">
                        <input type="text" class="form-control" id="kontaktIme" name="kontaktIme" placeholder="Име">
                    </div>
                </div>
                <div class="form-row pt-2">
                    <div class="col">
                        <input type="text" class="form-control" id="kontaktEmail" name="kontaktEmail" placeholder="E-пошта">
                    </div>
                </div>
                <div class="form-row pt-2">
                    <div class="col">
                        <input type="text" class="form-control" id="kontaktNaslov" name="kontaktNaslov" placeholder="Наслов">
                    </div>
                </div>
                <div class="form-row pt-2">
                    <div class="col">
                    <textarea class="form-control" id="kontaktPoruka" name="kontaktPoruka" rows="2" placeholder="Tекст поруке"></textarea>
                </div>
                </div>
                <div class="form-row pt-2" id="dodatnoPoljeMail">

                </div>
                <div class="form-row pt-2">
                    <input type="button" class="btn btn-secondary" id="btnMail" name="btnMail" value="Пошаљи" onclick="posaljiMail()">
                </div>
            </form>

        </div>
        <div class="col-sm-6 m-auto">
            <p class="text-justify"><strong>Ђара Фешн</strong> се налази у Немањиној улици и чини је продајни салон на преко 80 квадратних метара. Чека Вас широк аcортиман понуде и љубазно особље које Вам може помоћи у одабиру идеалне комбинације. </p>
            <p>e: <a href="mailto:office@truckshop.rs">office@truckshop.rs</a></p>
            <p>t: 011/555-333</p>
            <p>a: Немањина 11, 11000 Београд</p>

        </div>
    </div>
    <div class="col mt-3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2830.7493050618523!2d20.458060715047708!3d44.80629748512138!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475a7aa84386204f%3A0x42b46a3cf8acf0a1!2z0J3QtdC80LDRmtC40L3QsCAxMSwg0JHQtdC-0LPRgNCw0LQgMTEwMDA!5e0!3m2!1ssr!2srs!4v1551196062941" width="100%" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
</div>
</main>