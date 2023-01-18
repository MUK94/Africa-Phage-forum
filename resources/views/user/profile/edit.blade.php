@extends('layouts.app')
    @section('title', $viewData["title"])
@section('content')

    @include('inc.teamHeader')
    @include('inc.return')

 <div class="team-admin-container">
        {{-- ERROR HANDLING --}}
        @include('inc.errors')
        <h3 class="title">Update User Info</h3>             
        <form class="form" action="{{ route('user.profile.update', ['id'=>$viewData['user']->getId()]) }}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="name">Username</label>
            <input type="text" name="name" id="name" value="{{ $viewData['user']->getName() }}" maxlength="30" required>

            <label for="email">Email address</label>
            <input type="email" name="email" id="email" value="{{ $viewData['user']->getEmail() }}" required>

            <label for="experience">Experience</label>
            <input type="text" name="experience" id="experience" value="{{ $viewData['user']->getExperience() }}" required>

            <label for="laboratory">Laboratory</label>
            <input type="text" name="laboratory" id="laboratory" value="{{ $viewData['user']->getLaboratory() }}" required>


            <label for="file">Profile photo</label>
            <div class="createBtn">
                <input id="file" type="file" name="image"/>
                <button type="submit">Update</button>
            </div>

        </form>

        </div>
    </div>
@endsection

