<?php

namespace App\Exports;

use App\Models\Clientes;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ClientesExport implements FromCollection, WithHeadings
{
    public function headings(): array
    {
        return [
            'active',
            'name',
            'email',
            'cpf',
        ];
    }
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Clientes::select('active','name','email','cpf')->get();
    }
}
