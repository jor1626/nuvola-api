<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'country_id', 'name'
    ];

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function municipalities(){
        return $this->hasMany(Municipality::class);
    }
}
