@extends('layouts.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-evenly py-2 mb-3" style="background-color:bisque">
        <div>
            <a href="/posts" class="text-decoration-none text-dark fw-semibold">All</a>
        </div>
        @foreach ($categories as $category)
        <div>
            <a href="/categories/{{$category->slug}}"
                class="text-decoration-none text-dark fw-semibold">{{$category->name}}</a>

        </div>
        @endforeach
    </div>

    <div class="row d-flex justify-center">

        <div class="row my-3 justify-content-center">
            <div class="col-md-6">
                <form action="/posts">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Search.." name="search"
                            value="{{ request('search') }}">
                        <button class="btn btn-outline-secondary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>


        @foreach ($posts as $post)
        <div class="col-sm-12 col-md-8 col-lg-6 col-xl-4">
            <div class="card mb-3">
                <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" style="max-height: 250px"
                    alt="...">
                <div class="card-body">
                    <div>
                        <h5 class="card-title"><a class=" text-decoration-none text-dark"
                                href="/posts/{{$post->slug}}">{{
                                $post->title }}</a>
                        </h5>

                    </div>

                    <p class="card-text">{{ $post->excerpt }}</p>

                </div>

            </div>
        </div>
        @endforeach
    </div>

    @endsection