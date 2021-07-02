<?php

use App\Models\User;
use App\Models\Classroom;
use App\Models\Schoolyear;

/**
 * Devuelve el nombre del usuario que conicide con el id
 *
 * @param int
 * @return string
 */
function user_name(int $id)
{
    return User::find($id)->name;
}


/**
 * Devuelve el número de clases que pertenecen a un año escolar
 *
 * @param string
 * @return int
 */
function numClassrooms(int $id)
{
    return Classroom::where('schoolyear_id', $id)->count();
}


/**
 * Devuelve true si hay un curso activo
 *
 * @return bool
 */
function isActiveSchoolyear()
{
    return (Schoolyear::where('selected', true)->count() == 0) ? false : true;
}


/**
 * Devuelve el id del curso activo.
 *
 * @return int
 */
function activeSchoolyearId()
{
    $id = 0;
    if (isActiveSchoolyear()) {
        $id = Schoolyear::where('selected', true)->firstOrFail()->id;
    }
    return $id;
}


/**
 * Devuelve el curso activo.
 *
 * @return Obj
 */
function activeSchoolyear()
{
    return Schoolyear::find(activeSchoolyearId());
}


/**
 * Devuelve el número de clases del curso.
 *
 * @return int
 */
function numClassroomsSchoolyear()
{
    $num = 0;
    if (activeSchoolyear()) {
        $num = Classroom::where('schoolyear_id', activeSchoolyearId())->count();
    }
    return $num;
}


/**
 * Devuelve los profesores disponibles.
 *
 * @return int
 */
function teachers()
{
    // TODO si están activos
    return User::where('role', 2)->where('status', true)->get();
}