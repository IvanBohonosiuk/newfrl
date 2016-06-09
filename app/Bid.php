<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{

	public function project()
	{
		return $this->BelongsTo('App\Projects');
	}

	public function user()
	{
		return $this->BelongsTo('App\User');
	}

	public function getById($id)
	{
		return $this->id($id)
			->firstOrFail();
	}

	public function getOrder()
	{
		return $this->order()
			->get();
	}

	public function scopeId($query, $id)
    {
        $query->where(['id'=>$id]);
    }

    public function scopeOrder($query)
    {
    	$query->orderBy('created_at', 'desc');
    }

}
