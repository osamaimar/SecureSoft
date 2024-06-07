<?php

namespace App\Imports;

use App\Models\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class CollectionImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Collection([
            'name' => $row[1],
            'image_path' => $row[2],
        ]);
    }
}
