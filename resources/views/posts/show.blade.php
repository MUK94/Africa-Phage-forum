@extends('layouts.app')
    @section('title', $viewData["title"])
    @section('subtitle', $viewData["subtitle"])
@section('content')
    <header class="team adminReturn">
        <h1><a href="/blog "><- Go Back</a></h1>
    </header>
        <div class="singlePost-container">
            <h2 class="singlePostTitle">
                {{ $viewData["post"]->getTitle() }} 
            </h2>
            <span class="postDate">Posted on {{ date('F d, Y', strtotime($viewData["post"]->getUpdatedAt())) }} by Admin</span>
        <div class="imgBox">
        <img src="{{ asset('/public/storage/'.$viewData["post"]->getImage()) }}">
                <figcaption>[ {{ $viewData["post"]->getTitle() }} ]</figcaption>
            </div>
            <div class="postBox">
                <div class="postBody">
                    <p class="postContent">{!! $viewData["post"]->getDescription() !!}</p> 
                </div>
            </div>
        </div>
@endsection