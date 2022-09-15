@extends('templates.main')

@section('content')
    <h1>Sign Up</h1>

    <form action="/signup" method="POST" class="mb-3">
        @csrf
        <div class="form-group mt-3">
            <label for="">First Name</label>
            <input type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName"
                value="{{ old('firstName') }}">
            @error('firstName')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="">Last Name</label>
            <input type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName"
                value="{{ old('lastName') }}">
            @error('lastName')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="">Email:</label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="">Password:</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" name="password"
                value="{{ old('password') }}">
            @error('password')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="">Password Confirm:</label>
            <input type="text" class="form-control @error('password_confirmation') is-invalid @enderror"
                name="password_confirmation" value="{{ old('password_confirmation') }}">
            @error('password_confirmation')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>

        <p class="mt-3">Gender:</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="male" value="male">
            <label class="form-check-label" for="male">
                Male
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="gender" id="female" value="female">
            <label class="form-check-label" for="female">
                Female
            </label>
        </div>

        <p class="mt-3">Hobbies</p>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="hobbies[]" value="music" id="music">
            <label class="form-check-label" for="music">
                Music
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="hobbies[]" value="sports" id="sports">
            <label class="form-check-label" for="sports">
                Sports
            </label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="hobbies[]" value="travel" id="travel">
            <label class="form-check-label" for="travel">
                Travel
            </label>
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="hobbies[]" value="movies" id="movies">
            <label class="form-check-label" for="movies">
                Movies
            </label>
        </div>

        <p class="mt-3">Source of income</p>
        <select class="form-select" aria-label="Source of income" name="Source of income">
            <option selected>Open menu</option>
            <option value="Employed">Employed</option>
            <option value="Self employed">Self employed</option>
            <option value="Not Working">Not Working</option>
            <option value="Studing">Studing</option>
        </select>

        <div class="form-group mt-3">
            <label for="age">Age</label>
            <input type="text" class="form-control @error('age') is-invalid @enderror" name="age"
                value="{{ old('age') }}">
            @error('age')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group mt-3">
            <label for="">Message:</label>
            <textarea name="message" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
            @error('message')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary mt-3">Send</button>
    </form>
@endsection
