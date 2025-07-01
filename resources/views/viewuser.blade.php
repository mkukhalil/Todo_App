@extends('layout')
@section('title')
User Details
@endsection
  
@section('content')
<table class="table table-striped table-bordered">
    <tr>
        <th width="120px">Name:</th>
        <td>{{ $user->name }}</td>
    </tr>
    <tr>
        <th>Email:</th>
        <td>{{ $user->email }}</td>
    </tr>
    <tr>
        <th>Age:</th>
        <td>{{ $user->age }}</td>
    </tr>
    <tr>
        <th>City:</th>
        <td>{{ $user->city }}</td>
    </tr>
    <tr>
        <th>Image:</th>
       <td>
                       @if($user->image)
    <img src="{{ asset('storage/users/' . $user->image) }}" width="100" height="100" style="object-fit:cover; border-radius: 10%;">
@else
    <span class="text-muted">No image</span>
@endif
                    </td>
    </tr>
</table>

<a href="{{ route('user.index') }}" class="btn btn-secondary-custom btn-sm">Back</a>
@endsection
