<?php

namespace App\Http\Controllers\Tenagaahli;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TenagaahliController extends Controller
{
    public function index()
    {
        return view ('pages/tenagaahli/index');
    }
}
