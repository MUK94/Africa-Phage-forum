@extends('layouts.app')
    @section('title', $viewData["title"])
@section('content')
    <div class="home-content">
        <section>
            @foreach ($viewData["home_covers"] as $homeCover)
            <div class="coverHeader">
                <div class="coverHeader-content">
                    <div class="welcome-header">
                        <h1>{{ $homeCover->getTitle() }}</h1>
                        <h2><span>"</span> {{ $homeCover->getQuote() }} <span>"</span></h2>
                    </div>
                    <div class="header-img">
                        <img src="{{ asset('/public/storage/'.$homeCover->getImage()) }}">
                    </div>
                </div>
            </div>
            @endforeach
        </section>
    </div>
    
    {{-- EVENT SECTION --}}
    <main>    
        <h2 class="sectionTitle">{{ $viewData["subtitle"] }}</h2>
  
        <div class="event-container">
            @foreach($viewData['events'] as $event)
                <div class="event">
                    <img src="{{ asset('/public/storage/'.$event->getImage()) }}">
                    <div class="eventTitle">
                        <h1>{{ $event->getTitle() }}</h1>
                    </div>
                    <div class="author-container">
                        <h3>Speaker: <span>{{ $event->getSpeakerName() }}</span></h3>
                        <div class="authorBox">               
                            <p>{{ $event->getSpeakerBio() }}</p>
                        </div>
                    </div>
                    <div class="eventSign">
                        <a href="{{ $event->getEventLink() }}" target="_blank">Registration Link</a>
                    </div>
                </div>   
            @endforeach
        </div>
    </main>
    <div class="paginationLinks">
        {{ $viewData['events']->links() }}
    </div>
@endsection
