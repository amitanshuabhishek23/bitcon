<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function privacyPolicy()
    {
        return view('privacy-policy');
    }

    public function faq()
    {
        return view('faq');
    }
}
