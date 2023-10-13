@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Organizations</h4>
    </div>

    <div class="col-lg-8 col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-2">
                        <img src="{{ asset('logo/'. $organization->logo) }}" class="img-fluid" style="height: 100px; width: 100px" alt="logo">
                    </div>
                    <div class="col-lg-10">
                        <dl class="row">
                            <dt class="col-sm-3">Name</dt>
                            <dd class="col-sm-9">{{ $organization->name }}</dd>

                            <dt class="col-sm-3">Email</dt>
                            <dd class="col-sm-9">{{ $organization->email }}</dd>

                            <dt class="col-sm-3">Phone</dt>
                            <dd class="col-sm-9">{{ $organization->phone }}</dd>

                            <dt class="col-sm-3">Website</dt>
                            <dd class="col-sm-9"><a href="{{ $organization->website }}" target="_blank">{{ $organization->website }}</a> </dd>
                        </dl>
                        <div class="mt-3">
                            <a class="btn btn-outline-primary" href="{{ route('organization.create', ['id' => $organization->id]) }}">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <hr>
    <div class="py-3">
        <div class="d-flex justify-content-between mb-3">
            <h4>Person</h4>
            <a href="{{ route('person.create') }}" class="btn btn-primary">Create</a>
        </div>
        @include('person.list')
    </div>
@endsection
