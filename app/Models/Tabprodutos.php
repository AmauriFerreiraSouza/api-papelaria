<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabprodutos extends Model
{

    protected $fillable = [
        'Codigo',
        'CodProFor'
    ];

    use HasFactory;

    public $timestamps = false;
}
