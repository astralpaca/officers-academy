<div>

    <div class="w-auto d-flex mt-3 pb-3 border-bottom">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary flex-grow-1 m-1">Back</a>
        <button class="btn btn-primary flex-grow-1 m-1">Save</button>
    </div>

    <div class="w-auto d-flex mt-3 mb-3">
        @foreach($campaigns as $campaign)
            <button wire:click="select_campaign({{ $campaign->id }})" class="btn w-25 m-1 {{ $campaign->id === $selected_campaign ? 'btn-danger' : 'btn-info' }}">{{$campaign->name}}</button>
        @endforeach
    </div>

    @if($selected_campaign)

        <fieldset class="border border-primary p-2">

            <legend  class="w-auto p-2">Designated Heroes</legend>

            <div class="w-auto d-flex justify-content-start flex-wrap">
                @foreach($designated_heroes as $hero)
                    <img class="portrait selected" src={{ asset('portraits/'. $hero .'.webp') }}>
                @endforeach
            </div>

        </fieldset>

        <fieldset class="border border-primary p-2">

            <legend  class="w-auto p-2">Recruitable Heroes</legend>

            <div class="w-auto d-flex justify-content-start flex-wrap">
                @foreach($recruitable_heroes as $hero)
                    <img wire:click="select_hero('{{ $hero }}')" class="portrait clickable {{ in_array($hero, $selected_heroes) ? 'selected' : 'unselected' }}" src={{ asset('portraits/'. $hero .'.webp') }}>
                @endforeach
            </div>

        </fieldset>

    @endif

</div>
