<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use App\Bid;

class BidsController extends Controller
{
    public function postCreateBid(Request $request)
    {

    	$this->validate($request, [
    		'price' => 'required',
    		'termin' => 'required',
    		'description' => 'required|max:1000'
    	]);

    	$bid = new Bid();

    	$bid->price = $request['price'];
    	$bid->termin = $request['termin'];
    	$bid->description = $request['description'];
    	if (isset($request['private'])) {
    		$bid->private = $request['private'];
    	}
    	$bid->project_id = $request['project_id'];

    	if ($request->user()->bids()->save($bid)) {
    		$message = 'Ставку отправлено успешно!';
    	} else {
    		$message = 'Произошла ошыбка!';
    	}

    	return redirect()->back()->with(['message' => $message]);
    }

    public function getDeleteBid($bid_id)
    {
    	$bid = Bid::where('id', $bid_id)->first();
    	if (Auth::user() != $bid->user) {
    		return redirect()->back()->with(['message' => 'Недостаточно прав.']);
    	}
    	$bid->delete();
    	return redirect()->back()->with(['message' => 'Ставка удалена.']);
    }
}
