@extends('templates.main')

@section('content')
    <h1>Contacts</h1>

    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}

    <form action="{{ route('getContacts') }}" method="POST">
        @csrf
        <div class="form-group mt-3">
            <label for="">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                value="{{ old('name') }}">
            @error('name')
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
            <label for="">Message:</label>
            <textarea name="message" class="form-control @error('message') is-invalid @enderror">{{ old('message') }}</textarea>
            @error('message')
                <div class="invalid-feedback text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary mt-3">Send</button>
    </form>
@endsection
