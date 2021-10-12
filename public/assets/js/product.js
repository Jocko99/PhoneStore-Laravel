$(document).ready(function(){
    $(".page-link").click(loadMoreMobiles);
    $("#searchButton").click(filterAndSortMobiles)
    $("#sort").on("change",filterAndSortMobiles)
});

$(document).on("click","#potvrdiPorudzbinu",function (e){
    e.preventDefault();
    $.ajax({
        url:"/porudzbina",
        method:"post",
        dataType:"json",
        success:function (response){
            let html=`<div class="alert alert-success alert-dismissible fade show text-center" id="orderConfirmed" role="alert">
            Porudzbina je uspešno obavljenja,uskoro će Vas kontaktirati naš operater za dalja uputstva.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>`
            $("#orderConfirmed").html(html);
            if($('#orderConfirmed').length){
                setTimeout(function(){
                    $('#orderConfirmed').find('.close')[0].click();
                },1*1500);
            }
            window.location.replace("/telefoni");
        },
        error:function (response){
            console.log(response)
        }
    })

})

$(document).on("click","#naruci",function (e){
    e.preventDefault();
    $.ajax({
        url:"/korpa/naruci",
        method:"GET",
        dataType:"json",
        success:function (response){
            $("#proizvodiUkorpi").hide();
            shoppingCartForm(response.user,response.mobiles,response.cena)
        },error:function (response){

        }
    })
})

$(document).on("click","#pronadji",function (e){
    let naziv = $("#nazivTelefona").val().trim();
    let regexNaziv = /^([\w\d]*\s*)*$/;
    if(regexNaziv.test(naziv)){
        $.ajax({
            url:"/fetch",
            dataType:"json",
            data:{
                "naziv":naziv
            },
            success:function (response){
                if(response.length){
                    printProduct("#prikaziUredjaj",response)
                }else{
                    let html = `<p class="display-4">Traženi uređaj nemamo na stanju</p>`
                    $("#prikaziUredjaj").html(html);
                }
            },
            error:function (response){
                console.log("error : " + response);
            }
        })
    }
})

$(document).on("click",".addCard",function (e){
    e.preventDefault();
    let id = $(this).data("id");
    addToCart(id);
})

$(document).on("click",".removeMobileFromCart",function (e){
    e.preventDefault();
    let id = $(this).data("removeid");
    removeFromCart(id);
})

$(document).on("blur",".quantity",function (){
    let id = $(this).data("quantity");
    changeQuantityFromCart(id);
})

function updateTotalPrice() {
    var mobiles = $(".mobileProduct")

    let total = 0

    for(mobile of mobiles) {
        let price = $(mobile).data("price")
        let id = $(mobile).data("allid");
        let quantity = $("#quantityId" + id).val()
        total += price * quantity
    }
    $("#total").html(parseFloat(total.toFixed(3)))
}




function changeQuantityFromCart(id){
    let quantity = $("#quantityId"+id).val();
    if(quantity > 0){
        $.ajax({
            url:"/korpa",
            method:"PUT",
            data:{
                "productId":id,
                "quantity": quantity
            },
            success:function (response){
                updateTotalPrice();
            },
            error:function (response){
                console.log(response);
            }
        })
    }else {
        $("#quantityId"+id).val("1");
        alert("KOLICINA NE MOZE BITI NEGATIVNA!");
    }

}

function removeFromCart(id){
    $.ajax({
        url:"/korpa/delete/"+id,
        method:"delete",
        dataType:"json",
        success:function (response){
            $("#cartItem"+id).remove();
            updateTotalPrice();
        },
        error:function (response){
            console.log(response)
        }
    })
}


function addToCart(id){
    $.ajax({
        url: "/korpa/add/"+id,
        dataType: "json",
        method: "post",
        headers: {
            "Accept": "application/json"
        },
        success:function (response){
            let html=`<div class="alert alert-success alert-dismissible fade show text-center" id="addedToCart" role="alert">
            Proizvod je uspešno dodat u korpu.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>`
            $("#addedToCart").html(html);
            if($('#addedToCart').length){
                setTimeout(function(){
                    $('#addedToCart').find('.close')[0].click();
                },1*1000);
            }
        },
        error:function (){

        }
    })
}

function loadMoreMobiles(e){
    e.preventDefault();
    let search = $("#searchMobile").val().trim();
    if(search==""){
        search=null;
    }
    let mark = $("#mark").val();
    if(mark=="0"){
        mark=null;
    }
    let priceFrom = $("#odCena").val();
    let priceTill = $("#doCena").val();
    let sort = $("#sort").val();
    if(sort=="0"){
        sort=null;
    }
    let page = $(this).data("page");
    getAllMobiles(page,search,mark,priceFrom,priceTill,sort)
}

function changePagination(totalLinks, currentPage){
    let html = "";
    for(let i = 1; i <= totalLinks; i++){
        if(i != currentPage){
            html += `<li class="page-item"><a class="page-link" id="link${i}" data-page="${i}" href="#">${i}</a></li>`;
        }else{
            html += `<li class="page-item active"><a class="page-link" id = "link${i}" data-page="${i}" href="#">${i}</a></li>`;
        }
    }
    $(".pagination").html(html);
    $(".page-link").click(loadMoreMobiles);
}

function changeActivePageLink(currentPage){
    $('.page-item').removeClass('active');
    $('#link' + currentPage).parent().addClass('active');
}

function filterAndSortMobiles(){
    let search = $("#searchMobile").val().trim();
    let mark = $("#mark").val();
    let priceFrom = $("#odCena").val();
    let priceTill = $("#doCena").val();
    let sort = $("#sort").val();
    let regexSearch,regexPrice;
    regexSearch = /^([A-z\d]+\s*)*$/;
    regexPrice = /^[\d\.]*$/;
    if(search==""){
        search=null;
    }
    if(mark=="0"){
        mark=null;
    }
    if(sort=="0"){
        sort=null;
    }
    if(!regexSearch.test(search)){
        $("#searchMobileInfo").html("Pogrešan naziv, pokušajte ponovo");
        return;
    }else
    {
        $("#searchMobileInfo").html("");
    }
    if(!regexPrice.test(priceFrom)){
        $("#odCenaInfo").html("Pogrešan format cene, pokušajte ponovo");
        return;
    }else
    {
        $("#odCenaInfo").html("");
    }
    if(!regexPrice.test(priceTill)){
        $("#doCenaInfo").html("Pogrešan format cene, pokušajte ponovo");
        return;
    }else
    {
        $("#doCenaInfo").html("");
    }
    getAllMobiles(1,search,mark,priceFrom,priceTill,sort);
}

function getAllMobiles(page,search,mark,priceFrom,priceTill,sort){
    const caller = arguments.callee.caller.name;
    $.ajax({
        url:"/mobiles/fetch",
        method:"get",
        dataType:"json",
        data:{
            page,
            "search":search,
            "mark":mark,
            "priceFrom":priceFrom,
            "priceTill":priceTill,
            "sort":sort
        },
        success:function (response){
            printProduct("#products",response.data)
            if(caller == "filterAndSortMobiles"){
                changePagination(response.last_page,response.current_page);
            }
            if(caller == "loadMoreMobiles"){
                changeActivePageLink(response.current_page);
            }
            console.log(response)
        },
        error:function (error){
           // console.log(error);
        }
    })
}

function shoppingCartForm(user,mobiles,cena){
    let html=`<div class="container-fluid">
            <div class="container">
            <div class="row">
                <div class="col-6">
                <p>Ime: <strong>${user.ime}</strong></p>
                <p>Prezime: <strong>${user.prezime}</strong></p>
                <p>Email: <strong>${user.email}</strong></p>
                <p>Telefon: <strong>${user.brojTelefona}</strong></p>
                <p>Mesto: <strong>${user.nazivMesta}</strong></p>
        </div>
            <div class="col-6 d-flex justify-content-between">`

                for(let m of mobiles){
                    html+=`<div>
                    <p>Naziv: <strong>${m.mobile.naziv}</strong></p>
                    <p><img src="${imgUrl}/${m.mobile.coverSlika}" alt="${m.mobile.naziv}" class="w-25"/></p>
                    <p>Količina: <strong>${m.quantity}</strong></p>
                    <p>Cena: <strong>${m.quantity*m.mobile.cena}</strong> dinara</p>
                    </div>`

                }

html+=`
        </div>
        </div>
            <div class="row d-flex justify-content-end">
                <h3 class="h2">Ukupno: <strong>${cena}</strong> dinara</h3>
            </div>
        <div class="row d-flex justify-content-between">
            <a href="/korpa"" class="btn btn-info">Odustani</a>
            <a href="#" id="potvrdiPorudzbinu" class="btn btn-info">Potvrdi poruđžbinu</a>
        </div>
        </div>
        </div>`
    $("#pregledPredNarudzbinu").html(html);
}

function printProduct(div,mobile){
    let html = "";

    for(let m of mobile) {
        html += `<a href="/telefoni/${m.idTelefon}" class="text-decoration-none"><div class="mobile">
    <div class="mobile-image text-center">
        <img src="${imgUrl}/${m.coverSlika}" alt="${m.naziv}" class="w-50"/>
    </div>
    <div class="mobile-info">
        <p class="">${m.naziv}</p>
        <ul >
            <li>Dijagonala: ${m.vrednostVelicina} inch</li>
            <li>RAM: ${m.ram} gb</li>
            <li>Interna : ${m.interna} gb</li>
            <li>Kamera: ${m.brojPiksela} mpx</li>
            <li>Baterija: ${m.kapacitet} mAh</li>
        </ul>
    </div>
    <div class="price">
        <p class="h6">Cena: <span class="text-success">${m.cena}</span> din</p>
    </div>
    <div class="addToCart">
        <a href="#" class="text-uppercase btn addCard" data-id="${m.idTelefon}">Dodaj u korpu<i class="fas fa-shopping-cart pl-1 "></i></a>
    </div>
</div>
</a>`;
        $(div).html(html);
    }

}
