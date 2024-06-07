<?php

namespace App\Exports;

use App\Models\Purchase_History;
use Maatwebsite\Excel\Concerns\FromCollection;

class PurchaseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Purchase_History::all();
    }
}
