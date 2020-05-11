<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserCourse;
use Hash;
use DB;

class UserController extends Controller
{
    public function index(Request $request){
        $role = $request->route()->getAction('role');
        $users = User::where('role', $role)->get();
        $data['users'] = $users;
        $data['role'] = $role;
        return view('back-end.users.index', $data);
    }

    public function edit($id){
        $user = User::find($id)->toArray();
        return view('back-end.users.edit', ['user'=>$user]);
    }

    public function store(Request $request){
        $post = $request->all();
        $post['password'] = Hash::make($post['password']);
        unset($post['_token']);
        
        DB::beginTransaction();
        $save = User::create($post);

        if($save){
            DB::commit();
            switch($save->role){
                case 'admin' : $url = 'be/user/admin'; break;
                case 'mentor' : $url = 'be/user/mentor'; break;
                case 'trainee' : $url = 'be/user/trainee'; break;
                default : $url = 'be/user/admin'; break;
            }
            return redirect($url)->with('success', 'User successfully created.');
        }
        DB::rollback();
        return back()->with('error', 'User failed to create.');
        
    }

    public function update(Request $request, $id){
        $post = $request->all();
        unset($post['_token']);
        unset($post['_method']);

        if(!isset($post['password'])){
            unset($post['password']);
        }else{
            $post['password'] = Hash::make($post['password']);
        }

        DB::beginTransaction();
        $update = User::find($id)->update($post);

        if($update){
            DB::commit();
            switch($post['role']){
                case 'admin' : $url = 'be/user/admin'; break;
                case 'mentor' : $url = 'be/user/mentor'; break;
                case 'trainee' : $url = 'be/user/trainee'; break;
                default : $url = 'be/user/admin'; break;
            }
            return redirect($url)->with('success', 'User successfully updated.');
        }
        DB::rollback();
        return back()->with('error', 'User failed to update.');
        
    }

    public function delete($id){
        User::find($id)->delete();
        return back()->with('success', 'User successfully deleted');
    }
}
