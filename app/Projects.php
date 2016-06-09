<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{

    protected $table = 'projects';

	public function categories()
    {
    	return $this->belongsToMany('App\Project_cat');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }

    public function getActive()
    {
    	return $this->published()->get();
    }

    public function getById($id)
    {
        return $this->id($id)
            ->firstOrFail();
    }
    
    public function scopePublished($query)
    {
    	$query->where(['active'=>1]);
    }

    public function scopeId($query, $id)
    {
        $query->where(['id'=>$id]);
    }
}
