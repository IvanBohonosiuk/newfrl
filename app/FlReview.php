<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FlReview extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function getOrder()
    {
        return $this->order()
            ->get();
    }

    public function scopeOrder($query)
    {
        $query->orderBy('created_at', 'desc');
    }
}
