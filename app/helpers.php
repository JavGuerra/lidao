<?php

/**
 * Código de ayuda disponible en toda la aplicación.
 * Se carga con composer.json
 */

use App\Models\Configuration;
use App\Models\User;
use App\Models\Section;
use App\Models\Schoolyear;
use Illuminate\Support\Carbon;


/**
 * Obtiene el número de entradas por página.
 *
 * @return int
 */
function numPaginate()
{
    return session()->get('paginate');
}


/**
 * Devuelve el valor de las configuraciones en la BBDD.
 *
 * @param string $key
 * @return string
 */
function getConfig(string $key)
{
    return Configuration::find($key)->value;
}


/**
 * Fija el valor de las configuraciones en la BBDD.
 *
 * @param string $key
 * @param string $value
 * @return void
 */
function setConfig(string $key, string $value)
{
    if (Configuration::find($key)) {
        $config = Configuration::find($key);
        $config->value = $value;
        $config->save();
    }
}


/**
 * Devuelve true si hay un curso activo.
 *
 * @return bool
 */
function thereIsAnActiveSchoolyear()
{
    return getConfig('activeSchoolyearId') != '';
}


/**
 * Devuelve true si el curso indicado está activo
 *
 * @param int $id
 * @return bool
 */
function thisSchoolyearIsActive(int $id)
{
    return getConfig('activeSchoolyearId') == $id;
}


/**
 * Activa el curso indicado mediante id.
 *
 * @param int $id
 * @return void
 */
function activateSchoolYear(int $id)
{
    setConfig('activeSchoolyearId', $id);
}


/**
 * Desactiva el curso activo
 *
 * @return void
 */
function deactivateSchoolYear()
{
    setConfig('activeSchoolyearId', '');
}


/**
 * Devuelve el id del curso activo.
 *
 * @return int
 */
function activeSchoolyearId()
{
    $id = 0;
    if (thereIsAnActiveSchoolyear()) {
        $id = getConfig('activeSchoolyearId');
    }
    return $id;
}


/**
 * Devuelve el curso activo o '' si no hay
 *
 * @return object
 */
function activeSchoolyear()
{
    $selected = '';
    if (thereIsAnActiveSchoolyear()) {
        $selected = Schoolyear::find(activeSchoolyearId());
    }
    return $selected;
}


/**
 * Devuelve el curso solicitado mediante id.
 *
 * @param int $id
 * @return object
 */
function theSchoolyear(int $id)
{
    return Schoolyear::find($id);
}


/**
 * Devuelve el número de cursos escolares
 *
 * @return int
 */
function numSchoolyears()
{
    return Schoolyear::count();
}


/**
 * Devuelve el número de secciones que pertenecen a un año escolar.
 *
 * @param int
 * @return int
 */
function numSections(int $id)
{
    return Section::where('schoolyear_id', $id)->count();
}


/**
 * Devuelve el número de secciones del curso activo.
 *
 * @return int
 */
function numSectionsActiveSchoolyear()
{
    $num = 0;
    if (thereIsAnActiveSchoolyear()) {
        $num = Section::where('schoolyear_id', activeSchoolyearId())->count();
    }
    return $num;
}


/**
 * Devuelve el año actual.
 *
 * @return int
 */
function thisYear()
{
    return Carbon::now()->format('Y');
}


/**
 * Año actual dentro del rango de fechas posibles.
 *
 * @return bool
 */
function thisYearInRange()
{
    return thisYear() <= 2154 && thisYear() >= 1901;
}


/**
 * Devuelve el año de inicio.
 * Si el año ya está en uso, busca el año siguiente disponible hasta 2155
 * Si no quedan años disponibles, el último calculado es devuelto, pero
 * la aplicación no permitirá la creación del nuevo curso escolar al existir
 * ya un curso previamente creado con el año de inicio devuelto.
 *
 * @return int
 */
function startYear()
{
    $startYear = thisYear();
    $startYear--;
    if ($startYear < 1901) {
        $startYear = 1901;
    }
    if ($startYear > 2154) {
        $startYear = 2154;
    }
    while (Schoolyear::where('start_at', $startYear)->first() != null && $startYear < 2155) {
        $startYear++;
    }
    return $startYear;
}


/**
 * Devuelve el nombre del usuario que conicide con el id
 *
 * @param int
 * @return string
 */
function userName(int $id)
{
    return User::find($id)->name;
}


/**
 * Devuelve los profesores disponibles.
 *
 * @return int
 */
function teachers()
{
    return User::where('role', 1)->where('status', true)->get();
}

/**
 * Devuelve el nombre del rol
 * 
 * @return string
 */
function userRole(int $role)
{   
    $roles =  ['Admin', 'Teacher', 'Student'];
    $role = (int) $role;
    return ($role >= 0 && $role <= 2) ? $roles[$role] : null;
}