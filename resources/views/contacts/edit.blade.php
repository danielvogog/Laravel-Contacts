@extends('base')

@section('content')
    {!! Form::open(['action' => ['ContactsController@update', $contact->id]]) !!}
    <div class="form-group">
        {{ Form::hidden('_method', 'PUT') }}
        <table>
            <tr>
                <td>{{ Form::label('first_name', 'Firstname') }}</td>
                <td>{{ Form::text('first_name', $contact->first_name, ['required' => 'required', 'class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('last_name', 'Lastname') }}</td>
                <td>{{ Form::text('last_name', $contact->last_name, ['required' => 'required', 'class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td>{{ Form::label('number', 'Number') }}</td>
                <td>{{ Form::number('number', $contact->number, ['required' => 'required', 'class' => 'form-control']) }}</td>
            </tr>
            <tr>
                <td></td>
                <td>{{ Form::submit('Update', ['class' => 'btn btn-success']) }}</td>
            </tr>
        </table>
    </div>
    {!! Form::close() !!}
@endsection
