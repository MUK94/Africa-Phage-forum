@extends('layouts.app')
    @section('title', $viewData["title"])
@section('content')
    <section>
        @foreach ($viewData["about_covers"] as $aboutCover)
            <div class="coverHeader">
                <div class="coverHeader-content">
                    <div class="welcome-header">
                        <h1>{{ $aboutCover->getTitle() }}</h1>
                        <h2><span>"</span> {{ $aboutCover->getQuote() }} <span>"</span></h2>
                    </div>
                    <div class="header-img">
                        <img src="{{ asset('/public/storage/'.$aboutCover->getImage()) }}">
                    </div>
                </div>
            </div>
            @endforeach
    </section>

    {{-- ABOUT SECTION --}}
    
    <main>
    <h2 class="sectionTitle">{{ $viewData["subtitle"] }}</h2> 
        <div>
            @foreach ($viewData['about_sections'] as $aboutSection)
                <section class="about">
                    <div class="about-container">
                        <article class="about-text">
                            <p>
                                {!! $aboutSection->getDescription() !!}
                            </p>
                        </article>
                        <article class="imgBox">
                            <img src="{{ asset('/public/storage/'.$aboutSection->getImage()) }}">
                        </article>
                    </div>
                </section>
                <section class="about about-plus">
                    <article class="about-plus-box">
                        <h3>What we do</h3>
                        <p>
                            {!! $aboutSection->getDetails() !!}
                        </p>
                    </div>
                    </article>
                </section>
            @endforeach
        </div>
    </main>
@endsection
