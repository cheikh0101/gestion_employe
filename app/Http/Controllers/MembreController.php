<?php

namespace App\Http\Controllers;

use App\Http\Requests\MembreStoreRequest;
use App\Http\Requests\MembreUpdateRequest;
use App\Models\Membre;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MembreController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $membres = Membre::all();
        $structures = Structure::all();
        return view('membre.index', compact('membres', 'structures'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $structures = Structure::all();
        return view('membre.create', compact('structures'));
    }

    /**
     * @param \App\Http\Requests\MembreStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MembreStoreRequest $request)
    {
        $membre = Membre::create($request->validated());

        $request->session()->flash('membre.id', $membre->id);
        return redirect()->route('dashboard.membre.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Membre $membre
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Membre $membre)
    {
        return view('membre.show', compact('membre'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Membre $membre
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Membre $membre)
    {
        $structures = Structure::all();
        return view('membre.edit', compact('membre', 'structures'));
    }

    /**
     * @param \App\Http\Requests\MembreUpdateRequest $request
     * @param \App\Models\Membre $membre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membre $membre)
    {
        $validators = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required'
        ]);

        $membre->update($request->all());

        $request->session()->flash('membre.id', $membre->id);

        return redirect()->route('dashboard.membre.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Membre $membre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Membre $membre)
    {
        $membre->delete();

        return redirect()->route('dashboard.membre.index');
    }

    public function search(Request $request)
    {
        $request->validate([
            'motcle' => 'required|min:3'
        ]);
        $motCle = $request->motcle;
        $membres = Membre::where('matricule', 'like', '%' . $motCle . '%')->orWhere('prenom', 'like', '%' . $motCle . '%')->get();
        return view('membre.index', compact('membres'));
    }
}
