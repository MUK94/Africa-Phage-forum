@extends('layouts.app')
    @section('title', $viewData["title"])
@section('content')
    @include('inc.teamHeader')
    <main>
        <div class = "blog">
            <div class="card">
                @foreach ($viewData["posts"] as $post)
                    <div class="post">
                        <img src="{{ asset('/public/storage/'.$post->getImage()) }}">
                        <div class="postInfo">
                            <h3> <a href="{{ route('posts.show', $post) }}"
                            class="postTitle">{{ $post->getTitle() }}</a> </h3>
                            <span class="postDate">{{ date('F d, Y', strtotime($post->getCreatedAt())) }} by Admin</span>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class = "sidebar">
                @include('inc.sidebar')
            </div>
        </div>
    </main>
    <div class="paginationLinks">
        {{ $viewData['posts']->links() }}
    </div>
@endsection
