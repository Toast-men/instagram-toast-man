<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class ProfileController extends Controller
{
    //
    private $user;

    public function __construct(User $user){
        $this->user = $user;
    }

    // index function
    public function show(User $user, $id){
        $user = $this->user->findOrFail($id);
        return view('users.profile.post')->with('user', $user);
    }

    // edit function
    public function edit(){
        return view('users.profile.edit');
    }

    public function update(Request $request, $id){
        $user = $this->user->findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if(!empty($request->image)){
            $user->avatar =  'data:image/'.$request->image->extension().';base64,'.base64_encode(file_get_contents($request->image));
        }
        $user->introduction = $request->introduction;

        $user->save();

        return redirect()->route('  ', $user);


    }
    public function followers($id){
        $user = $this->user->findORFail($id);


        return view('users.profile.follower')->with('user', $user);
    }

    public function followings($id){
        $user = $this->user->findORFail($id);


        return view('users.profile.following')->with('user', $user);
    }

    

}
// 
