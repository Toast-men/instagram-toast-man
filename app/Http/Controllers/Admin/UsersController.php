<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;;
use App\Models\User;

class UsersController extends Controller
{
    //

 

    public function index(){
        $all_users = User::withTrashed()->paginate(1);
        return view('admin.users.index')
        ->with('all_users', $all_users);
    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function restore($id) {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->back();
    }

    
}
