<?php

namespace App\Http\Controllers;

use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('home',compact('users'));
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('show',compact('user'));
    }
    public function transfer($id)
    {
        $user = User::findOrFail($id);
        return view('transfer',compact('user'));
    }

    public function transferPost($id,Request $request)
    {
        $user1 = auth()->user();
        $user2 = User::findOrFail($id);

        $amount = $user1->current_balance;
        if($request->amount > $amount )
        {
            return redirect('dashboard')->with('error','you don\'t have enough money');
        }
        if($user1->id == $id)
        {
            return redirect('dashboard')->with('error','you can\'t send money for yourself');
        }

        $user1->update([
           'current_balance' => ($user1->current_balance)-($request->amount)
        ]);
        $user2->update([
            'current_balance' => ($user2->current_balance)+($request->amount)
        ]);

        Transfer::create([
            'sender' => $user1->name,
            'receiver' => $user2->name,
            'amount' => $request->amount,
            'created_at' => now(),
        ]);
        return redirect('dashboard')->with('success','Transfer Done');

    }
}
