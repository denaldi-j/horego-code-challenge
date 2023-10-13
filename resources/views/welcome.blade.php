@extends('layouts.app')

@section('content')
    <h1>Welcome, {{ auth()->user()->username }}</h1>
@endsection
