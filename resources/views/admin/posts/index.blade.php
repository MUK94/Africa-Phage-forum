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
                    <h3 class="title">Create a Post</h3>
                    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <label htmlfor="title">Title</label>
                        <input id="title" type="text" name="title" value="{{ old('title') }}" placeholder="Title" required />

                        <label htmlfor="message">Message</label>
                        <textarea id="message" class="description"  name="description" value="{{ old('description') }}" required></textarea>
                        
                        <div class="createBtn">
                            <input id="file" type="file" name="image"   required/>
                            <button type="submit">Publish</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="listOfPosts">
                <h3 class="title">List of Blogs </h3>
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
                            @foreach ($viewData["posts"] as $post)
                                <tr>
                                    <td>{{ $post->getId() }}</td>
                                    <td>{{ $post->getTitle() }}</td>
                                    <td class="edit"> 
                                        <a href="{{ route('admin.posts.edit', ['id'=>$post->getId()]) }}" class="edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td class="del">
                                        <form action="{{ route('admin.posts.delete', $post->getId())}}" method="post">
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
        <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
        <script>
            ClassicEditor
            .create( document.querySelector( '#message' ) )
            .catch( error => {
            console.error( error );
            } );
        </script>
    </div>

@endsection