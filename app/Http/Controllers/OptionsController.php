<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class OptionsController extends Controller
{

    public function index()
    {
        return view('options');
    }

    public function changePassword(Request $request)
    {
        // TODO
    }

}
