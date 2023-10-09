<?php

namespace App\Exports;

use App\Models\Produtos;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProdutosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Produtos::all();
    }
}
