<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role:superAdmin');
    }
    public function usuarios(){

        //dd(DB::connection('sqlite')->select('select * from logs'));
        //$users = DB::connection('pgsql')->select('select * from administrations where unregistered_payment = true order by id');

        $user1 = DB::connection('sqlite')->select('select * from users');


        $users = [];

        foreach ($user1 as $user) {
            $users[] = (array)$user;
        }

        return view('users')->with('users', $users);
    }

    public function roles($id){
        $user = User::find($id);

        $roles = Role::all();
        $rest = [];
        foreach ($roles as $role){
          if (!$user->hasRole($role->name)){
              $rest[] = $role;
          }
        }

        $data = [
            'user' => $user,
            'rest' => $rest
        ];
        return view('asignRole')->with('data', $data);

    }
    public  function asignRoles($id, $idRol){

        DB::connection('sqlite')->insert('insert into role_user (user_id, role_id) VALUES ('. $id . ',' . $idRol . ')');

        return redirect('/roles/' . $id);
    }

    public function createRol(){
        return view('createRol');
    }

    public function storeRol(Request $request){

        DB::connection('sqlite')->insert('insert into roles (name) VALUES ("'. $request->input('rol') . '")');

        return redirect('/usuarios');
    }

}
