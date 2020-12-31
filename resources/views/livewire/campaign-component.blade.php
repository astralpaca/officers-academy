<div>

    @foreach($campaigns as $campaign)

        <button wire:click="select_campaign({{ $campaign->id }})" @if($campaign->id === $selected_campaign) class="campaign-selected" @endif>{{$campaign->name}}</button>

    @endforeach

    @if($selected_campaign)

        @foreach($designated_heroes as $hero)

            <img class="portrait selected" src={{ asset('portraits/'. $hero .'.webp') }}>

        @endforeach

        @foreach($recruitable_heroes as $hero)

            <img wire:click="select_hero('{{ $hero }}')" @if(in_array($hero, $selected_heroes)) class="portrait selected" @else class="portrait unselected" @endif src={{ asset('portraits/'. $hero .'.webp') }}>

        @endforeach

    @endif

</div>
