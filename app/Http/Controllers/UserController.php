<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Nia;
use App\Imports\UsersImport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Muestra el listado de alumnos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(numPaginate());
        // TODO 'nias' => Nia::all()

        return view('users.index', compact('users'));
    }

    /**
     * Muestra la vista para crear usuarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Guarda el nuevo usuario creado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:255',
            'role'      => 'required|in:0,1,2',
            'nia'       => 'required_if:role,2|min:7|unique:users,nia',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|string|min:8',
        ]);

        // Crea el usuario, en la tabla Usuarios, con los datos del formulario, salvo el NIA.
        $user = User::create($request->except('nia'));
        $user->save();

        $nia = '';
        // Si el usuario es 'Alumno' (role 2), guarda su NIA en la tabla 'nias'.
        if ($request->role == 2) {
            $nia = Nia::create($request->only('nia'));
            $nia->user_id = $user->id;
            $nia->save();
        }

        $request->session()->flash('flash.banner', __('The information was saved successfully.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('users.edit', $user);
        //TODO pasar nia a users.edit
    }

    /**
     * Guarda un lote de usuarios a partir de un archivo.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt,xls,xlsx,ods,gnumeric,xml',
        ]);

        $error = null;
        try {
            $file = $request->file('file');
            $import = new UsersImport();
            Excel::import($import, $file);
            // } catch (\Exception $e) {
            //     $error = $e->getMessage();
            // }
        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $failure) {
                $error .= $failure->row(); // row that went wrong
                $error .= $failure->attribute(); // either heading key (if using heading row concern) or column index
                $error .= implode(' ', $failure->errors()); // Actual error messages from Laravel validator
                $error .= implode(' ', $failure->values()); // The values of the row that has failed.
            }
        }

        if ($failures == null) {
            $text = $import->getRowCount() . __(' new user(s).');
            $type = 'success';
        } else {
            $text = $error;
            $type = 'danger';
        }
        $request->session()->now('flash.banner', $text);
        $request->session()->now('flash.bannerStyle', $type);

        $users = User::paginate(numPaginate());

        // if ($error == null) {
        return view('users.index', compact('users'));
        // } else {
        // TODO volver a la misma página y mostrar aviso
        //return back()->withInput();
        // }
    }

    /**
     * Muestra información del usuario.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Muestra la vista para editar un usuario.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Actualiza la información del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'  => 'required|max:255',
            'role'  => 'required|in:0,1,2',
            'nia'   => 'required_if:role,2|min:7|unique:users,nia,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($request->except('nia'));

        if ($request->role <> 2) {
            // $request->merge(['nia' => null]);
            // TODO borrar nia de la tabla nias
        }

        $request->session()->flash('flash.banner', __('The information was saved successfully.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('users.edit', $user);
    }

    /**
     * Cambia el password.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function passwd(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|string|confirmed|min:8'
        ]);

        $user->update(['password' => bcrypt($request->password)]);

        $request->session()->flash('flash.banner', __('The information was saved successfully.'));
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->route('users.edit', $user);
    }

    /**
     * Elimina un usuario.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Confirmación y borrado realizado en el componente LiveWire EditSchoolyearForm

        return redirect()->route('users.index');
    }
}
