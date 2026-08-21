<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
// Dictatorship 2: Validation logic moved to FormRequest
use App\Utils\ImageLocalStorage;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ImageNotDIController extends Controller
{
    // Dictatorship 3: Defining return types (View)
    public function index(): View
    {
        // Dictatorship 4: Sending data to the view using an associative array ($viewData)
        $viewData = [];
        $viewData['title'] = 'Image Storage - Not DI';

        return view('imagenotdi.index')->with('viewData', $viewData);
    }

    // Dictatorship 2 and 3: ImageRequest validates automatically
    public function save(ImageRequest $request): RedirectResponse
    {
        $storeImageLocal = new ImageLocalStorage;
        $storeImageLocal->store($request);

        return back();
    }
}
