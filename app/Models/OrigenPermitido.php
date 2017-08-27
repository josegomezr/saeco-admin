<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrigenPermitido extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'lista_blanca_acceso';

    protected $fillable = [
        'token', 'activo',
    ];
}
