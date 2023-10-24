<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutosDetalhes extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'destaque',
        'composicao',
        'indicado',
        'funcionamento',
        'contraindicacoes',
        'como_usar',
        'altura',
        'largura',
        'comprimento',
        'peso',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'updated_at' => 'datetime',
    ];

    public function Produtos_detalhes()
    {
        return $this->belongsTo(ProdutosDetalhes::class);
    }
}

