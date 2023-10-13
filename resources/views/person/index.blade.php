@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Person</h4>
        <div></div>
    </div>
    @include('person.list')
@endsection
