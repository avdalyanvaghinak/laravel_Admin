<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function registerd()
    {
        $users = User::paginate(10);
        return view('admin.register')
            ->with('users',$users);
    }

    public function registeredit(Request $request, $id )
    {
        $users = User::findOrFail($id);
        return view('admin.register-edit')
            ->with('users',$users);
    }

    public function registerupdate(Request $request, $id)
    {
        $users = User::find($id);
        $users->name = $request->input('username');
        $users->user_type = $request->input('user_type');
        $users->update();

        return redirect('/role-register')
            ->with('status','Your Date is Updated');
    }

    public function registerdelete($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return redirect('/role-register')
            ->with('status','Your Date is Deleted');

    }
}
