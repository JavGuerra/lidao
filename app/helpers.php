<?php

/**
 * Código de ayuda disponible en toda la aplicación
 * Se carga con composer.json
 */

use App\Models\Configuration;
use App\Models\User;
use App\Models\Section;
use App\Models\Schoolyear;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Carbon;

/**
 * Obtiene el idioma en el registro de usuario.
 *
 * @return string
 */
function getLang()
{
    return App::getLocale();;
}

/**
 * Cambia el idioma en el registro de usuario.
 *
 * @param string $key
 * @return void
 */
function setLang(string $lang)
{
    $user = User::find(auth()->user()->id);
    $user->locale = $lang;
    $user->save();
    App::setlocale($lang);
    session()->put('locale', $lang);
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
    $config = Configuration::find($key);
    $config->value = $value;
    $config->save();
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
 * Devuelve true si hay un curso activo
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
 * Activa el curso indicado mediante id
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
 * Devuelve el curso solicitado mediante id
 *
 * @param int $id
 * @return object
 */
function theSchoolyear(int $id)
{
    return Schoolyear::find($id);
}

/**
 * Devuelve el número de clases que pertenecen a un año escolar
 *
 * @param int
 * @return int
 */
function numSections(int $id)
{
    return Section::where('schoolyear_id', $id)->count();
}


/**
 * Devuelve el número de clases del curso activo.
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
 * Devuelve el año de inicio.
 *
 * @return int
 */
function startYear()
{
    $startYear = Carbon::now()->format('Y');
    $startYear--;
    if ($startYear < 1901) {$startYear = 1901;}
    if ($startYear > 2154) {$startYear = 2154;}
    return $startYear;
}



/**
 * Devuelve los profesores disponibles.
 *
 * @return int
 */
function teachers()
{
    return User::where('role', 2)->where('status', true)->get();
}
