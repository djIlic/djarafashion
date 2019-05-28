$("#btnReg").click(function(){
function getFormData(){
    var obj={
    ime=$("#tbIme").val(),
    prezime=$("#tbPrezime").val(),
    username=$("#username").val(),
    password=$("#password").val(),
    email=$("#email").val()
};
return obj;
}
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
        podaci.push(ime);
    }
    else {
        greske.push(email);
        document.querySelector("#email").style.border="1px solid red";
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
        function callAjax(obj){
        $.ajax({
            url: "models/obradaRegistacija.php",
            type: "post",
            data: obj,
            success: function (data, xhr) {
                //window.location = "index.php?page=prijava";
                document.querySelector("#dodatnoPoljeReg").innerHTML="Uspešno ste se registrovali.";
                console.log("poruka");
            },
            error: function (xhr,status,error) {
                var poruka="Doslo je greske";
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
                document.querySelector("#dodatnoPoljeReg").htmla(poruka);
            }
        });
}
        var formData=getFormData();
        callAjax(formData);

    }})