<?php

namespace App\Imports;

use App\Models\CampaignHero;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Validators\Failure;

class CampaignsHeroesImport implements ToModel, WithValidation, SkipsOnFailure
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new CampaignHero([
            'campaign_id' => $row[0],
            'hero_id' => $row[1],
            'optional' => $row[2]
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
