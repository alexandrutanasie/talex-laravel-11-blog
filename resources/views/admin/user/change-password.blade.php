@extends('layouts.admin')

@section('title', 'Change password')

@section('content')
<form action="{{ route('admin.password.update') }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="new_password">New Password</label>
        <input type="password" id="new_password" name="new_password" required>
        @error('new_password')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div>
        <label for="new_password_confirmation">Confirm New Password</label>
        <input type="password" id="new_password_confirmation" name="new_password_confirmation" required>
    </div>

    <button type="submit">Update Password</button>
</form>
@endsection