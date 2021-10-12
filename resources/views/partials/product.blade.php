<a href="{{route("telefoni",["telefon"=>$product->idTelefon])}}" class="text-decoration-none">
<div class="mobile">
    <div class="mobile-image text-center">
        <img src={{asset("storage/mobiles/".$product->coverSlika)}} alt="{{$product->naziv}}" class="w-50"/>
    </div>
    <div class="mobile-info">
        <p class="">{{$product->naziv}}</p>
        <ul >
            <li>Dijagonala: {{$product->vrednostVelicina}} inch</li>
            <li>RAM: {{$product->ram}} gb</li>
            <li>Interna : {{$product->interna}} gb</li>
            <li>Kamera: {{$product->brojPiksela}} mpx</li>
            <li>Baterija: {{$product->kapacitet}} mAh</li>
        </ul>
    </div>
    <div class="price">
        <p class="h6">Cena: <span class="text-success">{{$product->cena}}</span> din</p>
    </div>
    <div class="addToCart">
        <a href="#" class="text-uppercase btn addCard" data-id="{{$product->idTelefon}}">Dodaj u korpu<i class="fas fa-shopping-cart pl-1 "></i></a>
    </div>
</div>
</a>
