<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Section;

class UsersIndex extends Component
{
    use WithPagination;

    protected $queryString = [
        'page' => ['except' => ''],
        'perPage',
        'search' => ['except' => ''],
        'role' => ['except' => ''],
        'status' => ['except' => ''],
    ];

    protected $sections;

    public $search = '';
    public $perPage;
    public $role;
    public $status;
    public $section;

    public function mount()
    {
        $this->perPage = numPaginate();

        $this->sections = Section::where('schoolyear_id', activeSchoolyearId())->orderBy('stagelevel_id', 'ASC')->orderBy('name', 'ASC')->get();
    }

    public function page1()
    {
        $this->page = 1;
    }

    public function clear()
    {
        $this->search = '';
        $this->page1();
    }

    public function restart()
    {
        $this->role = '';
        $this->status = '';
        $this->section = '';
        $this->clear();
    }

    public function render()
    {
        // Abre la consulta sobre usuarios
        $query = User::query();
        // Consulta para rol si rol está seleccionado
        $query->when($this->role != '', function ($q) {
            return $q->where('role', $this->role);
        });
        // Consulta para status si status está seleccionado
        $query->when($this->status != '', function ($q) {
            return $q->where('status', $this->status);
        });
        // Subconsulta para búsqueda de texto
        $query->where(function ($q) {
            return $q->where ('name',  'LIKE', "%{$this->search}%")
                    ->orWhere('email', 'LIKE', "%{$this->search}%")
                    ->orWhere('nia',   'LIKE', "%{$this->search}%");
        });
        // Resultado de la búsqueda ordenado y paginado
        $this->users = $query->orderBy('name', 'ASC')->paginate($this->perPage);

        $this->sections = Section::where('schoolyear_id', activeSchoolyearId())->orderBy('stagelevel_id', 'ASC')->orderBy('name', 'ASC')->get();

        // Con cada cambio, lleva a la págian 1 para evitar mostrar páginas vacías
        $this->page1();

        // Muestra el resultado
        return view('livewire.users-index', [
            'users' => $this->users,
            'sections' => $this->sections,
        ]);
    }
}
