<?php

namespace App\Http\Controllers;

use App\Http\Requests\ConjointStoreRequest;
use App\Http\Requests\ConjointUpdateRequest;
use App\Models\Conjoint;
use Illuminate\Http\Request;

class ConjointController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $conjoints = Conjoint::all();

        return view('conjoint.index', compact('conjoints'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('conjoint.create');
    }

    /**
     * @param \App\Http\Requests\ConjointStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ConjointStoreRequest $request)
    {
        $conjoint = Conjoint::create($request->validated());

        $request->session()->flash('conjoint.id', $conjoint->id);

        return redirect()->route('conjoint.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Conjoint $conjoint
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Conjoint $conjoint)
    {
        return view('conjoint.show', compact('conjoint'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Conjoint $conjoint
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Conjoint $conjoint)
    {
        return view('conjoint.edit', compact('conjoint'));
    }

    /**
     * @param \App\Http\Requests\ConjointUpdateRequest $request
     * @param \App\Models\Conjoint $conjoint
     * @return \Illuminate\Http\Response
     */
    public function update(ConjointUpdateRequest $request, Conjoint $conjoint)
    {
        $conjoint->update($request->validated());

        $request->session()->flash('conjoint.id', $conjoint->id);

        return redirect()->route('conjoint.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Conjoint $conjoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Conjoint $conjoint)
    {
        $conjoint->delete();

        return redirect()->route('conjoint.index');
    }
}
