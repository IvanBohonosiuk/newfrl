<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Image;
use App\Portfolio;
use App\Project_cat;

class UserController extends Controller
{
    public function getDashboard()
    {
    	$this->data['user'] = Auth::user();
    	return view('users.dashboard', $this->data);
    }

    public function saveBasicProfile(Request $request)
    {

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

		$user = Auth::user();
	
    	$user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->birthday = $request['birthday'];
		$user->resume = $request['resume'];
		$user->save();

	   return redirect()->back();
    }

    public function saveImageProfile(Request $request)
    {
        $image = $request->file('image');
        $filename = time() . '-' . Auth::user()->first_name . '-' . Auth::user()->last_name . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );

        $user = Auth::user();
        $user->image = $filename;
        $user->save();

        return redirect()->back();
    }

    public function saveContactsProfile(Request $request)
    {

        $this->validate($request, [
            'email' => 'required'
        ]);

        $user = Auth::user();
        $user->phone = $request['phone'];
        $user->email = $request['email'];
        $user->save();

       return redirect()->back();
    }

    public function savePayProfile(Request $request)
    {
        $user = Auth::user();
        $user->pay_card_pb = $request['pay_card_pb'];
        $user->pay_card_2 = $request['pay_card_2'];
        $user->save();

       return redirect()->back();
    }

    public function getUser($id, User $user)
    {
        $this->data['user'] = $user->getById($id);
        return view('users.single_user', $this->data);
    }

    public function getFreelancers(User $user, Project_cat $cats)
    {
        $this->data['users'] = $user->getOrder();
        $this->data['cats'] = $cats->getActive();
        return view('users.freelancers', $this->data);
    }

    public function getCustomers(User $user)
    {
        $this->data['users'] = $user->getOrder();
        return view('users.customers', $this->data);
    }

    public function getFormPortfolio()
    {
        return view('users.add_portfolio');
    }

    public function savePortfolio(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required|max:5000'
        ]);

        $image = '';

        if ($request['url']) {
            $site_url = $request['url'];
        } else {
            $site_url = 'http://organaizer.com.ua/';
        }

        if ($request->file('image')) {
            $image = $request->file('image');
            $filename = time() . '-' . Auth::user()->first_name . '-' . Auth::user()->last_name . '-' . str_slug($site_url) . '.' . $image->getClientOriginalExtension();
            $img = Image::make($image);
            $img->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            });
            $img->save( public_path('/uploads/portfolio/full/' . $filename ) );
            $img2 = Image::make($image);
            $img2->save( public_path('/uploads/portfolio/originals/' . $filename ) );
        }

        $urls = $request['url'];
        if(stristr($urls, 'http://') === FALSE) {
            $urls = 'http://' . $urls;
        }

        $portfolio = new Portfolio;

        $portfolio->name = $request['name'];
        $portfolio->url = $urls;
        $portfolio->price = $request['price'];
        if ($request->file('image')) {
            $portfolio->image = $filename;
        }
        $portfolio->description = $request['description'];

        if ($request->user()->portfolios()->save($portfolio)) {
            $message = 'Проект опубликован успешно!';
        } else {
            $message = 'Произошла ошыбка!';
        }

        return redirect()->back()->with(['message' => $message]);
    }
}
