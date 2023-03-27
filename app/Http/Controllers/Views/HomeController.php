<?php

namespace App\Http\Controllers\Views;

use App\Models\Office;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    /**
     * Home View
     */
    public function home(): View
    {
        return view('../home');
    }
}
