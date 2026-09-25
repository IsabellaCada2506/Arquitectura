<?php

namespace App\Http\Controllers;

use App\Http\Requests\HumanSaveRequest;
use App\Models\Human;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class HumanController extends Controller
{
    public function index(): View
    {
        $viewData = [];
        $viewData['title'] = 'Lista de humanos';
        $viewData['humans'] = Human::orderByDesc('aura')->get();

        return view('human.index')->with('viewData', $viewData);
    }

    public function create(): View
    {
        $viewData = [];
        $viewData['title'] = 'Registrar humano';

        return view('human.create')->with('viewData', $viewData);
    }

    public function save(HumanSaveRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        $human = new Human;
        $human->setName($validatedData['name']);
        $human->setAura((int) $validatedData['aura']);
        $human->setHierarchy($validatedData['hdierarchy']);
        $human->save();

        return redirect()
            ->route('human.index')
            ->with('success', 'El humano fue registrado correctamente.');
    }

    public function battle(): View
    {
        $humans = Human::orderBy('id')->take(2)->get();
        $winnerMessage = 'No hay suficientes humanos para realizar una batalla.';

        if ($humans->count() === 2) {
            $humanOne = $humans->get(0);
            $humanTwo = $humans->get(1);

            if ($humanOne->getAura() > $humanTwo->getAura()) {
                $winnerMessage = 'El ganador es '.$humanOne->getName().'.';
            } elseif ($humanTwo->getAura() > $humanOne->getAura()) {
                $winnerMessage = 'El ganador es '.$humanTwo->getName().'.';
            } else {
                $winnerMessage = 'La batalla termina en empate.';
            }
        }

        $viewData = [];
        $viewData['title'] = 'Batalla de humanos';
        $viewData['humans'] = $humans;
        $viewData['winnerMessage'] = $winnerMessage;

        return view('human.battle')->with('viewData', $viewData);
    }
}
