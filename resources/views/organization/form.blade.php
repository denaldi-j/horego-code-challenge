@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Organizations | Form</h4>
    </div>

    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ !$organization ? route('organization.store') : route('organization.update', ['id' => $organization?->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                               value="{{ $organization?->name ?: old('name') }}" required>
                        @error('name')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                               value="{{ $organization?->email ?: old('email') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone"
                               value="{{ $organization?->phone ?: old('phone') }}" required>
                        @error('phone')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" id="website" name="website"
                               value="{{ $organization?->website ?: old('website') }}" required>
                        @error('website')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="logo" class="form-label">Logo</label>
                        <input class="form-control @error('logo') is-invalid @enderror" type="file" id="logo" name="logo"
                            @if(is_null($organization)) required @endif>
                        @error('logo')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('organization.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
