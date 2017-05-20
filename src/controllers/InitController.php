<?php

namespace Anurag\Controllers;

use Anurag\Models\Store;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InitController extends Controller
{

    public function Index()
    {
        return view('Shopbase::Index');
    }

}
