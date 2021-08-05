<?php

namespace App\Imports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{
    private $numRows = 0;
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        ++$this->numRows;

        return new User([
            'nia' => $row['nia'],
            'name' => $row['nombre'],
            'email' => $row['correo'],
            'password' => bcrypt($row['clave']),
            'role' => ($row['rol'] == 'profesor') ? 1 : 2,
        ]);
    }

    public function rules(): array
    {
        return [
            'nia' => 'nullable|min:7|unique:users,nia',
            'nombre' => 'required|max:255',
            'correo' => 'required|email|unique:users,email',
            'clave' => 'required|string|min:8',
            'rol' => 'nullable|in:profesor,alumno',
        ];
    }
 
    public function getRowCount(): int
    {
        return $this->numRows;
    }
}
