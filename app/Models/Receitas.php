<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receitas extends Model
{
    use HasFactory;
    protected $table = 'receitas';

    protected $fillable = [
        'descricao',
        'valor',
        'data',
    ];

    public function getDescriptionAttribute()
    {
        return $this->descricao;
    }

    public function getValueAttribute()
    {
        return $this->valor;
    }

    public function getDateAttribute()
    {
        return $this->data;
    }
}
