@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>User | Form</h4>
    </div>

    <div class="col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ !$user ? route('user.store') :  route('user.update', $user?->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username"
                               value="{{ $user?->username ?: old('username') }}" required>
                        @error('username')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select class="form-select @error('role') is-invalid @enderror"  aria-label="Select organization" id="role" name="role">
                            <option value="">Select role</option>
                            @foreach($roles as $key => $value)
                                <option value="{{ $key }}" @if($user->role == $key) selected @endif>{{ $value }}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="organization" class="form-label">Organization</label>
                        <select class="form-select @error('organization') is-invalid @enderror"  aria-label="Select organization" id="organization" name="organization">
                            <option value="">Select organization</option>
                            @foreach($organizations as $organization)
                                <option value="{{ $organization->id }}" @if($user->organization_id == $organization->id) selected @endif>{{ $organization->name }}</option>
                            @endforeach
                        </select>
                        @error('organization')
                        <span class="invalid-feedback" role="alert">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="">
                        <button type="submit" class="btn btn-primary me-2">Save</button>
                        <a href="{{ route('user.index') }}" class="btn btn-light">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
