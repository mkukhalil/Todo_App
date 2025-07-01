@extends('layout')
@section('title')
 Update user data
@endsection
  
@section('content')
<form method="POST" action="{{ route('user.update', $user->id) }}", enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="username" value="{{ old('username', $user->name) }}" class="form-control @error('username') is-invalid @enderror">
        @error('username')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="useremail" value="{{ old('useremail', $user->email) }}" class="form-control @error('useremail') is-invalid @enderror">
        @error('useremail')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Age</label>
        <input type="number" name="userage" value="{{ old('userage', $user->age) }}" class="form-control @error('userage') is-invalid @enderror">
        @error('userage')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">City</label>
        <input type="text" name="usercity" value="{{ old('usercity', $user->city) }}" class="form-control @error('usercity') is-invalid @enderror">
        @error('usercity')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
     @if($user->image)
    <div class="mb-3">
        <label class="form-label">Current Image</label><br>
        <img src="{{ asset('storage/users/' . $user->image) }}" alt="User Image" width="80" height="80">
    </div>
    @endif

    <div class="mb-3">
        <label class="form-label">Upload New Image (optional)</label>
        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary-custom btn-sm me-2">Update</button>
    <a href="{{ route('user.index') }}" class="btn btn-secondary-custom btn-sm">Cancel</a>
</form>
@endsection
