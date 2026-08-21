<?php

namespace App\Http\Controllers;

// Dictatorship 1: Class import reference
use Illuminate\View\View;

class HomeController extends Controller
{
    // Dictatorship 3: Defining return types (View)
    public function index(): View
    {
        // Dictatorship 4: Sending data to the view using an associative array ($viewData)
        $viewData = [];
        $viewData['title'] = 'Home Page - Online Store';

        return view('home.index')->with('viewData', $viewData);
    }

    public function about(): View
    {
        // Dictatorship 4: Sending data to the view using an associative array ($viewData)
        $viewData = [];
        $viewData['title'] = 'About us - Online Store';
        $viewData['subtitle'] = 'About us';
        $viewData['description'] = 'This is an about page ...';
        $viewData['author'] = 'Developed by: Isabella Cadavid Posada';

        return view('home.about')->with('viewData', $viewData);
    }

    public function contact(): View
    {
        // Dictatorship 4: Sending data to the view using an associative array ($viewData)
        $viewData = [];
        $viewData['title'] = 'Contact - Online Store';
        $viewData['subtitle'] = 'Contact us';
        $viewData['name'] = 'Isabella Cadavid';
        $viewData['address'] = 'Medellín, Colombia';
        $viewData['phone'] = '300 000 0000';

        return view('home.contact')->with('viewData', $viewData);
    }
}
