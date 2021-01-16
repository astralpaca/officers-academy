@extends("layout.base")

@section("content")

    <div class="row">

        <a href="{{ route('campaigns') }}" class="btn btn-secondary">Select heroes</a>

        <a href="{{ route('session.show') }}" class="btn btn-secondary">Manage session</a>

    </div>

@endsection
