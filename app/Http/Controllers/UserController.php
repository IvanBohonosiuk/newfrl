<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Image;

class UserController extends Controller
{
    public function getDashboard(User $user)
    {
    	$this->data['user'] = $user->firstOrFail();
    	return view('users.dashboard', $this->data);
    }

    public function saveDashboard(Request $request)
    {
    	if ($request->hasFile('image')) {
    		$image = $request->file('image');
    		$filename = time() . '-' . Auth::user()->first_name . '-' . Auth::user()->last_name . '.' . $image->getClientOriginalExtension();
    		Image::make($image)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

    		$user = Auth::user();
    		$user->first_name = $request['first_name'];
    		$user->last_name = $request['last_name'];
    		$user->image = $filename;
    		$user->save();

    		return redirect()->back();
    	} else {
    		$user = Auth::user();
    		$user->first_name = $request['first_name'];
    		$user->last_name = $request['last_name'];
    		$user->save();

    		return redirect()->back();
    	}


    }
}
