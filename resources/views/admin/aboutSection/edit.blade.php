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
                    <form action="{{ route('admin.aboutSection.update', ['id'=>$viewData['aboutSection']->getId()]) }}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <label htmlfor="description">About Us</label>
                        <textarea class="editor" name="description" id="description" minlength="300" maxlength="600" placeholder="Who we are"  
                                required>{{ $viewData['aboutSection']->getDescription() }}</textarea>

                        <label htmlfor="details">What we do</label>
                        <textarea class="editor" name="details" id="details" minlength="300" maxlength="600"  placeholder="What we do"  
                                required>{{ $viewData['aboutSection']->getDetails() }}</textarea>


                        <div class="createBtn">
                            <input id="file" type="file" name="image"/>
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="https://cdn.tiny.cloud/1/lnxkp36f1znaucsre5fetulgjng7qske55stc9zpr67ahsac/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
            tinymce.init({
            selector: 'textarea',
            plugins: 'advlist autolink lists link image charmap preview anchor pagebreak',
            toolbar_mode: 'floating',
            });
        </script>
    </div>
@endsection