<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\estado;
use App\Models\rol;

class UserController extends Controller
{
    public function index()
    {
        $users = user::orderBy('id', 'Asc')
            ->paginate(10);
        return view('user.index')->with(compact('users'));
    }
    public function create()
    {
        $estados = estado::pluck('nombre', 'id');
        $rols = rol::pluck('nombre','id');
        return view('user.create')->with(compact('estados','rols'));
    }
    public function save(Request $request)
    {
        $user = new user();

        $user->estado_id = $request->estado;
        $user->rol_id    = $request->rol;
        $user->name      = $request->nombre;
        $user->email     = $request->email;
        $user->password = bcrypt($request->password);
        $user->nivel1    = $request->nivel1;
        $user->nivel2    = $request->nivel2;
        $user->nivel3    = $request->nivel3;
        $user->nivel4    = $request->nivel4;
        $user->nivel5    = $request->nivel5;
        $user->nivel6    = $request->nivel6;
        $user->nivel7    = $request->nivel7;
        $user->nivel8    = $request->nivel8;
        $user->nivel9    = $request->nivel9;

        $user->save();
        return redirect('user');
    }
    public function edit($id)
    {
        $user = user::find($id);
        $estados = estado::pluck('nombre', 'id');
        $rols = rol::pluck('nombre','id');

        return view('user.edit')->with(compact('user', 'estados', 'rols'));
    }
    public function update(Request $request, $id)
    {
        $user = user::find($id);

        $user->estado_id = $request->estado;
        $user->rol_id    = $request->rol;
        $user->name      = $request->nombre;
        $user->email     = $request->email;
        $user->password = bcrypt($request->password);
        $user->nivel1    = $request->nivel1;
        $user->nivel2    = $request->nivel2;
        $user->nivel3    = $request->nivel3;
        $user->nivel4    = $request->nivel4;
        $user->nivel5    = $request->nivel5;
        $user->nivel6    = $request->nivel6;
        $user->nivel7    = $request->nivel7;
        $user->nivel8    = $request->nivel8;
        $user->nivel9    = $request->nivel9;

        $user->save();
        return redirect('user');
    }
    public function delete($id)
    {
        $user = user::find($id);
        $user->delete();

        return redirect('user');
    }
}