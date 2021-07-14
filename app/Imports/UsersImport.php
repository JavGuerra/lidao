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
            'name' => $row['nombre'],
            'email' => $row['email'],
            'password' => bcrypt($row['password']),
            'role' => ($row['rol'] == 'profesor') ? 2 : 0,
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'rol' => 'nullable|in:profesor,alumno',
        ];
    }
 
    public function getRowCount(): int
    {
        return $this->numRows;
    }
}
