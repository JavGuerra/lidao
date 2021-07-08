<?php

namespace App\Http\Controllers;

use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Muestra el listado de secciones.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtiene las secciones que coinciden con el id del curso activo, si lo hay
        $sections = Section::where('schoolyear_id', activeSchoolyearId())
            ->orderBy('stagelevel_id', 'ASC')->paginate(numPaginate());

        return view('sections.index', [
            'sections' => $sections,
        ]);
    }

    /**
     * Muestra el formulario para crear una sección.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (thereIsAnActiveSchoolyear()) {
            return view('sections.create');
        } else {
            abort(404);
        }
    }

    /**
     * Comprueba y guarda una nueva sección en la BBDD.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (thereIsAnActiveSchoolyear()) {
            $request->validate([
                'name' => 'required|max:255',
                'stagelevel_id' => 'required|in:1,2'
            ]);

            $section = Section::create($request->all());

            $section->schoolyear_id = activeSchoolyearId();
            $section->creator_id = auth()->user()->id;

            $section->save();

            $request->session()->flash('flash.banner', __('The information was saved successfully.'));
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect()->route('sections.index');
        } else {
            abort(404);
        }
    }

    /**
     * Muestra la información de la sección.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
        if (thereIsAnActiveSchoolyear() && $section->schoolyear_id == activeSchoolyearId()) {
            $activeSchoolyear = activeSchoolyear();
            return view('sections.show', [
                'section' => $section,
                'yearName' => $activeSchoolyear->name,
                'yearAnnotation' => $activeSchoolyear->annotation,
                'startYear' => $activeSchoolyear->start_at,
                'endYear' => $activeSchoolyear->end_at,
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Muestra el formulario de edición de la sección.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        if (thereIsAnActiveSchoolyear() && $section->schoolyear_id == activeSchoolyearId()) {
            return view('sections.edit', [
                'section' => $section,
            ]);
        } else {
            abort(404);
        }
    }

    /**
     * Comprueba y actualiza la sección.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Section $section)
    {
        if (thereIsAnActiveSchoolyear() && $section->schoolyear_id == activeSchoolyearId()) {
            $request->validate([
                'name' => 'required|max:255',
                'stagelevel_id' => 'required|in:1,2',
            ]);

            $section->update($request->all());

            $request->session()->flash('flash.banner', __('The information was saved successfully.'));
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect()->route('sections.edit', $section);
        } else {
            abort(404);
        }
    }

    /**
     * Elimina la sección.
     *
     * @param  \App\Models\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        // Confirmación y borrado realizado en el componente LiveWire EditSectionForm

        return redirect()->route('sections.index');
    }
}
