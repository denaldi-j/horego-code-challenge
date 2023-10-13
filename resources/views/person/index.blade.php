@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Person</h4>
    </div>
    <form action="{{ route('person.search') }}" method="post"> @csrf
        <div class="input-group w-50 mb-3">
            <input type="text" name="keyword" class="form-control" placeholder="Search by organization or person name" aria-describedby="button-addon2">
            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
        </div>
    </form>
    @include('person.list')
@endsection
