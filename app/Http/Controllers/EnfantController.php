<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnfantStoreRequest;
use App\Http\Requests\EnfantUpdateRequest;
use App\Models\Enfant;
use Illuminate\Http\Request;

class EnfantController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $enfants = Enfant::all();

        return view('enfant.index', compact('enfants'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('enfant.create');
    }

    /**
     * @param \App\Http\Requests\EnfantStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'date_naissance' => 'required'
        ]);
        $enfant = Enfant::create($request->validated());

        $request->session()->flash('enfant.id', $enfant->id);

        return redirect()->route('enfant.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Enfant $enfant
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Enfant $enfant)
    {
        return view('enfant.show', compact('enfant'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Enfant $enfant
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Enfant $enfant)
    {
        return view('enfant.edit', compact('enfant'));
    }

    /**
     * @param \App\Http\Requests\EnfantUpdateRequest $request
     * @param \App\Models\Enfant $enfant
     * @return \Illuminate\Http\Response
     */
    public function update(EnfantUpdateRequest $request, Enfant $enfant)
    {
        $enfant->update($request->validated());

        $request->session()->flash('enfant.id', $enfant->id);

        return redirect()->route('enfant.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Enfant $enfant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Enfant $enfant)
    {
        try {
            $enfant->delete();
            return redirect()->route('enfant.index');
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
