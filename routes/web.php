<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/",[\App\Http\Controllers\Users\HomeController::class,"index"])->name("home");
Route::get("/fetch",[\App\Http\Controllers\Users\HomeController::class,"findMobile"]);
Route::post("/registracija",[\App\Http\Controllers\Users\UserController::class,"registration"])->name("registration");
Route::post("/login",[\App\Http\Controllers\Users\UserController::class,"login"])->name("login");
Route::get("/logout",[\App\Http\Controllers\Users\UserController::class,"logout"])->name("logout");
//Route::get("/activate/user",[\App\Http\Controllers\Users\UserController::class,"confirm"]);
Route::get("/telefoni",[\App\Http\Controllers\Users\MobileController::class,"index"])->name("mobiles");
Route::get("/telefoni/{telefon}",[\App\Http\Controllers\Users\MobileController::class,"showMobile"])->name("telefoni")->where(['telefon' => '[0-9]+']);
Route::get("/mobiles/fetch",[\App\Http\Controllers\Users\MobileController::class,"getMobiles"])->name("mobiles/fetch");
Route::get("/uporedi",[\App\Http\Controllers\Users\CompareController::class,"index"])->name("compare");
Route::get("/compare/fetch",[\App\Http\Controllers\Users\CompareController::class,"getMobile"])->name("compare/fetch");
Route::get("/compare/info",[\App\Http\Controllers\Users\CompareController::class,"getMobileSpecification"])->name("compare/info");
Route::get("/onama",[\App\Http\Controllers\Users\AboutController::class,"index"])->name("about");
Route::get("/kontakt",[\App\Http\Controllers\Users\ContactController::class,"index"])->name("contact");
Route::post("/kontakt/poruka",[\App\Http\Controllers\Users\ContactController::class,"message"]);
Route::get("/404",[\App\Http\Controllers\ErrorController::class,"not_found"])->name("not-found");
Route::post("/korpa/add/{mobileId}",[\App\Http\Controllers\Users\ShoppingCartController::class,"addToCart"])->where(['mobileId' => '[0-9]+']);
Route::get("/autor",[\App\Http\Controllers\AutorController::class,"index"])->name("autor");

Route::middleware(["login"])->group(function(){
    Route::get("/korpa",[\App\Http\Controllers\Users\ShoppingCartController::class,"index"])->name("korpa");
    Route::delete("/korpa/delete/{mobileId}",[\App\Http\Controllers\Users\ShoppingCartController::class,"removeFromCart"])->where(['mobileId' => '[0-9]+']);
    Route::put("/korpa",[\App\Http\Controllers\Users\ShoppingCartController::class,"changeProductQuantity"]);
    Route::get("/korpa/naruci",[\App\Http\Controllers\Users\ShoppingCartController::class,"order"]);
    Route::post("/porudzbina",[\App\Http\Controllers\Users\ShoppingCartController::class,"confirmOrder"]);
    Route::get("/korisnik",[\App\Http\Controllers\Users\UserController::class,"showUser"])->name("account");
    Route::put("/korisnik/lozinka",[\App\Http\Controllers\Users\UserController::class,"changePassword"]);
    Route::put("/korisnik/telefon",[\App\Http\Controllers\Users\UserController::class,"changeNumber"]);
    Route::put("/korisnik/email",[\App\Http\Controllers\Users\UserController::class,"changeEmail"]);
});




Route::prefix('admin')->group(function () {
    Route::middleware(["admin"])->group(function (){
        Route::resource("/mobiles",\App\Http\Controllers\Admin\MobileController::class);
        Route::get("/",[\App\Http\Controllers\Admin\AdminController::class,"index"])->name("admin");
        Route::get("/specification",[\App\Http\Controllers\Admin\SpecificationController::class,"allSpecification"])->name("specification");
        Route::get("/users",[\App\Http\Controllers\Admin\UserController::class,"index"])->name("users");
        Route::get("/users/edit/{user}",[\App\Http\Controllers\Admin\UserController::class,"edit"]);
        Route::delete("/users/delete",[\App\Http\Controllers\Admin\UserController::class,"delete"]);
        Route::put("/users/update",[\App\Http\Controllers\Admin\UserController::class,"update"]);
        Route::get("/show",[\App\Http\Controllers\Admin\UserController::class,"showUsers"]);
        Route::get("/porudzbine",[\App\Http\Controllers\Admin\OrderController::class,"index"])->name("porudzbine");
        Route::get("/izvestaji",[\App\Http\Controllers\Admin\ReportController::class,"index"])->name("izvestaji");
        Route::get("/poruke",[\App\Http\Controllers\Users\ContactController::class,"showMessages"])->name("poruke");
        Route::get("/poruke/get",[\App\Http\Controllers\Users\ContactController::class,"getMessages"]);
        Route::get("/poruke/find",[\App\Http\Controllers\Users\ContactController::class,"findMessage"]);
        Route::get("/poruke/delete",[\App\Http\Controllers\Users\ContactController::class,"deleteMessage"]);
        Route::resource("/specification/mark",\App\Http\Controllers\Admin\Specification\MarkController::class);
        Route::resource("/specification/chipset",\App\Http\Controllers\Admin\Specification\ChipsetController::class);
        Route::resource("/specification/processor",\App\Http\Controllers\Admin\Specification\ProcessorController::class);
        Route::resource("/specification/os",\App\Http\Controllers\Admin\Specification\OsController::class);
        Route::resource("/specification/os-version",\App\Http\Controllers\Admin\Specification\OsVersionController::class);
        Route::resource("/specification/camera",\App\Http\Controllers\Admin\Specification\CameraController::class);
        Route::resource("/specification/hdr",\App\Http\Controllers\Admin\Specification\HdrController::class);
        Route::resource("/specification/smile-detection",\App\Http\Controllers\Admin\Specification\SmileDetectionController::class);
        Route::resource("/specification/video",\App\Http\Controllers\Admin\Specification\VideoController::class);
        Route::resource("/specification/blic",\App\Http\Controllers\Admin\Specification\BlicController::class);
        Route::resource("/specification/autofocus",\App\Http\Controllers\Admin\Specification\AutofocusController::class);
        Route::resource("/specification/autofocus",\App\Http\Controllers\Admin\Specification\AutofocusController::class);
        Route::resource("/specification/battery-capacity",\App\Http\Controllers\Admin\Specification\BatteryCapacityController::class);
        Route::resource("/specification/battery-type",\App\Http\Controllers\Admin\Specification\BatteryTypeController::class);
        Route::resource("/specification/display-size",\App\Http\Controllers\Admin\Specification\DisplaySizeController::class);
        Route::resource("/specification/display-on-touch",\App\Http\Controllers\Admin\Specification\DisplayOnTouchController::class);
        Route::resource("/specification/display-resolution",\App\Http\Controllers\Admin\Specification\DisplayResolutionController::class);
        Route::resource("/specification/memory",\App\Http\Controllers\Admin\Specification\MemoryController::class);
        Route::resource("/specification/ram",\App\Http\Controllers\Admin\Specification\RamController::class);
        Route::resource("/specification/internal",\App\Http\Controllers\Admin\Specification\InternalController::class);
        Route::resource("/specification/external",\App\Http\Controllers\Admin\Specification\ExternalController::class);
        Route::resource("/specification/wifi",\App\Http\Controllers\Admin\Specification\WifiController::class);
        Route::resource("/specification/bluetooth",\App\Http\Controllers\Admin\Specification\BluetoothController::class);
        Route::resource("/specification/usb",\App\Http\Controllers\Admin\Specification\UsbController::class);
        Route::resource("/specification/nfc",\App\Http\Controllers\Admin\Specification\NfcController::class);
        Route::resource("/specification/gps",\App\Http\Controllers\Admin\Specification\GpsController::class);
        Route::resource("/specification/weight",\App\Http\Controllers\Admin\Specification\WeightController::class);
    });
});
