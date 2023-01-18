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
                    <h3 class="title">Update Post</h3>
                     <form action="{{ route('admin.posts.update', ['id'=>$viewData['post']->getId()]) }}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <label htmlfor="title">Title</label>
                        <input id="title" type="text" name="title" value="{{ $viewData['post']->getTitle() }}" placeholder="Title"  required/>
                        <label htmlfor="message">Message</label>
                        <textarea id="message" class="description" name="description"   required>
                            {!! $viewData['post']->getDescription() !!}
                        </textarea>
                        <div class="createBtn">
                            <input id="file" type="file" name="image" />
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
        .create( document.querySelector( '#message' ) )
        .catch( error => {
        console.error( error );
        } );
    </script>

@endsection