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
                    <form action="{{ route('admin.aboutCover.update', ['id'=>$viewData['aboutCover']->getId()]) }}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <label htmlfor="title">Title</label>
                        <input id="title" type="text" name="title" value="{{ $viewData['aboutCover']->getTitle() }}" maxlength="100"  required/>
                        
                        <label htmlfor="quote">Mission</label>
                        <input id="quote" type="text" name="quote" value="{{ $viewData['aboutCover']->getQuote() }}" maxlength="200"  required/>
                        

                        <div class="createBtn">
                            <input id="file" type="file" name="image"/>
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection