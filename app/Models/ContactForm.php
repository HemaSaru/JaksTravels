<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactUserMail;
use App\Mail\contactAdminMail;

class ContactForm extends Model
{
    use HasFactory;
    public function sendEmail($request){
        $userData = array (
        'name'     => $request->name,
        'email'  =>  $request->email,
        );
       
        $send = Mail::to($request->email)->send(new contactUserMail($userData)); 
        if($send)
            return true;
        else
            return false;
    }

    public function sendAdminEmail($request){
        $adminData = array(
            'name'     => $request->name,
            'email'  =>  $request->email,
            'phone'  =>  $request->phone,
            'msgBody'  =>  $request->msgBody,
        );
        Mail::to("theikigaiclan@gmail.com")->send(new contactAdminMail($adminData));
       return back();
    }

    public function storeInfo($request){
        try {
            $contactDet = new Contact;
            $contactDet->name = $request->name;
            $contactDet->email = $request->email;
            $contactDet->mobile = $request->phone;
            $contactDet->message = $request->msgBody;    
             $save = $contactDet->save();
             if($save)
                return true;
             else
                return false;
        
        }catch (Exception $e) {
            return back()->with('fail', "Error " . $e);
        }
    }
}
