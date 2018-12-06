<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'administrarions_id',
    ];
    
}
