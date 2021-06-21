<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        // Pone el valor del idioma en la sesión
        App::setlocale($locale);
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
