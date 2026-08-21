<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface ImageStorage
{
    // Dictadura 3: Tipado estricto (void)
    public function store(Request $request): void;
}
