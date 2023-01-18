@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    @include('inc.teamHeader')
    @include('inc.return')
    <div class="dashContent">
        <div class="postBox">
            {{-- ERROR HANDLING --}}
            @include('inc.errors')
        
            <div class="createContainer">
                <div class="createBox">
                    <h3 class="title">Create An Event</h3>
                    <form action="{{ route('admin.events.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label htmlfor="title">Title</label>
                        <input id="title" type="text" name="title" value="{{ old('title') }}" placeholder="Title"  required/>
                        
                        <label htmlfor="speakerName">Speaker Name</label>
                        <input id="speakerName" type="text" name="speakerName" value="{{ old('speakerName') }}" placeholder="Speaker Name"  required />
                        
                        <label htmlfor="eventLink">Registration Link</label>
                        <input id="eventLink" type="text" name="eventLink" value="{{ old('eventLink') }}" placeholder="Registration Link"  required/>
                        
                        <label htmlfor="speakerBio">Speaker Bio</label>
                        <textarea id="speakerBio" type="text" name="speakerBio" maxlength="300" value="{{ old('speakerBio') }}" placeholder="Speaker Bio" required></textarea>
                        <div class="createBtn">
                            <input id="file" type="file" name="image" required />
                            <button type="submit">Publish</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="listOfPosts">
                <h3 class="title">List of Events </h3>
                <div class="postTable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData["events"] as $event)
                                <tr>
                                    <td>{{ $event->getId() }}</td>
                                    <td>{{ $event->getTitle() }}</td>
                                    <td class="edit"> 
                                        <a href="{{ route('admin.events.edit', ['id'=>$event->getId()]) }}" class="edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td class="del">
                                        <form action="{{ route('admin.events.delete', $event->getId())}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="del">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection