@extends('dashboard.layouts.main')

@section('content')

<div class="container">
    <div class="row my-3">
        <div class="col-md-8 mb-4">
            <h2>{{ $post->title }}</h2>
            <a href="/dashboard/posts" class="btn btn-success"><span data-feather="arrow-left"></span>back to all my
                posts</a>
            <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning"><span
                    data-feather="edit"></span>edit</a>

            <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger" onclick="return confirm('Are you sure ?')"><span
                        data-feather="x-circle"></span>delete</button>
            </form>
            @if ($post->image)
            <div style="overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3"
                    alt="{{ $post->category->name }}">

            </div>

            @else
            <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}" class="img-fluid mt-3"
                alt="{{ $post->category->name }}">
            @endif

            <article class="my-3">

                {!! $post->body !!}

            </article>

        </div>
    </div>
</div>

@endsection