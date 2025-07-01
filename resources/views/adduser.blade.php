@extends('layout')
@section('title')
Add New User
@endsection
  
@section('content')
<form method="POST" action="{{ route('user.store') }}" enctype="multipart/form-data">

    @csrf

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="username" value="{{ old('username') }}" class="form-control @error('username') is-invalid @enderror">
        @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="useremail" value="{{ old('useremail') }}" class="form-control @error('useremail') is-invalid @enderror">
        @error('useremail')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" name="userage" value="{{ old('userage') }}" class="form-control @error('userage') is-invalid @enderror">
        @error('userage')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">City</label>
        <input type="text" name="usercity" value="{{ old('usercity') }}" class="form-control @error('usercity') is-invalid @enderror">
        @error('usercity')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
        <!-- Image Upload -->
    <div class="mb-3">
        <label class="form-label">Profile Image</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary-custom btn-sm me-2">Add</button>
    <a href="{{ route('user.index') }}" class="btn btn-secondary-custom btn-sm">Cancel</a>
</form>
@endsection
