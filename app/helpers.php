<?php

use App\Models\User;
use App\Models\Classroom;

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
function num_classrooms(int $id)
{
    return Classroom::where('id_schoolyear', $id)->count();
}
