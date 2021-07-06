<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schoolyear;

class SchoolyearController extends Controller
{
    /**
     * Muestra el listado de cursos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolyears = Schoolyear::orderBy('end_at', 'DESC')->paginate(session()->get('paginate'));

        $selected = activeSchoolyear();

        return view('schoolyears.index', [
            'schoolyears' => $schoolyears,
            'selected' => $selected,
        ]);
    }

    /**
     * Muestra el formulario para crear un curso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('schoolyears.create');
    }

    /**
     * Comprueba y guarda un nuevo curso en la BBDD.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255|unique:schoolyears,name',
            'start_at' => 'required|digits:4|integer|min:'.startYear().'|max:2154|unique:schoolyears,start_at',
            // calculado 'end_at' => 'required|digits:4|integer|min:1901|max:2155|gte:start_at',
        ]);

        // Se guarda el request y el valor de end_at calculado en el registro
        $schoolyear = Schoolyear::create($request->all() + ['end_at' => $request->start_at + 1]);

        $schoolyear->creator_id = auth()->user()->id;

        // Si no hay cursos activos o es el primer curso, se activa.
        if (!thereIsAnActiveSchoolyear()) {
            // El curso activo es el nuevo curso creado.
            activateSchoolYear($schoolyear->id);
        }

        $schoolyear->save();

        $request->session()->flash('flash.banner', __('The information was saved successfully.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('schoolyears.index');
    }

    /**
     * Muestra la información del curso.
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
     * Muestra el formulario de edición del curso.
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
     * Comprueba y actualiza el curso.
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
            'start_at' => 'digits:4|integer|min:1901|max:2154|unique:schoolyears,start_at,' . $schoolyear->id,
            // calculado 'end_at' => 'required|digits:4|integer|min:1901|max:2155|gte:start_at',
        ]);

        $schoolyear->update($request->all() + ['end_at' => $request->start_at + 1]);

        $request->session()->flash('flash.banner', __('The information was saved successfully.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('schoolyears.edit', $schoolyear);
    }

    /**
     * Elimina el curso escolar.
     *
     * @param  \App\Models\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function destroy(Schoolyear $schoolyear)
    {
        // Confirmación y borrado realizado en el componente LiveWire EditSchoolyearForm

        return redirect()->route('schoolyears.index');
    }
}
