<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    public function user()
    {
    	return $this->BelongsTo('App\User');
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
