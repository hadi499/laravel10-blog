@extends('layouts.main')

@section('content')

<div class="container">
    <div class="row my-3 justify-content-center">
        <div class="col-md-8 mb-4">
            <h2>{{ $post->title }}</h2>
            <p>Author : <a href="/authors/{{$post->author->username}}">{{$post->author->name}}
                </a></p>

            <div style="overflow:hidden;">
                <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid mt-3" alt="">

            </div>

            <article class="my-3">
                {!! $post->body !!}

            </article>

            <div class="mt-3 mb-5">
                <hr class="border border-secondary border-2 opacity-20">

                @auth
                <div class="card p-3">

                    <form method="POST" action="{{ route('comments.store') }}">
                        @csrf
                        <div>
                            <input type="hidden" name="post_id" value="{{ $post->id }}">
                            <input class="form-control" name="comment">
                        </div>
                        <button class="mt-2 btn btn-outline-dark" type="submit">Kirim Komentar</button>
                    </form>

                </div>
                @endauth

                <hr class="border border-secondary border-3 opacity-20">

                <div class="mb-2">
                    @foreach($comments as $comment)
                    <div class="ms-4">

                        <div class="d-flex align-items-center">
                            <span><strong>{{$comment->user->name}}</strong></span>
                            <span class="ms-3">{{$comment->created_at->diffForHumans()}}</span>
                        </div>
                        <p class="text-secondary">{{ $comment->body }}</p>


                    </div>
                    <hr>
                    @endforeach
                </div>

            </div>

        </div>
    </div>
</div>


@endsection