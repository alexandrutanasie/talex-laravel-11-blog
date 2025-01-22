@extends('layouts.admin')

@section('title', 'Posts')

@section('content')
<form action="{{ isset($post) ? route('admin.posts.update', $post) : route('admin.posts.store') }}" method="POST">
        @csrf
        @if(isset($post))
            @method('PUT')
        @endif
        <input type="hidden" name="user_id" id="user_id" class="form-control" value="{{auth()->user()->id}}">
        <div class="mb-3">
            <label for="name" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $post->title ?? '') }}">
            @if ($errors->has('title'))
                <span class="text-danger">{{ $errors->first('title') }}</span>
            @endif
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control">{{ old('description', $post->description ?? '') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="url" class="form-label">URL</label>
            <input type="text" name="url" id="url" class="form-control" value="{{ old('url', $post->url ?? '') }}">
            @if ($errors->has('url'))
                <span class="text-danger">{{ $errors->first('url') }}</span>
            @endif
        </div>
        <button type="submit" class="btn btn-success">{{ isset($post) ? 'Update' : 'Create' }}</button>
    </form>
@endsection