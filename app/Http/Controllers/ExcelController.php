<?php

namespace App\Http\Controllers;

use App\Models\Entry;
use Illuminate\Http\Request;


class ExcelController extends Controller
{
    public function entries()
    {
        $entries = Entry::all();

    }
}
