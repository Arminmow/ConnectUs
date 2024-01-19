<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends \App\Http\Controllers\Controller
{

    public function getProfile($username)
    {
        $user = User::where('username', $username)->first();

        if (!$user){
            abort(404);
        }

        $statuses = $user->statuses()->notReply()->get();


        return view('profile.index')
            ->with('user', $user)
            ->with('statuses' , $statuses)
            ->with('authUserIsFriend' , AUth::user()->isFriendWith($user) );
    }

    public function getEdit()
    {
        return view('profile.edit');
    }

    /**
     * @throws ValidationException
     */
    public function postEdit(Request $request)
    {
        $this->validate($request,[
            'first_name' => 'nullable|alpha|max:50',
            'last_name' => 'nullable|alpha|max:50',
            'location' => 'nullable|max:20'
        ]);

        Auth::user()->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'location' => $request->input('location'),
        ]);

        return redirect()->route('profile.edit')->with('info', 'Your profile has been updated');

    }

}
