@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Organizations</h4>
        <a href="{{ route('organization.create') }}" class="btn btn-primary">Create</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col" style="width: 50px">#</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Website</th>
            <th scope="col">Logo</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($organizations as $index => $organization)
            <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $organization->name }}</td>
                <td>{{ $organization->email }}</td>
                <td>{{ $organization->phone }}</td>
                <td>{{ $organization->website }}</td>
                <td>
                    <img src="{{ asset('logo/'.$organization->logo) }}" class="img-fluid" style="height: 50px" alt="logo">
                </td>
                <td>
                    <a href="{{ route('organization.create', ['id' => $organization->id]) }}" class="text-warning me-2">Edit</a>
                    <a href="{{ route('organization.destroy', ['id' => $organization->id]) }}" class="text-danger me-2">Delete</a>
                    <a href="{{ route('organization.show', ['id' => $organization->id]) }}" class="text-primary">Detail</a>
                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
@endsection
