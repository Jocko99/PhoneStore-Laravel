$(document).ready(function(){
    $("#firstMobile").on("keyup",ddListFirst)
    //$("#firstMobile").on("blur",function (){
    //     $("#show-list1").html("");
    // })
    $("#secondMobie").on("keyup",ddListSecond)
    // $("#secondMobie").on("blur",function (){
    //     $("#show-list2").html("");
    // })
});

function getMobileSpecificationForFirstMobile(id){
    $.ajax({
        url:"/compare/info",
        method:"get",
        dataType:"json",
        data:{
            "id":id
        },
        success:function (response){
            $("#tableForFirstMobile").html(populateTable(response));
        },
        error:function (response){
            console.log(response);
        }
    })
}
function getMobileSpecificationForSecondMobile(id){
    $.ajax({
        url:"/compare/info",
        method:"get",
        dataType:"json",
        data:{
            "id":id
        },
        success:function (response){
           $("#tableForSecondMobile").html(populateTable(response));
        },
        error:function (response){
            console.log(response);
        }
    })
}

function populateTable(data){
    let html = `<table class="table w-100">
                <thead>
                            <tr>
                                <th>${data.mobile.naziv}</th>
                            </tr>
                            <tr>
                                <th><img src="${imgUrl}/${data.mobile.coverSlika}" alt="${data.mobile.naziv}" class="w-25"/></th>
</tr>
                            </thead>
                            <tbody>
                            <tr class="table-active">
                                <td class="font-weight-bold">Osnovne karakteristike</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivOs}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivOs} - ${data.mobile.nazivOsVerzija}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivChipset}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivProcesor}</td>
                            </tr>
                            <tr class="table-active">
                                <td class="font-weight-bold">Ekran</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.vrednostVelicina}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivNaDodir}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivEkrana}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivRezolucija}</td>
                            </tr>
                            <tr class="table-active">
                                <td class="font-weight-bold">Baterija</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivBaterija}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.kapacitet}</td>
                            </tr>
                            <tr class="table-active">
                                <td class="font-weight-bold">Memorija</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.ram}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.interna}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.eksterna}</td>
                            </tr>
                            <tr class="table-active">
                                <td class="font-weight-bold">Glavna kamera</td>
                            </tr>
                            <tr>
                                <td>${data.backCamera.brojPiksela}</td>
                            </tr>
                            <tr>
                                <td>${data.backCamera.nazivHdr}</td>
                            </tr>
                            <tr>
                                <td>${data.backCamera.nazivOsmeh}</td>
                            </tr>
                            <tr>
                                <td>${data.backCamera.nazivVideo}</td>
                            </tr>
                            <tr>
                                <td>${data.backCamera.nazivBlic}</td>
                            </tr>
                            <tr>
                                <td>${data.backCamera.nazivAutofokus}</td>
                            </tr>
                            <tr class="table-active">
                                <td class="font-weight-bold">Prednja  kamera</td>
                            </tr>
                            <tr>
                                <td>${data.frontCamera.brojPiksela}</td>
                            </tr>
                            <tr>
                                <td>${data.frontCamera.nazivHdr}</td>
                            </tr>
                            <tr>
                                <td>${data.frontCamera.nazivOsmeh}</td>
                            </tr>
                            <tr>
                                <td>${data.frontCamera.nazivVideo}</td>
                            </tr>
                            <tr>
                                <td>${data.frontCamera.nazivBlic}</td>
                            </tr>
                            <tr>
                                <td>${data.frontCamera.nazivAutofokus}</td>
                            </tr>
                            <tr class="table-active">
                                <td class="font-weight-bold">Komunikacija</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivWifi}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivBluetooth}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivUsb}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivNfc}</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.nazivGps}</td>
                            </tr>
                            <tr class="table-active">
                                <td class="font-weight-bold">Težina</td>
                            </tr>
                            <tr>
                                <td>${data.mobile.vrednost}</td>
                            </tr>
                            <tr>
                            <td> <div class="addToCart">
        <a href="#" class="text-uppercase btn addCard" data-id="${data.mobile.idTelefon}">Dodaj u korpu<i class="fas fa-shopping-cart pl-1 "></i></a>
    </div></td>
</tr>
                           </tbody>`

    return html+=`</table>`;
}

function ddListFirst(){
    let value = $(this).val();
    let regex = /^([\w\d\.]+\s*)*$/;
    if(regex.test(value)){
        $.ajax({
            url:"/compare/fetch",
            method:"get",
            dataType:"json",
            data:{
                "mobile":value
            },
            success:function (response){
                $("#show-list1").html(populateList(response));
                $(".mobileIdSearch").click(getFirstId);
            },
            error:function (response){
                console.log(response);
            }
        })
    }else{
        $("#show-list1").html("");
    }
}

function ddListSecond(){
    let value = $(this).val();
    let regex = /^([\w\d\.]+\s*)*$/;
    if(regex.test(value)){
        $.ajax({
            "url":"/compare/fetch",
            method:"get",
            dataType:"json",
            data:{
                "mobile":value
            },
            success:function (response){
                $("#show-list2").html(populateList(response));
                $(".mobileIdSearch").click(getSecondId);
            },
            error:function (response){
                console.log(response);
            }
        })
    }else{
        $("#show-list2").html("");
    }
}

function getFirstId(e){
    e.preventDefault();
    let id = $(this).data("mobile");
    $("#show-list1").html("");
    getMobileSpecificationForFirstMobile(id);
}
function getSecondId(e){
    e.preventDefault();
    $("#show-list2").html("");
    let id = $(this).data("mobile");
    getMobileSpecificationForSecondMobile(id);
}

function populateList(data){
    let html = "";
    for(let i of data){
        html+=`<a href="#" data-mobile="${i.idTelefon}" class="list-group-item list-group mobileIdSearch"><img src="${imgUrl}/${i.coverSlika}" alt="${i.naziv}" class="w-25"/> ${i.naziv}</a>`
    }
    return html;
}


