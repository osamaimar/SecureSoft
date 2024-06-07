<?php

namespace App\Exports;

use App\Models\License;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class LicenseExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return DB::table('licenses')
            ->join('products', 'licenses.product_id', '=', 'products.id')
            ->select('licenses.id as license_id', 'licenses.key as license_key', 'products.name as product_name')
            ->get();
    }
    public function headings(): array
    {
        return [
            'License ID',
            'License Key',
            'Product Name',
        ];
    }
}
