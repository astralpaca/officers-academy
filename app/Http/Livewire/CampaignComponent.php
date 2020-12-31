<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use Livewire\Component;

class CampaignComponent extends Component
{
    public $campaigns;
    public $selected;

    public $heroes;

    public function mount(){
        $this->campaigns = Campaign::all();
    }

    public function select($id){

        if($this->selected != $id){
            $this->selected = $id;
            $campaign = Campaign::where('id', $id)->first();
            $this->heroes = $campaign->heroes()->get();
        }

    }

    public function render()
    {
        return view('livewire.campaign-component');
    }
}
