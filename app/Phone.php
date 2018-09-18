<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{   
    protected $fillable = [
        'phone',
    ];
    protected $primaryKey = 'id';
    protected $table = 'phones';

    public function contact(){
        return $this->belongsTo('App\Contact');
    }
}
