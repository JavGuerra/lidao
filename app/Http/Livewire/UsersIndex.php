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
    public $sort = 'name';
    public $direction = 'ASC';
    public $perPage;
    public $role;
    public $status;
    public $section;

    public function mount()
    {
        $this->perPage = numPaginate();

        $this->sections = Section::where('schoolyear_id', activeSchoolyearId())->orderBy('stagelevel_id', 'ASC')->orderBy('name', 'ASC')->get();
    }

    public function clear()
    {
        $this->search = '';
    }

    public function restart()
    {
        $this->clear();
        $this->reset(['sort', 'direction', 'role', 'status', 'section']);
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'ASC') {
                $this->direction = 'DESC';
            } else {
                $this->direction = 'ASC';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'ASC';
        }
    }

    /**
     * Renderiza el componente.
     *
     * @return \Illuminate\View\View
     */
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
            return $q->where('name',  'LIKE', "%{$this->search}%")
                ->orWhere('email', 'LIKE', "%{$this->search}%")
                ->orWhere('nia',   'LIKE', "%{$this->search}%");
        });
        // Resultado de la búsqueda ordenado y paginado
        $this->users = $query->orderBy($this->sort, $this->direction)->paginate($this->perPage);

        $this->sections = Section::where('schoolyear_id', activeSchoolyearId())->orderBy('stagelevel_id', 'ASC')->orderBy('name', 'ASC')->get();

        // Con cada cambio, resetea la paginación para evitar errores por páginas vacías
        $this->resetPage();

        // Muestra el resultado
        return view('livewire.users-index', [
            'users' => $this->users,
            'sections' => $this->sections,
        ]);
    }
}
