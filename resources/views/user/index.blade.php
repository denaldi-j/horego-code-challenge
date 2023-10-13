@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>User</h4>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Create</a>
    </div>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col" style="width: 50px">#</th>
            <th scope="col">Username</th>
            <th scope="col">Organization</th>
            <th scope="col">Role</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $index => $user)
            <tr>
                <th scope="row">{{ $index+1 }}</th>
                <td>{{ $user->username }}</td>
                <td>{{ $user->organization?->name }}</td>
                <td>{{ \App\Models\User::ROLES[$user->role] }}</td>
                <td>
                    <a href="{{ route('user.create', ['id' => $user->id]) }}" class="text-warning me-2">edit</a>
                    <a href="{{ route('user.destroy', ['id' => $user->id]) }}" class="text-danger">delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
