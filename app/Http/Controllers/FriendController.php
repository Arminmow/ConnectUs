<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
class FriendController extends Controller
{

    public function getIndex()
    {
        $friends = Auth::user()->friends();
        return view('friends.index')->with('friends', $friends);
    }

}
