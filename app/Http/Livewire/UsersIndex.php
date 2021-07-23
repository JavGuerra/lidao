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
        'search' => ['except' => ''],
        'perPage'
    ];

    // private $users;
    private $sections;

    public $search = '';
    public $perPage;
    public $role = '2';
    public $section;


    public function mount()
    {
        $this->perPage = numPaginate();

        $this->sections = Section::where('schoolyear_id', activeSchoolyearId())->orderBy('stagelevel_id', 'ASC')->orderBy('name', 'ASC');

        //$this->searching();
    }

    public function clear()
    {
        $this->search = '';
        $this->page = 1;

        //$this->searching();
    }

    public function page1()
    {
        $this->page = 1;

        //$this->searching();
    }


    // public function searching() {
    //     $this->users = User::where('name', 'LIKE', "%{$this->search}%")
    //     ->orWhere('email', 'LIKE', "%{$this->search}%")
    //     ->orWhere('nia', 'LIKE', "%{$this->search}%")
    //     ->orderBy('name', 'ASC');

    //     if ($this->role !== '') {
    //         $this->users = $this->users->where('role', $this->role);
    //     }

    //     $this->users = $this->users->paginate($this->perPage);
    // }

    public function render()
    {
        return view('livewire.users-index', [
            'users' => User::where('role', strval($this->role))
            ->where('name', 'LIKE', "%{$this->search}%")
            ->orWhere('email', 'LIKE', "%{$this->search}%")
            ->orWhere('nia', 'LIKE', "%{$this->search}%")
            ->orderBy('name', 'ASC')->paginate($this->perPage),
            'sections' => $this->sections,
        ]);
    }
}
