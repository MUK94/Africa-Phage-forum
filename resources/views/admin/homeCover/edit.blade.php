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
                    <h3 class="title">Update Home Cover</h3>
                    <form action="{{ route('admin.homeCover.update', ['id'=>$viewData['homeCover']->getId()]) }}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <label htmlfor="title">Title</label>
                        <input id="title" type="text" name="title" value="{{ $viewData['homeCover']->getTitle() }}" maxlength="100"  required/>
                        
                        <label htmlfor="quote">Mission</label>
                        <input id="quote" type="text" name="quote" value="{{ $viewData['homeCover']->getQuote() }}" maxlength="200"  required/>
                        

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