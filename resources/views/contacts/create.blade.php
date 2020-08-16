@extends('base')

@section('content')
<div class="row">
    <div class="col-sm-0 col-xl-4"></div>

    <div class="col-sm-12 col-xl-4">
        {!! Form::open([]) !!}
        <div class="form-group">
            <div class="row">
                <div class="col-2 text-center">
                    {{ Form::label('first_name', 'Firstname') }}
                </div>
                <div class="col">
                    {{ Form::text('first_name', '', ['required' => 'required', 'class' => 'form-control']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-2 text-center">
                    {{ Form::label('last_name', 'Lastname') }}
                </div>
                <div class="col">
                    {{ Form::text('last_name', '', ['required' => 'required', 'class' => 'form-control']) }}
                </div>
            </div>

            <div class="row">
                <div class="col-2 text-center">
                    {{ Form::label('number', 'Number') }}
                </div>
                <div class="col">
                    {{ Form::number('number', '', ['required' => 'required', 'class' => 'form-control']) }}
                </div>
            </div>
            
            <div class="text-center">
                {{ Form::submit('Create', ['class' => 'btn btn-success mt-1 ml-5']) }}
            </div>
        </div>
        {!! Form::close() !!}
    </div>

    <div class="col-sm-0 col-xl-4"></div>
</div>
@endsection
