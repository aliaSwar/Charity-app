<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BaseController extends Controller
{
    public function __construct()
    {
        App::setLocale('ar');
    }
}
