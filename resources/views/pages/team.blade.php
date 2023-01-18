@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    @include('inc.teamHeader')
    <div class="team-section">
        @foreach ($viewData["teams"] as $team)
            <main class="team-row">
                <div class="country-flag">
                    <img src="{{ asset('/public/storage/'.$team->getImage()) }}" alt="APF_{{ $team->getCountry() }}">
                </div>
                <div class="country">
                    <h2>{{ $team->getCountry() }}</h2>
                </div>
                <div class="team-header">
                    <h3 >Team Manager</h3>
                    <h3 >Stakeholder Manager</h3>
                </div>
                <div class="team-container">
                    <div class="team-box">
                        <div class="title fullName">
                            <h4>{{ $team->getManagerTitle()}} {{ $team->getManagerName()}}</h4>
                        </div>
                        <span class="institution">{{ $team->getManagerInstitution() }}</span>
                    </div>
                    <div class="team-box">
                        <div class="title fullName">
                            <h4> {{ $team->getStakeholderTitle() }} {{ $team->getStakeholderName() }} </h4>
                        </div>
                        <span class="institution"> {{ $team->getStakeholderInstitution() }} </span>
                    </div>
                </div>
            </main>
        @endforeach
    </div>
          
    <div class="paginationLinks">
        {{ $viewData['teams']->links() }}
    </div>
@endsection