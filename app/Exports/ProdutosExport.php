<?php

namespace App\Exports;

use App\Models\Produtos;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProdutosExport implements FromCollection, WithHeadings
{
    public function headings():array
    {
        return[
        'id',
        'codigo',
        'nome',
        'descricao',
        'preco',
        'desconto',
        'preco_com_desconto',
        'qt',
        'active',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produtos::select('id','codigo','nome','descricao','preco','desconto','preco_com_desconto','qt','active')->get();
    }
}
