<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Main search entry point
     *
     * @return View
     */
    public function search()
    {
        return view('search');
    }
}