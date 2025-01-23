@extends('layouts.frontend')
@section('title', 'Welcome')
@section('content')
<div class="row gx-4 gx-lg-5 justify-content-center">
    <div class="col-md-10 col-lg-8 col-xl-7">
        @foreach($latestPosts as $index => $post)
            <!-- Post preview-->
            <div class="post-preview">
                <a href="{{route('main', ['url' => $post->url])}}">
                    <h2 class="post-title">{{$post->title}}</h2>
                    <h3 class="post-subtitle">{{Str::limit($post->description, 50)}}</h3>
                </a>
                <p class="post-meta">
                    Posted by
                    {{$post->user->name}}
                    on {{date('F d, Y', strtotime($post->created_at))}}
                </p>
            </div>
            @if($index !== $latestPosts->count() - 1)
                <!-- Divider-->
                <hr class="my-4" />
            @endif
        @endforeach
    </div>
</div>
@endsection