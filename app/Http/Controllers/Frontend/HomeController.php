<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $data['pageTitle'] = 'Home';
        return view('frontend.home')->with($data);
    }

}
