<?php


namespace App\Http\Controllers\Users;


use App\Http\Controllers\BaseController;
use App\Http\Requests\ShoppingCartRequest;
use App\Models\User\ShoppingCart;
use Illuminate\Http\Request;


class ShoppingCartController extends BaseController
{
    protected $shoppingCartModel;
    public function __construct()
    {
        parent::__construct();
        $this->shoppingCartModel = new ShoppingCart();
    }

    public function index(){
        return view("pages.user.korpa",$this->data);
    }
    public function addToCart($mobileId){
        $mobile = $this->shoppingCartModel->findMobileForCart($mobileId);
        $cartItems = session()->get("cartItems");
        if(!$cartItems){
            $cartItems = [];
        }
        $existingIndex = null;
        foreach ($cartItems as $index => $item){
            if($item->mobile->idTelefon == $mobileId){
                $existingIndex = $index;
                break;
            }
        }
        if($existingIndex !== null){
            $cartItems[$existingIndex]->quantity++;
        }else{
            $cartItem= new \stdClass();
            $cartItem->quantity = 1;
            $cartItem->mobile = $mobile;

            array_push($cartItems,$cartItem);
        }

        session()->put("cartItems",$cartItems);
        return response()->json([],200);
    }
    public function removeFromCart($mobileId){
        $existingIndex = null;
        $cartItems = session()->get("cartItems");

        if(!$cartItems){
            $cartItems = [];
        }

        foreach ($cartItems as $index => $item){
            if($item->mobile->idTelefon == $mobileId){
                $existingIndex = $index;
                break;
            }
        }

        if($existingIndex !== null){
            unset($cartItems[$existingIndex]);
            session()->put("cartItems",$cartItems);
            return response()->json([],204);
        }

        return response()->json(["poruka"=>"Uređaj se ne može ukloniti iz korpe jer se proizvod ne nalazi u korpi",409]);
    }

    public function changeProductQuantity(ShoppingCartRequest $request) {
        $mobileId = $request->get("productId");
        $quantity = $request->get("quantity");

        $existingIndex = null;

        $cartItems = session()->get("cartItems");

        if(!$cartItems) {
            $cartItems = [];
        }

        foreach ($cartItems as $index => $item){
            if($item->mobile->idTelefon == $mobileId){
                $existingIndex = $index;
                break;
            }
        }

        if($existingIndex !== null) {
            $cartItems[$existingIndex]->quantity = $quantity;
            session()->put("cartItems", $cartItems);
            return response()->json([], 204);
        }

        return response()->json(["message" => "Ne moze se promeniti kolicina jer proizvod ne postoji u korpi."], 409);
    }

    public function order(){
        $user = session()->get("user");
        $mobile = session()->get("cartItems");
        $ukupno = 0;
        foreach($mobile as $m){
            $ukupno+=$m->quantity * $m->mobile->cena;
        }
        return response()->json(["user"=>$user,"mobiles"=>$mobile,"cena"=>$ukupno]);
    }
    public function confirmOrder(){
        $this->shoppingCartModel->insertKorpa();
        $this->shoppingCartModel->insertPorudzbina();
        session()->remove("cartItems");
        return response()->json([]);
    }
}
