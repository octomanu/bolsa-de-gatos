<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use Notifiable;
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'administrarions_id', 'created_at', 'updated_at',
    ];
    
}
