<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use App\Interfaces\ImageStorage; // Dictadura 2: Validación delegada al Request
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ImageController extends Controller
{
    // Dictadura 3: Tipado de retorno definido como View
    public function index(): View
    {
        // Dictadura 4: Datos enviados a la vista mediante arreglo $viewData
        $viewData = [];
        $viewData['title'] = 'Image Storage - DI';

        return view('image.index')->with('viewData', $viewData);
    }

    // Dictadura 2 y 3: Inyectamos ImageRequest para que valide antes de entrar al método
    public function save(ImageRequest $request): RedirectResponse
    {
        // Aquí ocurre la "Magia" de la Inversión de Dependencias
        $storeInterface = app(ImageStorage::class);
        $storeInterface->store($request);

        return back();
    }
}
