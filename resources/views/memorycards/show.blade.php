@extends('layout.base')

@section('content')

    <div class="w-auto d-flex mt-3 pb-3 border-bottom">
        <a href="{{ route('home') }}" class="btn btn-outline-secondary w-50 m-1">Back</a>
    </div>

    <div id="memorycard" class="d-flex flex-column justify-content-center align-items-center mt-3">

        <form method="POST" action="{{ route('memorycard.create') }}" class="w-50">
            @csrf
            <button type="submit" class="btn btn-primary w-100">Create new save</button>
        </form>

        <form method="POST" action="{{ route('memorycard.load') }}" class="w-50 d-flex mt-1">
            @csrf
            @method('PUT')

            <label for="code" class="font-weight-bold m-auto">Save file</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}" maxlength="6" class="flex-grow-1 ml-2 mr-1 pl-2">

            <button type="submit" class="btn btn-primary">Load save</button>
        </form>

    </div>

    @error('code')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror

@endsection
