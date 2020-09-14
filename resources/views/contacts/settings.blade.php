@extends('base')

@section('content')
    <hr>
    <div class="text-right">
        <a href="{{ url('/') }}"><button class="btn btn-success">Back</button></a>
    </div>

    <div class="container">
        <form action="{{ url('/settings') }}" method="POST">
            @method("POST")
            @csrf

            <select name="notification" class="form-control" required>
                @foreach ($notifications_array as $key => $type)
                    @if ($key === $notifications_type)
                        <option value="{{ $key }}" selected>{{ $type }}</option>
                    @else
                        <option value="{{ $key }}">{{ $type }}</option>
                    @endif
                @endforeach
            </select>
            <div class="text-center">
                <button type="submit" class="btn btn-dark mt-2">Save</button>             
            </div>
        </form>
    </div>
    <hr>
@endsection
