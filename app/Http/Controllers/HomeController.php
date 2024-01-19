<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::check()){

            $statuses = Status::notReply()->where(function ($query) {
                return $query->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id',Auth::user()->friends()->pluck('id')->toArray());
            })->orderBy('created_at','desc')->paginate(10);


            return view('timeLine.index')->with('statuses', $statuses);
        }
        return view('home');
    }
}
