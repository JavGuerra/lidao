<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogSuccessfulLogin
{
    /**
     * Crea el detector de eventos.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Maneja el evento.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // Guarda los datos de inicio de sesión del usuario
        $event->user->update([
            'last_login_at' => now(),
            'last_login_ip' => request()->getClientIp()
        ]);

        // Pone el idioma del usuario en 'locale'
        $locale = $event->user->locale;
        session()->put('locale', $locale);

        // Pone el numero de registros por defecto para la paginación
        session()->put('paginate', 5);
    }
}
