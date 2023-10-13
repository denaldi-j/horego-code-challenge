<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Client Management Challenge</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="d-flex justify-content-center mt-5">
        <div class="col-lg-3 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center">Registration</h5>
                    <form action="{{ route('register.submit') }}" method="POST"> @csrf
                        <div class="mb-3">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" required>
                            @error('username')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" class="form-control @error('username') is-invalid @enderror" name="password" required>
                            @error('password')
                            <span class="invalid-feedback" role="alert">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Password Confirmation</label>
                            <input type="password" class="form-control" name="password_confirmation" required>
                        </div>
                        <div class="text-center mb-3">
                            <button class="btn btn-primary w-25" type="submit">Register</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
