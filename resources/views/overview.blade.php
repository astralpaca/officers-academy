@extends("layout.base")

@section("content")

    <div class="row">

        <a href="{{ route('campaigns') }}" class="btn btn-secondary">Select heroes</a>

        <a href="{{ route('memorycard.show') }}" class="btn btn-secondary">Manage save file</a>

    </div>

@endsection
