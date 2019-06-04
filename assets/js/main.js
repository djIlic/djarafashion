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
        greske.push(ime);
        document.querySelector("#tbIme").style.border="1px solid red";
    }
    if(rePrezime.test(prezime)){
        podaci.push(prezime);
    }
    else {
        greske.push(prezime);
        document.querySelector("#tbPrezime").style.border="1px solid red";
    }
    if(reEmail.test(email)){
        podaci.push(email);
    }
    else {
        greske.push(email);
        document.querySelector("#email").style.border="2px solid red";
    }
    if(rePassword.test(password)){
        podaci.push(password);
    }
    else {
        greske.push(password);
        document.querySelector("#password").style.border="1px solid red";
    }
    if(reUsername.test(username)){
        podaci.push(username);
    }
    else {
        greske.push(username);
        document.querySelector("#username").style.border="1px solid red";
    }
    if(greske.length>0) {
        document.querySelector("#dodatnoPoljeReg").innerHTML="Polja nisu dobro popunjena.";
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
                password:password
            },
            success: function (data, xhr) {
                //window.location = "index.php?page=prijava";
                document.querySelector("#dodatnoPoljeReg").innerHTML="Uspešno ste se registrovali.";
            },
            error: function (xhr,status,error) {
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
                document.querySelector("#dodatnoPoljeReg").innerHTML="Doslo je greske.";
            }
        });
    }})