@extends('layouts.admin')

@section('title', 'Change password')

@section('content')
<form action="{{ route('admin.password.update') }}" method="POST" class="col-lg-4">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label class="form-label" for="new_password">New Password</label>
        <input class="form-control" type="password" id="new_password" name="new_password" required>
        @error('new_password')
            <span>{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group mb-3">
        <label class="form-label" for="new_password_confirmation">Confirm New Password</label>
        <input class="form-control"  type="password" id="new_password_confirmation" name="new_password_confirmation" required>
    </div>

    <div class="form-group mb-3">
        <button class="btn btn-primary btn-icon-split" type="submit">
            <span class="icon text-white-50">
                <i class="fas fa-plus-circle"></i>
            </span>
            <span class="text">Save</span>
        </button>
    </div>
</form>
@endsection