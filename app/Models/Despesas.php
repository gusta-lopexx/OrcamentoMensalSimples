<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Despesas extends Model
{
    use HasFactory;
    protected $table = 'despesas';

    protected $fillable = [
        'descricao',
        'valor',
        'data',
        'paga',
    ];

    protected $casts = [
        'valor' => 'decimal:2',
        'data' => 'date',
        'paga' => 'boolean',
    ];

    public function getDescricaoAttribute($value)
    {
        return ucfirst($value);
    }
}
