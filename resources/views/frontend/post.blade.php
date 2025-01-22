@extends('layouts.frontend')
@section('title', $post->title)
@section('content')
<div class="row gx-5">{{$post->description}}</div>
@endsection