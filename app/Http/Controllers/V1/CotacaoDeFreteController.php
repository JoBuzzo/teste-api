<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CotacaoDeFreteController extends Controller
{
    public function index(Request $request)
    {
        dd($request->all());
    }
}
