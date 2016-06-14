<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public function roles()
    {
        return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');
    }

    public function projects()
    {
        return $this->hasMany('App\Projects');
    }

    public function bids()
    {
        return $this->hasMany('App\Bid');
    }

    public function portfolios()
    {
        return $this->hasMany('App\Portfolio');
    }

    public function categories()
    {
        return $this->belongsToMany('App\Project_cat');
    }
    
    public function hasAnyRole($roles)
    {
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {
            if ($this->hasRole($roles)) {
                return true;
            }
        }
        return false;
    }
    
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
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
