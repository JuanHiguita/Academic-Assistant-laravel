<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //Home views
    public function index()
    {
        return view('app_html.index');
    }
    public function calendar()
    {
        return view('app_html.academic_calendar');
    }
    public function average()
    {
        return view('app_html.average_notes');
    }
    public function graphics()
    {
        return view('test');
    }
}
