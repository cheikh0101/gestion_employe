<?php

namespace App\Http\Controllers;

use App\Models\Gestionnaire;
use App\Models\Structure;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;


class GestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gestionnaires = Gestionnaire::all();
        return view('gestionnaire.index', compact('gestionnaires'));
    }

    public function create()
    {
        $structures = Structure::all();
        return view('gestionnaire.create', compact('structures'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $gestionnaire = Gestionnaire::create([
                'user_id' => $user->id,
                'structure_id' => $request->structure_id
            ]);

            return redirect()->route('dashboard.gestionnaire.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function edit(Gestionnaire $gestionnaire)
    {
        $structures = Structure::all();
        return view('gestionnaire.edit', compact('gestionnaire', 'structures'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gestionnaire  $gestionnaire
     * @return \Illuminate\Http\Response
     */
    public function show(Gestionnaire $gestionnaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gestionnaire  $gestionnaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gestionnaire $gestionnaire)
    {
        try {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255'],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'structure_id' => 'required'
            ]);
            $user = User::find($gestionnaire->user_id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->update();

            $gestionnaire->user_id = $user->id;
            $gestionnaire->structure_id = $request->structure_id;
            $gestionnaire->update();

            return redirect()->route('dashboard.gestionnaire.index');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gestionnaire  $gestionnaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gestionnaire $gestionnaire)
    {
        try {
            $gestionnaire->deleteOrFail();
            $user = User::find($gestionnaire->user_id);
            $user->deleteOrFail();
            return back();
        } catch (\Throwable $th) {
            //throw $th;
            return back();
        }
    }
}
