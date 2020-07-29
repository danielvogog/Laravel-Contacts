@extends('base')

@section('content')
<div class="table-responsive">
<table class="table table-striped table-bordered text-center">
    <thead class="thead-dark">
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Number</th>
        <th>Created</th>
        <th>Updated</th>
        <th>-</th>
        <th>-</th>            
    </tr>
    </thead>
    <tbody>
    @foreach ($contacts as $contact)
    <tr>
        <td>{{ $contact->first_name }}</td>
        <td>{{ $contact->last_name }}</td>
        <td>{{ $contact->number }}</td>
        <td>{{ $contact->created_at }}</td>
        <td>{{ $contact->updated_at }}</td>
        <td><button class="btn btn-dark"><a href="/edit/{{ $contact->id }}" class="text-decoration-none text-light">Edit</a></button></td>
        <td><button class="btn btn-dark"><a href="/destroy/{{ $contact->id }}" class="text-decoration-none text-light">Delete</a></button></td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>

{{ $contacts->links() }}
@endsection
