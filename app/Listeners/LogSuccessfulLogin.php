<?php

namespace App\Listeners;

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
        // Si el usuario no está activo, lo saca y pone error
        $status = $event->user->status;
        if ($status == false) {
        session()->flush();
        return redirect()->guest('login')->with('status', __('Your account is not active.'));
        };

        // Guarda los datos de inicio de sesión del usuario
        $event->user->update([
            'last_login_at' => now(),
            'last_login_ip' => request()->getClientIp()
        ]);

        // Pone el idioma del usuario en 'locale'
        $locale = $event->user->locale;
        session()->put('locale', $locale);

        // Pone el numero de registros por defecto para la paginación
        session()->put('paginate', getConfig('paginate'));
    }
}
