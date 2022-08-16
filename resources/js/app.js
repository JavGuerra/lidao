import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

/** 
* Evento click de los botones.
* Agrega la clase 'dark' al elemento html.
* Guarda o elimina el modo del localStorage.
*/
document.querySelectorAll(".setMode").forEach(item =>
item.addEventListener("click", () => {
        if (localStorage.lidaoDark == 1) {
            localStorage.lidaoDark = 0;
            document.documentElement.classList.remove('dark');
        } else {
            localStorage.lidaoDark = 1;
            document.documentElement.classList.add('dark');
        }
    })
)