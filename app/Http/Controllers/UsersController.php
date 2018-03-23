<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Laracasts\Flash\Flash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::orderBy('id', 'ASC')->paginate(5);

        return view('admin.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'name'      => 'min:4|max:120|required',
            'email'     => 'min:4|max:250|required|unique:users',
            'password'  => 'min:4|max:20|required'
        ]);

        $user = new User($request->all());
        $user->password = bcrypt($request->password);
        $user->save();

        flash("Se ha registrado el usuario " . $user->name . " de manera satisfactoria.")->success();
        
        return redirect()->route('users.index');
    }

    /**
     * Show the form for editing the specified resource
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = User::find($id);

        return view('admin.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $user = User::find($id);

        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->type = $request->type;

        // Mejor opción
        $user->fill($request->all());

        $user->save();

        flash("El usuario " . $user->name . " se ha editado de manera satisfactoria.")->warning();

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $user = User::find($id);
        $user->delete();

        flash("El usuario " . $user->name . " se ha eliminado de manera satisfactoria.")->warning();

        return redirect()->route('users.index');
    }
}
