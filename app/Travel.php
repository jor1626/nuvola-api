<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Travel extends Model
{
    /**
     * With default model.
     *
     * @var array
     */
    protected $with = [
        'country', 'municipality'
    ];

   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'date_travel', 'country_id', 'municipality_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }

    public function municipality(){
        return $this->belongsTo(Municipality::class);
    }
}
