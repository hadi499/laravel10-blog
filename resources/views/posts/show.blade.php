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
                <hr>
                <!-- Tampilkan daftar komentar -->
                <h4>Komentar:</h4>
                @foreach($comments as $comment)
                <div class="mb-2 ms-4">
                    <div class="d-flex align-items-center">
                        <span><strong>{{$comment->user->name}}</strong></span>
                        <span class="ms-3">{{$comment->created_at->diffForHumans()}}</span>
                    </div>

                    <p class="text-secondary">{{ $comment->body }}</p>
                    <!-- Tampilkan informasi komentar seperti nama pengguna, waktu, dll. -->
                </div>
                @endforeach

                <!-- Formulir untuk menambahkan komentar -->
                @auth
                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    <div>
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <textarea class="form-control" name="comment" rows="4" style="width: 75%"></textarea>
                    </div>
                    <button class="mt-3 btn btn-outline-dark" type="submit">Kirim Komentar</button>
                </form>
                @endauth

            </div>

        </div>
    </div>
</div>


@endsection