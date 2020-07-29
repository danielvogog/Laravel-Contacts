@extends('base')

@section('content')
    {!! Form::open([]) !!}
    <div class="form-group">
        <table>
            <tr>
                <td>{{ Form::label('first_name', 'Firstname') }}</td>
                <td>{{ Form::text('first_name', '', ['required' => 'required', 'class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('last_name', 'Lastname') }}</td>
                <td>{{ Form::text('last_name', '', ['required' => 'required', 'class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('number', 'Number') }}</td>
                <td>{{ Form::number('number', '', ['required' => 'required', 'class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{ Form::submit('Create', ['class' => 'btn btn-success']) }}</td>
            </tr>
        </table>
    </div>
    {!! Form::close() !!}
@endsection
