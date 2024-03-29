$(document).ready(function(){
    //prikaz proizvoda
    $(document).on("click", ".proizvodi", function(e){
        e.preventDefault();

        var id=$(this).data("id");
        //console.log(id);
        $.ajax({
            url:"http://localhost/phpProject/models/clothes/getProducts.php", //prikazuje selektovano po kategoriji
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
        //console.log(ispis)
        $("#main").html(ispis);
    }

    function prikaziProizvod(proizvod){
        return `
        <input type="hidden" value="${proizvod.kategorijaId}" id="kanada"/>
                    <div class="col">
                    <input type="hidden" value="${ proizvod.kategorijaId}" id="skriveno"/>
                        <div class="col">
                            <a href="index.php?page=proizvod&id=${ proizvod.artiklId}" title="${ proizvod.naziv }"><img src="${ proizvod.malaSlika }" alt="${ proizvod.naziv }" class="zoom"></a>
                            </div>
                            <div class="col">
                            <a href="index.php?page=proizvod&id=${ proizvod.artiklId}" title="${ proizvod.naziv }"><p class="mb-0"> <b>${ proizvod.naziv }</b></p></a> <br/>
                            <p> ${ proizvod.cena } РСД </p>
                        </div>
                    </div>
                `;
    }
    //end prikaz proizvoda

    //претрага
    // $("#search").keyup(function(){
    //     let naziv = $(this).val();
    //     //console.log(naziv);
    //     $.ajax({
    //         url: "models/clothes/filter.php",
    //         method: "POST",
    //         data: {
    //             naziv: naziv
    //         },
    //         success: function(podaci){
    //             console.log(podaci);
    //             prikaziProizvode(podaci);
    //         },
    //         error: function(greska){
    //             console.log(greska);
    //         }
    //     })
    // });
    //претрага

    //obrada registracije
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
                    document.querySelector("#dodatnoPoljeReg").innerHTML="Успешно сте се регистровали";
                    window.location = "index.php?page=prijava";
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
    //endobrada registracije

    //obrada logovanja
        $("#btnLog").click(function(){
            
        var email = $("#emailLog").val();
        var password = $("#passwordLog").val();
        
        var errors = new Array();

        var reEmail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        var rePassword = /^[A-z0-9]{8,}$/;

        if (!reEmail.test(email)) {
            errors.push("Ne postoji korisnik sa ovom e-mail adresom");
            document.querySelector("#emailLog").style.border="1px solid red";
        }
        if (!rePassword.test(password)) {
            errors.push("Ne postoji korisnik sa ovom e-mail adresom");
            document.querySelector("#passwordLog").style.border="1px solid red";
        }
        if (errors.length != 0) {
            document.querySelector("#dodatnoPolje").innerHTML="Не постоји корисник са овим параметрима";
        } 
        else { 
            $.ajax({
                url: "http://localhost/phpProject/models/obradaLogovanje.php",
                method: "post",
                data: {
                    email: email,
                    password: password,
                    send: true
                },
                success: function (podaci) {
                    //  console.log("Poslato");
                    // console.log(podaci);
                    window.location = "index.php";
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
                    $("#dodatnoPolje").html(poruka);    
                }
            });
         }})
    //end obrada logovanja
 
    //brisanje proizoda na admin stranici
    $(document).on("click", ".delete", function(){
        
        var id=$(this).data("id");
        
        $.ajax({
            url:"http://localhost/phpProject/models/deleteProduct.php",
            method: "POST",
            data: {
                id:id,
                send:true
            },
            success:function(data){
                window.location = "index.php?page=adminProizvodi";
            },
            error:function(xhr, greska, status){
                alert(greska);
            }
        })
    });
    //end brisanje proizvoda na admin stranici

        //brisanje korisnika na admin stranici
        $(document).on("click", ".deleteKor", function(){
        
            var id=$(this).data("id");
            
            $.ajax({
                url:"http://localhost/phpProject/models/deleteUsers.php",
                method: "POST",
                data: {
                    id:id,
                    send:true
                },
                success:function(data){
                    window.location = "index.php?page=adminKorisnici";
                },
                error:function(xhr, greska, status){
                    alert(greska);
                }
            })
        });
        //end brisanje korisnika na admin stranici
    });