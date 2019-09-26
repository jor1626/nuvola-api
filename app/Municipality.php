<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipality extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'departament_id', 'name'
    ];

    public function departament(){
        return $this->belongsTo(Departament::class);
    }
}
