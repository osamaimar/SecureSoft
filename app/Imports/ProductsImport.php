<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'name' => $row[1],
            'duration_value' => $row[2],
            'duration_time_unit' => $row[3],
            'no_of_devices' => $row[4],
            'cost' => $row[5],
            'min_partner_price' => $row[6],
            'end_user_price' => $row[7],
            'warranty' => $row[8],
            'description' => $row[9],
            'default_image' => $row[10],
            'status' => $row[11],
            'collection_id' => $row[12],
            'supplier_id' => $row[13],
        ]);
    }
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            '1' => 'required|string|max:255',
            '2' => 'required|integer|min:1',
            '3' => 'required|string|in:days,weeks,months,years',
            '4' => 'required|integer|min:1',
            '5' => 'required|numeric|min:0',
            '6' => 'required|numeric|min:0',
            '7' => 'required|numeric|min:0',
            '8' => 'nullable|integer|min:0',
            '9' => 'nullable|string',
            '10' => 'nullable|string|max:255',
            '11' => 'required|boolean',
            '12' => 'required|integer|exists:collections,id',
            '13' => 'required|integer|exists:suppliers,id',
        ];
    }
}
