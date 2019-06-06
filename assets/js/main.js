$(document).ready(function(){
    $(document).on("click", ".proizvodi", function(e){
        e.preventDefault();

        var id=$(this).data("id");
        //console.log(id);
        $.ajax({
            url:"http://localhost/phpProject/models/clothes/getProducts.php",
            method: "POST",
            data: {
                id:id
            },
            success:function(proizvodi){
                prikaziProizvode(proizvodi);
            },
            error:function(xhr, greska, status){
                alert(greska);
            }
        })
    });

    function prikaziProizvode(proizvodi){
        var ispis = "";
        if(proizvodi.length>0){
            for(let proizvod of proizvodi){
                ispis += prikaziProizvod(proizvod);
            }
        } else {
            ispis = noProducts();
        }
        console.log(ispis)
        $("#main").html(ispis);
    }

    function prikaziProizvod(proizvod){
        return `
                    <div class="col">
                        <div class="col">
                            <a href="#" title="${ proizvod.naziv }"><img src="${ proizvod.malaSlika }" alt="${ proizvod.naziv }"></a>
                            </div>
                            <div class="col">
                            <a href="#" title="${ proizvod.naziv }"><p class="mb-0"> <b>${ proizvod.naziv }</b></p></a> <br/>
                            <p> ${ proizvod.cena } РСД </p>
                        </div>
                    </div>
                `;
    }

    $("#btnReg").click(function(){
        var ime=$("#tbIme").val();
        var prezime=$("#tbPrezime").val();
        var username=$("#username").val();
        var password=$("#password").val();
        var email=$("#email").val(); 

        var reIme=/^[A-ZĐŠŽĆČ][a-zđšžćč]{2,14}(\s[A-ZĐŠŽĆČ][a-zđšžćč]{2,14})?$/;
        var rePrezime=/^[A-ZĐŠŽĆČ][a-zđšžćč]{2,14}(\s[A-ZĐŠŽĆČ][a-zđšžćč]{2,14})?$/;
        var reUsername=/^[A-z0-9]+$/;
        var rePassword=/^[A-z0-9]{8,}$/;
        var reEmail=/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        var podaci=new Array();
        var greske=new Array();

        if(reIme.test(ime)){
            podaci.push(ime);
        }
        else {
            greske.push("Име није унето у добром формату");
            document.querySelector("#tbIme").style.border="1px solid red";
        }
        if(rePrezime.test(prezime)){
            podaci.push(prezime);
        }
        else {
            greske.push("Презиме није унето у добром формату");
            document.querySelector("#tbPrezime").style.border="1px solid red";
        }
        if(reEmail.test(email)){
            podaci.push(email);
        }
        else {
            greske.push("Е-пошта није није унета у добром формату");
            document.querySelector("#email").style.border="2px solid red";
        }
        if(rePassword.test(password)){
            podaci.push(password);
        }
        else {
            greske.push("Шифра мора имати минимално 8 карактера, велика, мала слова и бројеве");
            document.querySelector("#password").style.border="1px solid red";
        }
        if(reUsername.test(username)){
            podaci.push(username);
        }
        else {
            greske.push("Корисничко име мора садршати велика, мала слова и бројеве");
            document.querySelector("#username").style.border="1px solid red";
        }
        if(greske.length>0) {
            document.querySelector("#dodatnoPoljeReg").innerHTML="Polja nisu dobro popunjena.";
            //ispisi niz gresaka//
            console.log(greske);
        }
        else {
            $.ajax({
                url: "http://localhost/phpProject/models/obradaRegistracija.php",
                method: "post",
                data: {
                    ime:ime,
                    prezime:prezime,
                    username:username,
                    password:password,
                    email:email,
                    send:true
                },
                success: function (data, xhr) {
                    //window.location = "index.php?page=prijava";
                    document.querySelector("#dodatnoPoljeReg").innerHTML="Uspešno ste se registrovali.";
                    //window.location = "index.php?page=";
                },
                error: function (xhr,status,error) {
                    var poruka="Doslo je do greske";
                    switch(xhr.status){
                        case 404:
                            poruka="Stranica nije pronadjena";
                            break;
                        case 409:
                            poruka="Parametri vec postoje";
                            break;
                        case 422:
                            poruka="Podaci nisu validni";
                            break;
                        case 500:
                            poruka="Greska";
                            break;
                    }
                    $("#dodatnoPoljeReg").html(poruka);    
                }
            });
        }})
    });