<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schoolyear;

class SchoolyearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolyears = Schoolyear::orderBy('end_at', 'DESC')->paginate(session()->get('paginate'));
        $selected = null;
        if (Schoolyear::count()) {
            $selected = Schoolyear::where('selected', true)->first();
            // $schoolyears->forget($selected->id);
            // $schoolyears->all();
        }

        return view('schoolyears.index', [
            'schoolyears' => $schoolyears,
            'selected' => $selected,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schoolyears.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:schoolyears',
            'start_at' => 'required|digits:4|integer|min:1901|max:2155',
            'end_at' => 'required|digits:4|integer|min:1901|max:2155|gte:start_at',
        ]);

        $schoolyear = Schoolyear::create($request->all());
        $schoolyear->id_creator = auth()->user()->id;
        // Si es el primer registro
        if (Schoolyear::count() == 1) {
            $schoolyear->selected = true;
        } else {

            // TODO si hay otros cursos, preguntar si activar este curso al crearlo

        }
        $schoolyear->save();

        $request->session()->flash('flash.banner', __('The information was saved successfully.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('schoolyears.show', $schoolyear);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function show(Schoolyear $schoolyear)
    {
        return view('schoolyears.show', [
            'schoolyear' => $schoolyear,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function edit(Schoolyear $schoolyear)
    {
        return view('schoolyears.edit', [
            'schoolyear' => $schoolyear,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Schoolyear $schoolyear)
    {
        // Como 'name' es un campo de valores únicos, necesitamos indicar
        // la excepción en el tercer parámetro de 'unique' para el registro
        // que vamos a actualizar mediante el id, de otra forma devuelve
        // el error de campo duplicado.
        $request->validate([
            'name' => 'required|max:255|unique:schoolyears,name,' . $schoolyear->id,
            'start_at' => 'required|digits:4|integer|min:1901|max:2155',
            'end_at' => 'required|digits:4|integer|min:1901|max:2155|gte:start_at',
        ]);

        $schoolyear->update($request->all());

        $request->session()->flash('flash.banner', __('The information was saved successfully.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('schoolyears.show', $schoolyear);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schoolyear $schoolyear)
    {
        // Confirmación de borrado en el componente LiveWire DeleteSchoolyearForm

        return redirect()->route('schoolyears.index');
    }
}
