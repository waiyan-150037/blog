@extends('layouts.app');
@section("content")
 <div class="container">
    @if (session('danger'))
        <div class="alert alert-danger">{{session('danger')}}</div>
    @endif
 @foreach($articles as $article)
 <div class="card mb-2">
 <div class="card-body">
 <h5 class="card-title">{{ $article->title }}</h5>
 <div class="card-subtitle mb-2 text-muted small">
    <span>By {{$article->user->name}}</span>
 {{ $article->created_at->diffForHumans() }}
 </div>
 <p class="card-text">{{ $article->body }}</p>
 <a class="card-link"
 href="{{ url("/articles/detail/$article->id") }}">
 View Detail &raquo;
 </a>
 </div>
 </div>
 @endforeach
 </div>
@endsection