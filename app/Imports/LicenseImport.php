<?php

namespace App\Imports;

use App\Models\License;
use Maatwebsite\Excel\Concerns\ToModel;

class LicenseImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new License([
            'id' => $row[0],
            'key' => $row[1],
            'product_id' => $row[2]
        ]);
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            '0' => 'required|integer|unique:licenses,id',
            '1' => 'required|string|max:255',
            '2' => 'required|integer|exists:products,id',
        ];
    }
}
