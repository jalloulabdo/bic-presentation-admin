<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataActive extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'target', 
        'reale',
        'nb_activation',
        'build_up',
        'date',
        'id_vendeur',
        'id_category',
    ];
}
