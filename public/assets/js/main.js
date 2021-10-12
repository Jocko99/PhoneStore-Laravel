var strana = window.location.href;

$(document).ready(function() {
navSlide();
scroll();
//Registration
$("#btnRegister").click(userRegistration)
//User
$("#promeniLozinku").click(formPassword);
$("#promeniTelefon").click(formNumber);
$("#promeniEmail").click(formEmail);
//Contact
$("#btnKontakt").on("click",kontaktAdmin);

/* EXPAND SPECIFICATION */
$("#specification").click(function(e){
    e.preventDefault();
    if ($("#specificationMobile").is(":hidden") ) {
        $( "#specificationMobile").slideDown( "slow" );
      } else {
        $( "#specificationMobile" ).slideUp(300 );
      }
})

    if(strana.indexOf("/admin/mobiles/create")!=-1){
        $('html, body').animate({
            scrollTop: $("#scrollToError").offset().top
        }, 1000);
    }



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


/* END EXPAND SPECIFICATION */

$('#menu li ul').css({
  display: "none",
  left: "auto"
});
$('#menu li').hover(function() {
  $(this)
    .find('ul')
    .stop(true, true)
    .slideDown('fast');
}, function() {
  $(this)
    .find('ul')
    .stop(true,true)
    .fadeOut('fast');
});


});

$(document).on("click","#changePass",function (e){
    let trenutna = $("#trenutnaLozinka").val().trim();
    let nova = $("#novaLozinka").val().trim();
    let novaPonovo = $("#novaPonovo").val().trim();
    let greske = [];

    if(trenutna.length<6){
        greske.push("trenutna");
        $("#passCheckInfo").html("Unesite ponovo trenutnu lozinku")
    }else{
        $("#passCheckInfo").html("")
    }
    if(nova.length < 6){
        greske.push("Lozinka mora da sadrži najmanje 6 karaktera");
        $("#passNewCheckInfo").html("Lozinka mora da sadrži najmanje 6 karaktera");
    }else{
        $("#passNewCheckInfo").html("");
    }
    if(nova != novaPonovo){
        greske.push("Lozinke se ne poklapaju")
        $("#passNewAgainCheckInfo").html("Lozinke se ne poklapaju");
    }else{
        $("#passNewAgainCheckInfo").html("");
    }
    if(greske.length == 0){
        changePassword(trenutna,nova);
    }

})
$(document).on("click","#changeNumber",function (e){
    e.preventDefault();
    let telefon = $("#noviBroj").val().trim();
    let regexTelefon = /^[\d]{9,10}$/;
    if(!regexTelefon.test(telefon)){
        $("#numberCheckInfo").html("Telefon mora da ima najmanje 8,a najviše 9 cifara.")
    }else{
        $("#numberCheckInfo").html("");
        changeNumber(telefon);
    }
})
$(document).on("click","#changeEmail",function (e){
    e.preventDefault();
    let email = $("#noviEmail").val().trim();
    let regexEmail = /^[\w\d\.]+@([a-z\.])+\.[a-z]{2,5}$/;
    if(!regexEmail.test(email)){
        $("#emailErrorInfo").html("Email nije validan");
    }else{
        changeEmail(email);
    }

})

//contact

function kontaktAdmin(){
    let ime,prezime,email,poruka,regexImePrezime,regexEmail,regexPoruka,greske;
    ime = $("#kontaktIme").val().trim();
    prezime = $("#kontaktPrezime").val().trim();
    email = $("#kontaktEmail").val().trim();
    poruka = $("#kontaktPoruka").val().trim();
    greske = [];
//regexi
    regexImePrezime = /^([A-ZŽĐŠ][a-zčćžšđ]{2,20}\s*)+$/;
    regexEmail = /^[\w\d\.]+@([a-z\.])+\.[a-z]{2,5}$/;
    regexPoruka = /^.{15,}$/;
//provera
    if(!regexImePrezime.test(ime)){
        $("#kontaktImeInfo").html("Ime mora početi velikim slovom.");
        greske.push(ime);
    }else{
        $("#kontaktImeInfo").html("");
    }
    if(!regexImePrezime.test(prezime)){
        $("#kontaktPrezimeInfo").html("Prezime mora početi velikim slovom.");
        greske.push(prezime);
    }else{
        $("#kontaktPrezimeInfo").html("");
    }
    if(!regexEmail.test(email)){
        $("#kontaktEmailInfo").html("Email mora biti u formatu primer@gmail.com.");
        greske.push(email);
    }else{
        $("#kontaktEmailInfo").html("");
    }
    if(!regexPoruka.test(poruka)){
        $("#kontaktPorukaInfo").html("Poruka ne može biti prazna i mora sadržati najmanje 15 karaktera.");
        greske.push(poruka);
    }else{
        $("#kontaktPorukaInfo").html("");
    }

    if(!greske.length){
        $.ajax({
            url:"/kontakt/poruka",
            method:"POST",
            data:{
                "ime":ime,
                "prezime":prezime,
                "email":email,
                "poruka":poruka,
            },
            dataType:"json",
            success:function(response){
                let html= "<p class='text-success'>Poruka je uspešno poslata</p>";
                $("#uspesnoPoslata").html(html);
            },
            error:function(response){
            }
        })
    }
}

function changePassword(trenutna,nova){
    $.ajax({
        url:"/korisnik/lozinka",
        method:"PUT",
        dataType:"json",
        data:{
            "trenutna":trenutna,
            "nova":nova
        },
        success:function (response){
            $("#passError").html("");
            $("#passSuccess").html("Lozinka je uspešno izmenjena");
        },
        error:function (response){
            $("#passError").html("Pogrešno uneta trenutna lozinka");
        }
    })
}

function formPassword(e){
    e.preventDefault();
    let div = `<form>
            <label for="trenutnaLozinka">Trenutna lozinka: </label>
            <input type="password" class="form-control" id="trenutnaLozinka"/>
            <small id="passCheckInfo" class="alert-danger"></small>
            <label for="novaLozinka">Nova lozinka: </label>
            <input type="password" class="form-control" id="novaLozinka"/>
            <small id="passNewCheckInfo" class="alert-danger"></small>
            <label for="novaPonovo">Nova lozinka: </label>
            <input type="password" class="form-control" id="novaPonovo"/>
            <small id="passNewAgainCheckInfo" class="alert-danger"></small>
            <div class="form-group d-flex justify-content-center pt-2">
            <input type="button" id="changePass" class="btn btn-info" value="Sačuvaj">
            </div>
</form>
<small id="passSuccess" class="alert-success"></small>
<small id="passError" class="alert-danger"></small>`
    $("#formForChange").html(div);
}

function formNumber(e){
    e.preventDefault();
    let div = `<form>
            <label for="noviBroj">Novi broj: </label>
            <input type="text" class="form-control" id="noviBroj"/>
            <small id="numberCheckInfo" class="alert-danger"></small>
            <div class="form-group d-flex justify-content-center pt-2">
            <input type="button" id="changeNumber" class="btn btn-info" value="Sačuvaj">
            </div>
</form>
<small id="numberSuccess" class="alert-success"></small>
<small id="numberError" class="alert-danger"></small>`
    $("#formForChange").html(div);
}

function changeNumber(telefon){
    $.ajax({
        url:"/korisnik/telefon",
        dataType:"json",
        method:"PUT",
        data:{
            "telefon":telefon
        },
        success:function (response){
            let number = response.broj;
            $("#newMobile").html(number);
            $("#numberError").html("");
            $("#numberSuccess").html("Broj telefona je uspešno izmenjen");

        },
        error:function (response){
            $("#numberError").html("Došlo je do greške, pokušajte ponovo");
        }
    })
}

function formEmail(e){
    e.preventDefault();
    let div = `<form>
            <label for="noviEmail">Novi email: </label>
            <input type="email" class="form-control" placeholder="primer@gmail.com .." id="noviEmail"/>
            <small id="emailErrorInfo" class="alert-danger"></small>
            <div class="form-group d-flex justify-content-center pt-2">
            <input type="button" id="changeEmail" class="btn btn-info" value="Sačuvaj">
            </div>
</form>
<small id="emailSuccess" class="alert-success"></small>
<small id="emailError" class="alert-danger"></small>`
    $("#formForChange").html(div);
}
function changeEmail(email){
    $.ajax({
        url:"/korisnik/email",
        method:"PUT",
        dataType:"json",
        data:{
            "email":email
        },
        success:function (response){
            $("#emailError").html("");
            $("#emailSuccess").html("Email je uspešno izmenjen");
            window.location.replace("/logout");

        },
        error:function (response){
            $("#emailError").html("Došlo je do greške, pokušajte ponovo.");
        }
    })
}

function userRegistration(){
    let ime = $("#ime").val().trim();
    let prezime = $("#prezime").val().trim();
    let email = $("#rgEmail").val().trim();
    let lozinka = $("#rgLozinka").val().trim();
    let lozinkaPonovo = $("#lozinkaPonovo").val().trim();
    let mesto = $("#postBroj").val().trim();
    let brTelefon = $("#brTelefon").val().trim();
    let regexImePrezime = /^([A-ZŽĐŠ][a-zčćžšđ]{2,15}\s*)+$/;
    let regexEmail = /^[\w\d\.]+@([a-z\.])+\.[a-z]{2,5}$/;
    let regexLozinka = /^.{6,50}$/;
    let regexTelefon = /^[\d]{9,10}$/;
    let regexMesto = /^[\d]{5}$/;
    let greske = [];
    if(!regexImePrezime.test(ime)){
        greske.push("ime");
        $("#imeInfo").html("Ime mora početi velikim slovom i sadržati najamanje 3 karaktera.");
    }else{
        $("#imeInfo").html("");
    }
    if(!regexImePrezime.test(prezime)){
        greske.push("prezime");
        $("#prezimeInfo").html("Prezime mora početi velikim slovom i sadržati najamanje 3 karaktera.")
    }else {
        $("#prezimeInfo").html("");
    }
    if(!regexEmail.test(email)){
        greske.push("email");
        $("#emailInfo").html("Email treba biti u formatu primer@gmail.com");
    }else {
        $("#emailInfo").html("")
    }
    if(!regexLozinka.test(lozinka)){
        greske.push("lozinka");
        $("#lozinkaInfo").html("Lozinka mora sadržati najmanje 6 karaktera!");
    }else{
        $("#lozinkaInfo").html("");
    }
    if(lozinka != lozinkaPonovo){
        greske.push("ponovo");
        $("#lozinkaPonovoInfo").html("Lozinke se ne poklapaju!");
    }else{
        $("#lozinkaPonovoInfo").html("");
    }
    if(!regexTelefon.test(brTelefon)){
        greske.push("telefon");
        $("#telefonInfo").html("Telefon mora imati najmanje 9,a najviše 10 brojeva.");
    }else{
        $("#telefonInfo").html("");
    }
    if(!regexMesto.test(mesto)){
        greske.push("mesto");
        $("#postBrojInfo").html("Poštanski broj mora imati 5 cifara.");
    }else {
        $("#postBrojInfo").html("");
    }
    if(greske.length == 0){
        $.ajax({
            url:"/registracija",
            method:"POST",
            dataType:"json",
            data:{
                "ime":ime,
                "prezime":prezime,
                "email":email,
                "lozinka":lozinka,
                "lozinkaPonovo":lozinkaPonovo,
                "mesto":mesto,
                "brTelefon":brTelefon
            },
            success:function (response){
                $("#registracijaModal").modal("hide");
                $("#hideSuccess").show();
                $('.alert').alert(html);
            },
            error:function (response){
                console.log(response);
            }
        })
    }
}


//NAV SLIDE
function navSlide(){
  $("#sendvic").click(function(){
      $("#prikazi").find("ul").slideToggle();
  })
}

//SCROLL TO TOP
function scroll(){
  $("#scrollToTop").click(function(){

      $("html").animate({
          scrollTop: 0
      }, 1000);
  });


  $("#scrollToTop").hide();

  $(window).scroll(function(){
      let top = $("html").offset().top;
      top = $(this)[0].scrollY;
      if(top > 500){
          $("#scrollToTop").show();
      } else {
          $("#scrollToTop").hide();
      }
  })
  }


