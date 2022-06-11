<?php

namespace App\Http\Controllers;

use App\Http\Requests\StructureStoreRequest;
use App\Http\Requests\StructureUpdateRequest;
use App\Models\Structure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StructureController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $structures = Structure::all();

        return view('structure.index', compact('structures'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('structure.create');
    }

    /**
     * @param \App\Http\Requests\StructureStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nom' => 'required',
            'code' => 'required'
        ]);
        $structure = new Structure($request->all());
        $structure->save();
        $request->session()->flash('structure.id', $structure->id);
        return redirect()->route('dashboard.structure.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Structure $structure
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Structure $structure)
    {
        return view('structure.show', compact('structure'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Structure $structure
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Structure $structure)
    {
        return view('structure.edit', compact('structure'));
    }

    /**
     * @param \App\Http\Requests\StructureUpdateRequest $request
     * @param \App\Models\Structure $structure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Structure $structure)
    {
        $validators = Validator::make($request->all(), [
            'nom' => 'required',
            'code' => 'required',
        ]);
        $structure->update($request->all());

        $request->session()->flash('structure.id', $structure->id);

        return redirect()->route('dashboard.structure.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Structure $structure
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Structure $structure)
    {
        try {
            $structure->delete();
            return redirect()->route('dashboard.structure.index');
        } catch (\Throwable $th) {
            //throw $th;
            return back();
        }
    }

    public function search(Request $request)
    {
        $request->validate([
            'motCle' => 'required|min:2'
        ]);
        $motCle = $request->motCle;
        $structures = Structure::where('nom', 'like', '%' . $motCle . '%')->orWhere('code', 'like', '%' . $motCle . '%')->get();
        return view('structure.index', compact('structures'));
    }
}
