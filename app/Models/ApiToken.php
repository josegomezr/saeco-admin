<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApiToken extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'tokens_api';
    
    protected $fillable = [
        'token', 'activo',
    ];
}
