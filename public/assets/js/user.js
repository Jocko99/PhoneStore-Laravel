$(document).ready(function (){
    showUsers()
    $("#userSearchAdmin").on("keyup",search);
    $("#btnUpdateUser").click(updateUser);
})

$(document).on("click",".delete",function (e){
    e.preventDefault();
    let id = $(this).data("id");
    deleteUser(id);
}
)
function search(){
    let user = $(this).val();
    if(user.length){
        $.ajax({
            url:"/admin/show",
            dataType: "json",
            data:{
                "user":user
            },
            method: "get",
            success:function (response){
                populateUser(response)
            },
            error:function (response){
                console.log(response);
            }
        })
    }else{
        showUsers();
    }
}
function showUsers(){
    $.ajax({
        url:"/admin/show",
        dataType:"json",
        method:"get",
        success:function (response){
            populateUser(response);
        },
        error:function (response){
            console.log(response);
        }
    })
}

function populateUser(data){
    let html='';
    let i = 1;
    for(let d of data){
        html+=`<tr id="remove${d.idKorisnik}">
                    <td>${i++}</td>
                    <td>${d.ime}</td>
                    <td>${d.prezime}</td>
                    <td>${d.email}</td>
                    <td>${d.lozinka}</td>
                    <td>${d.brojTelefona}</td>
                    <td>${d.nazivMesta}</td>
                    <td>${d.nazivUloga}</td>
                    <td><a href="/admin/users/edit/${d.idKorisnik}" class="btn btn-info">Izmeni</a></td>
                    <td><a href="#" data-id="${d.idKorisnik}" class="btn btn-info delete">Obriši</a></td>
               </tr>`
    }
    $("#allUsers").html(html);
}

// FUNKCIJA ZA PROVERU KORISNIKA
function checkUser(idName,idSurname,idEmail,idPass,idNumber,idPlace,idGreske){
    let ime,prezime,email,lozinka,brTelefon,mesto,regexImePrezime,regexEmail,regexLozinka,regexMesto,greske=[],user=[];
    ime = document.getElementById(idName).value.trim();
    prezime = document.getElementById(idSurname).value.trim();
    email = document.getElementById(idEmail).value.trim();
    lozinka = document.getElementById(idPass).value.trim();
    brTelefon = document.getElementById(idNumber).value.trim();
    mesto = document.getElementById(idPlace).value.trim();
    regexImePrezime = /^([A-ZŽĐŠ][a-zčćžšđ]{2,15}\s*)+$/;
    regexEmail = /^[\w\d\.]+@([a-z\.])+\.[a-z]{2,5}$/;
    regexLozinka = /^.{6,50}$/;
    regexTelefon = /^\d{9,10}$/;
    regexMesto = /^\d{5}$/;
    if(!regexImePrezime.test(ime)){
        greske.push("Ime mora početi velikim slovom i sadržati najamanje 3 karaktera.");
    }
    if(!regexImePrezime.test(prezime)){
        greske.push("Prezime mora početi velikim slovom i sadržati najamanje 3 karaktera.");
    }
    if(!regexEmail.test(email)){
        greske.push("Loše uneta email adresa.");
    }
    if(!regexLozinka.test(lozinka)){
        greske.push("Lozinka mora sadržati najmanje 6 karaktera!");
    }
    if(!regexTelefon.test(brTelefon)){
        greske.push("Telefon mora imati najmanje 9,a najviše 10 brojeva.");
    }
    if(!regexMesto.test(mesto)){
        greske.push("Poštanski broj mora imati 5 cifara!");
    }
    if(greske.length != 0){
        let divGreske = "<div class='d-flex justify-content-center'><ul class='alert alert-danger'>";
        for(let i=0; i<greske.length; i++){
            divGreske +=`<li>${greske[i]}</li>`;
        }
        divGreske +="</ul></div>";
        document.getElementById(idGreske).innerHTML = divGreske;
        return 0;


    }else{
        user = {
            "ime":ime,
            "prezime":prezime,
            "email":email,
            "lozinka":lozinka,
            "brTelefon":brTelefon,
            "mesto":mesto
        }
        return user;
    }
}

function updateUser(){
    let json,uloga,id;
    json = checkUser("updateIme","updatePrezime","updateEmail","updateLozinka","updateBrTelefon","updateMesto","messageForUser");
    uloga = $("#updateUloga").val();
    id = $("#hiddenID").val();
    if(json != 0){
        $.ajax({
            url:"/admin/users/update",
            method:"PUT",
            dataType:"json",
            data:{
                "json":json,
                "uloga":uloga,
                "id":id,
            },
            success:function(response){
                    let html = `<div class="alert alert-success text-center" role="alert">`;
                    html +=`Uspešno odrađeno ažuriranje.`
                    html +=`</div>`;
                    $("#messageForUser").html(html);
            },
            error:function(response){
                let html = `<div class="alert alert-danger text-center" role="alert">`;
                html +="<p>Došlo je do greške,pokušajte ponovo</p>"
                html +=`</div>`;
                $("#messageForUser").html(html);
            }
        })
    }
}

function deleteUser(id){
    $.ajax({
        url:"/admin/users/delete",
        dataType:"json",
        method:"DELETE",
        data:{
            "id":id
        },
        success:function (response){
            $("#remove"+id).remove();
        },
        error:function (response){
            console.log(response)
        }
    })
}
