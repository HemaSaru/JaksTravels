<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactFormRequest;
use app\Models\ContactForm;

class MainController extends Controller
{

    function Fabout()
    {
        return view('Front.About');
    }

    function ContactUs()
    {
        return view('Front.contact');
    }

    function Flights(){
        return view('Front.flights');
    }

    function userAgreement(){
        return view('Front.UserAgreement');
    }

    function privacyPolicy(){
        return view('Front.PrivacyPolicy');
    }

    function contactForm(ContactFormRequest $request)
    {
        $model = new ContactForm();
        if ($request->post() && $request->validated()) {
            if ($model->sendEmail($request) && $model->sendAdminEmail($request)) {
                if ($model->storeInfo($request))
                    $request->session()->put('success', 'Thank you for sending your request. We will respond to you as soon as possible.');
            } else {
                $request->session()->put('error', 'There was an error in sending your request.');
            }
            return redirect('contact');
        }
        return redirect('contact');
    }

  
}
