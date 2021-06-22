<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Schoolyear;
use App\Models\User;

class SchoolyearController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('schoolyears.index', [
            'schoolyears' => Schoolyear::orderBy('name', 'ASC')->paginate(5),
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
            'name' => 'required|unique:schoolyears|max:255',
            'startDate' => 'nullable|date',
            'endDate' => 'nullable|date'
        ]);

        $Schoolyear = Schoolyear::create( $request->toArray() );
        $Schoolyear->id_creator = auth()->user()->id;
        $Schoolyear->save();

        $request->session()->flash('flash.banner', __('The information was saved successfully.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('schoolyears.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function show(SchoolYear $schoolyear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function edit(SchoolYear $schoolyear)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchoolYear $schoolyear)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Schoolyear  $schoolyear
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchoolYear $schoolyear)
    {
        //
    }
}
