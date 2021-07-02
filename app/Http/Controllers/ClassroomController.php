<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * ;Muestra el listado de clases.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtiene las clases que coinciden con el id del curso activo
        $classrooms = Classroom::where('schoolyear_id', activeSchoolyearId())
            ->paginate(session()->get('paginate'));

        return view('classrooms.index', [
            'classrooms' => $classrooms,
        ]);
    }

    /**
     * Muestra el formulario para crear una clase.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classrooms.create',[
            'teachers' => teachers(),
        ]);
    }

    /**
     * Comprueba y guarda una nueva clase en la BBDD.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'section_id' => 'required|integer|min:1',
            'teacher_id' => 'integer|min:0',
        ]);

        $classroom = Classroom::create($request->all());

        $classroom->schoolyear_id = activeSchoolyearId();
        $classroom->creator_id = auth()->user()->id;

        $classroom->save();

        $request->session()->flash('flash.banner', __('The information was saved successfully.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('classrooms.index');
    }

    /**
     * Muestra la información de la clase.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        $activeSchoolyear = activeSchoolyear();
        return view('classrooms.show', [
            'classroom' => $classroom,
            'yearName' => $activeSchoolyear->name,
            'yearAnnotation' => $activeSchoolyear->annotation,
            'startYear' => $activeSchoolyear->start_at,
            'endYear' => $activeSchoolyear->end_at,
        ]);
    }

    /**
     * Muestra el formulario de edición de la clase.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', [
            'classroom' => $classroom,
        ]);
    }

    /**
     * Comprueba y actualiza la clase.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'name' => 'required|max:255',
            'section_id' => 'required|integer|min:1',
            'teacher_id' => 'integer|min:0',
        ]);

        $classroom->update($request->all());

        $request->session()->flash('flash.banner', __('The information was saved successfully.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('classrooms.edit', $classroom);
    }

    /**
     * Elimina la clase.
     *
     * @param  \App\Models\Classroom  $classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $classroom)
    {
        // Confirmación y borrado realizado en el componente LiveWire EditClassroomForm

        return redirect()->route('classrooms.index');
    }
}
