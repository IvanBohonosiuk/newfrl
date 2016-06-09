<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project_cat extends Model
{

	protected $table = 'project_cats';

    public function project()
    {
    	return $this->hasMany('App\Projects');
    }

    public function getActive()
    {
    	return $this->published()->get();
    }

    public function scopePublished($query)
    {
    	$query->where(['active'=>1]);
    }

    public function getBySlug($slug)
    {
        return $this->slug($slug)
            ->firstOrFail();
    }

    public function scopeSlug($query, $slug)
    {
        $query->where(['slug'=>$slug]);
    }
}
