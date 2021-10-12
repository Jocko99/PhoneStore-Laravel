$(document).ready(function (){
messages();
})
$(document).on("click",".odgovori",function (e){
    e.preventDefault();
    let id = $(this).data("id");
    $.ajax({
        url:"/admin/poruke/find",
        method: "GET",
        dataType: "json",
        data:{
            "id":id
        },
        success:function (response){
            window.open(`mailto:${response.email}`)
        },
        error:function (response){
            console.log(response)
        }
    })
})
$(document).on("click",".obrisi",function (e){
    e.preventDefault();
    let id = $(this).data("id");
    $.ajax({
        url:"/admin/poruke/delete",
        method: "GET",
        dataType: "json",
        data:{
            "id":id
        },
        success:function (response){
            $("#row"+id).remove();
        },
        error:function (response){
            console.log(response)
        }
    })
})

function messages(){
    $.ajax({
        url:"/admin/poruke/get",
        method:"GET",
        dataType:"json",
        success:function (response){
            populateTable(response)
        },
        error:function (response){

        }
    })
}

function populateTable(data){
    let html = ``,i=1;
    for(let d of data){
                html+=`<tr id="row${d.idKontakt}">
                        <td>${i++}.</td>
                        <td>${d.ime}</td>
                        <td>${d.prezime}</td>
                        <td>${d.email}</td>
                        <td>${d.poruka}</td>
                        <td>${d.datumKontakt}</td>
                        <td><a class="btn btn-info odgovori" data-id="${d.idKontakt}" href="#">Odgovori</a></td>
                        <td><a class="btn-info btn obrisi" data-id="${d.idKontakt}" href="#">Obriši</a></td>
                    </tr>`
    }
    $("#tabelaPoruke").html(html);
}
