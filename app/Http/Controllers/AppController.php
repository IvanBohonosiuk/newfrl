<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;

class AppController extends Controller
{
    public function getIndex(User $users)
    {
        $this->data['freelancers'] = $users->getOrder();

        return view('welcome', $this->data);
    }
}