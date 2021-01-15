<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use Livewire\Component;

class CampaignComponent extends Component
{
    public $campaigns;
    public $selected_campaign;

    public $designated_heroes;
    public $recruitable_heroes;

    public $selected_heroes;

    public function mount(){
        $this->campaigns = Campaign::all();
    }

    public function select_campaign($id){

        if($this->selected_campaign != $id){
            $this->selected_campaign = $id;
            $campaign = Campaign::where('id', $id)->first();
            $this->designated_heroes = $campaign->designated_heroes()->pluck('firstname')->toArray();
            $this->recruitable_heroes = $campaign->recruitable_heroes()->pluck('firstname')->toArray();

            $this->selected_heroes = $this->designated_heroes;
        }

    }

    public function select_hero($name){
        if(in_array($name, $this->selected_heroes)) {
            $key = array_search($name, $this->selected_heroes);
            unset($this->selected_heroes[$key]);
        } else {
            array_push($this->selected_heroes, $name);
        }
    }

    public function render()
    {
        return view('livewire.campaign-component');
    }
}
