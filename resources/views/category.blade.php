@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row d-flex justify-center">
        <h2 class="my-3 text-center">Post By Category: {{$title}}</h2>
        @foreach ($posts as $post)
        <div class="col-sm-12 col-md-8 col-lg-6 col-xl-4">
            <div class="card mb-3">
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"><a class=" text-decoration-none text-dark" href="/posts/{{$post->slug}}">{{
                            $post->title }}</a>
                    </h5>
                    <small>{{$post->category->name}}</small>
                    <p class="card-text">{{ $post->excerpt }}</p>

                </div>

            </div>
        </div>
        @endforeach
    </div>

    @endsection