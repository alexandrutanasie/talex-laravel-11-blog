@extends('layouts.frontend')
@section('title', $category->name)
@section('content')
<div class="row gx-5">
    @foreach($category->posts()->get() as $post)
    <div class="col-lg-4 mb-5 mb-lg-0">
        <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-collection"></i></div>
        <h2 class="h4 fw-bolder">{{$post->title}}</h2>
        <p>{{Str::limit($post->description, 50)}}</p>
        <a class="text-decoration-none" href="{{route('main', ['url' => $post->url])}}">
            Read more
            <i class="bi bi-arrow-right"></i>
        </a>
    </div>
    @endforeach
</div>
@endsection