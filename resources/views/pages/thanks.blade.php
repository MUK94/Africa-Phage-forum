@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    @include('inc.teamHeader')
    <div class="thanks">
        <section class="thanks-col">
            <h1>We have received your email, We will reply as soon as possible</h1>
            <p>Click <a href="/ ">here to return Homepage</a></p>
        </section>
    </div>
@endsection