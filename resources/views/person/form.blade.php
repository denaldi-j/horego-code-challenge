@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Person | Form</h4>
    </div>

    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ !$person ? route('person.store') :  route('person.update', $person?->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                               value="{{ $person?->name ?: old('name') }}" required>
                    </div>
                    @error('name')
                    <span class="invalid-feedback" role="alert">{{ $message }}</span>
                    @enderror
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                               value="{{ $person?->email ?: old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                               value="{{ $person?->phone ?: old('phone') }}" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="organization" class="form-label">Organization</label>
                        <select class="form-select"  aria-label="Select organization" id="organization" name="organization">
                            <option selected>Select organization</option>
                            @foreach($organizations as $organization)
                                <option value="{{ $organization->id }}" @if($person?->organization_id == $organization->id) selected @endif>{{ $organization->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-4">
                        <label for="avatar" class="form-label">Logo</label>
                        <input class="form-control @error('avatar') is-invalid @enderror" type="file" id="avatar" name="avatar"
                               @if(is_null($person)) required @endif>
                        @error('avatar')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('person.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
