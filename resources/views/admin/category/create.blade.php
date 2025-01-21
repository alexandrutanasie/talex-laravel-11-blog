@extends('layouts.admin')

@section('title', 'Categories')

@section('content')
<form action="{{ isset($category) ? route('admin.categories.update', $category) : route('admin.categories.store') }}" method="POST">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $category->name ?? '') }}">
            @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $category->description ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ old('url', $category->url ?? '') }}">
            @if ($errors->has('url'))
                <span class="text-danger">{{ $errors->first('url') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-success">{{ isset($category) ? 'Update' : 'Create' }}</button>
    </form>
@endsection