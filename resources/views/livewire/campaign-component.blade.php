<div>

    @foreach($campaigns as $campaign)

        <button wire:click="select({{ $campaign->id }})" @if($campaign->id === $selected) class="campaign-selected" @endif>{{$campaign->name}}</button>

    @endforeach

    @if($selected)

        @foreach($heroes as $hero)

            <img class="portrait" src={{ asset('portraits/'. $hero->firstname .'.webp') }}>

        @endforeach
    @endif

</div>
