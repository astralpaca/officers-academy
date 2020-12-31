<?php

namespace App\Imports;

use App\Models\Hero;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\Failure;

class HeroesImport implements ToModel, WithValidation, SkipsOnFailure
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Hero([
            'id' => $row[0],
            'firstname' => $row[1],
            'surname' => $row[2]
        ]);
    }

    public function rules(): array
    {
        return [
        '0' => 'required', //this way the data import ignores empty rows
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        //this way the data import ignores empty rows
    }
}
