<?php

namespace App\Imports;

use App\Models\Campaign;
use Maatwebsite\Excel\Concerns\ToModel;

class CampaignsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Campaign([
            'id' => $row[0],
            'name' => $row[1]
        ]);
    }
}
