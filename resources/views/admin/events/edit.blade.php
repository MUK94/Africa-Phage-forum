@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    @include('inc.teamHeader')

    <div class="dashContent">
        <div class="postBox">
            {{-- ERROR HANDLING --}}
            
            @include('inc.errors')
        
            <div class="createContainer">
                <div class="createBox">
                    <h3 class="title">Create an Event</h3>
                    <form action="{{ route('admin.events.update', ['id'=>$viewData['event']->getId()]) }}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label htmlfor="title">Title</label>
                        <input id="title" type="text" name="title" value="{{ $viewData['event']->getTitle() }}" placeholder="Title"  required/>
                        
                        <label htmlfor="speakerName">Speaker Name</label>
                        <input id="speakerName" type="text" name="speakerName" value="{{ $viewData['event']->getSpeakerName() }}" placeholder="Speaker Name" required/>
                        
                        <label htmlfor="eventLink">Registration Link</label>
                        <input id="eventLink" type="text" name="eventLink" value="{{ $viewData['event']->getEventLink() }}" placeholder="Registration Link"  required/>
                        
                        <label htmlfor="speakerBio">Speaker Bio</label>
                        <textarea id="speakerBio" type="text" name="speakerBio" maxlength="300"  placeholder="Speaker Bio" required>
                            {{ $viewData['event']->getSpeakerBio() }}
                        </textarea>
                        <div class="createBtn">
                            <input id="file" type="file" name="image" value="{{ $viewData['event']->getImage() }}" required/>
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection