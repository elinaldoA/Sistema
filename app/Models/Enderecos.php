<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enderecos extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rua','numero','complemento','cep','bairro','cidade','estado','pais','empresa_id','cliente_id'
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

    public function Enderecos()
    {
        return $this->hasOne('App\Models\Enderecos', 'cliente_id');
    }
    public function Empresas()
    {
        return $this->hasOne('App\Models\Empresas');
    }
    public function Clientes()
    {
        return $this->hasOne('App\Models\Clientes');
    }
}

