<?php

namespace App\Http\Livewire;

use App\Models\Campaign;
use App\Models\MemoryCard;
use Livewire\Component;

class CampaignComponent extends Component
{
    public $memorycard;

    public $campaigns;
    public $selected_campaign;

    public $designated_heroes;
    public $recruitable_heroes;

    public $selected_heroes;

    public function mount(){
        $this->memorycard = MemoryCard::get();
        if($this->memorycard->selected_campaign != null) {
            $this->selected_campaign = $this->memorycard->campaign_id;
            $this->designated_heroes = $this->memorycard->selected_campaign->designated_heroes()->pluck('firstname')->toArray();
            $this->recruitable_heroes = $this->memorycard->selected_campaign->recruitable_heroes()->pluck('firstname', 'hero_id')->toArray();
            $this->selected_heroes = $this->memorycard->selected_heroes->pluck('id')->toArray();
        }
        $this->campaigns = Campaign::all();
    }

    public function select_campaign($id){

        if($this->selected_campaign != $id){
            $this->selected_campaign = $id;
            $campaign = Campaign::where('id', $id)->first();
            $this->designated_heroes = $campaign->designated_heroes()->pluck('firstname')->toArray();
            $this->recruitable_heroes = $campaign->recruitable_heroes()->pluck('firstname', 'hero_id')->toArray();

            $this->selected_heroes = $campaign->designated_heroes()->pluck('hero_id')->toArray();
        }
    }

    public function select_hero($id){
        if(in_array($id, $this->selected_heroes)) {
            $key = array_search($id, $this->selected_heroes);
            unset($this->selected_heroes[$key]);
        } else {
            array_push($this->selected_heroes, $id);
        }
    }

    public function save(){
        $this->memorycard->campaign_id = $this->selected_campaign;
        $this->memorycard->save();
        $this->memorycard->selected_heroes()->sync($this->selected_heroes);
    }

    public function render()
    {
        return view('livewire.campaign-component');
    }
}
