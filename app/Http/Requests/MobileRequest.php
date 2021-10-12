<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MobileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "coverSlika" => 'bail|required|file|max:200|mimes:jpg,jpeg,png',
            "mobileName" => 'bail|required|min:3',
            "mobileBrand" => "bail|required|gt:0",
            "mobilePrice" => "bail|required",
            "mobileOs" => "bail|required|gt:0",
            "mobileChipset" => "bail|required|gt:0",
            "mobileMainCamera" => "bail|required|gt:0",
            "mobileBackCameraHdr" => "bail|required|gt:0",
            "mobileBackCameraDetectionSmile" => "bail|required|gt:0",
            "mobileBackCameraVideo" => "bail|required|gt:0",
            "mobileBackCameraBlic" => "bail|required|gt:0",
            "mobileBackCameraAutoFocus" => "bail|required|gt:0",
            "mobileFrontCamera" => "bail|required|gt:0",
            "mobileFrontCameraHdr" => "bail|required|gt:0",
            "mobileFrontCameraDetectionSmile" => "bail|required|gt:0",
            "mobileFrontCameraVideo" => "bail|required|gt:0",
            "mobileFrontCameraBlic" => "bail|required|gt:0",
            "mobileFrontCameraAutoFocus" => "bail|required|gt:0",
            "mobileDisplaySize" => "bail|required|gt:0",
            "mobileTouch" => "bail|required|gt:0",
            "mobileDisplayType" => "bail|required|gt:0",
            "mobileDisplayResolution" => "bail|required|gt:0",
            "mobileBattery" => "bail|required|gt:0",
            "mobileBatteryCapacity" => "bail|required|gt:0",
            "mobileRam" => "bail|required|gt:0",
            "mobileInternal" => "bail|required|gt:0",
            "mobileCardSlot" => "bail|required|gt:0",
            "mobileWifi" => "bail|required|gt:0",
            "mobileBluetooth" => "bail|required|gt:0",
            "mobileUsb" => "bail|required|gt:0",
            "mobileNfc" => "bail|required|gt:0",
            "mobileGps" => "bail|required|gt:0",
            "mobileWeight" => "bail|required|gt:0"
        ];
    }

    public function messages()
    {
        return [
            "coverSlika.required" => "Slika je obavezan parametar i ne može biti veća od 200kb.",
            "mobileName.required" => "Naziv uređaja je obavezan parametar i mora sadržati najmanje 3 karaktera.",
            "mobileBrand.gt" => "Brend je obavezan parametar.",
            "mobilePrice.required" => "Cena je obavezan parametar",
            "mobileOs.gt" => "Operativni sistem je obavezan parametar.",
            "mobileChipset.gt" => "Chipset je obavezan parametar.",
            "mobileMainCamera.gt" => "Broj piksela za zadnju kameru je obavezan parametar.",
            "mobileBackCameraHdr.gt" => "Hdr za zadnju kameru je obavezan parametar.",
            "mobileBackCameraDetectionSmile.gt" => "Detekcija osmeha za zadnju kameru je obavezan parametar.",
            "mobileBackCameraVideo.gt" => "Video za zadnju kameru je obavezan parametar.",
            "mobileBackCameraBlic.gt" => "Blic za zadnju kameru je obavezan parametar.",
            "mobileBackCameraAutoFocus.gt" => "Autofokus za zadnju kameru je obavezan parametar.",
            "mobileFrontCamera.gt" => "Broj piksela za prednju kameru je obavezan parametar.",
            "mobileFrontCameraHdr.gt" => "Hdr za prednju kameru je obavezan parametar.",
            "mobileFrontCameraDetectionSmile.gt" => "Detekcija osmeha za prednju kameru je obavezan parametar.",
            "mobileFrontCameraVideo.gt" => "Video za prednju kameru je obavezan parametar.",
            "mobileFrontCameraBlic.gt" => "Blic za prednju kameru je obavezan parametar.",
            "mobileFrontCameraAutoFocus.gt" => "Autofokus za prednju kameru je obavezan parametar.",
            "mobileDisplaySize.gt" => "Veličina ekrana je obavezan parametar.",
            "mobileTouch.gt" => "Ekran na dodir je obavezan parametar.",
            "mobileDisplayType.gt" => "Tip ekrana je obavezan parametar.",
            "mobileDisplayResolution.gt" => "Rezolucija ekrana je obavezan parametar.",
            "mobileBattery.gt" => "Baterija je obavezan parametar.",
            "mobileBatteryCapacity.gt" => "Kapacitet baterije je obavezan parametar.",
            "mobileRam.gt" => "Ram memorija je obavezan parametar.",
            "mobileInternal.gt" => "Interna memorija je obavezan parametar.",
            "mobileCardSlot.gt" => "Eksterna memorija je obavezan parametar.",
            "mobileWifi.gt" => "Wifi je obavezan parametar.",
            "mobileBluetooth.gt" => "Bluetooth je obavezan parametar.",
            "mobileUsb.gt" => "Usb je obavezan parametar.",
            "mobileNfc.gt" => "Nfc je obavezan parametar.",
            "mobileGps.gt" => "Gps je obavezan parametar.",
            "mobileWeight.gt" => "Težina je obavezan parametar."
        ];
    }
}
