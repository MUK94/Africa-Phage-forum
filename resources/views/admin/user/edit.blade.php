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
                    <form action="{{ route('admin.user.update', ['id'=>$viewData['user']->getId()]) }}"  method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <label htmlfor="role">Role</label>
                        <select name="role" id="role">
                            <option value="visitor">visitor</option>
                            <option value="admin">admin</option>
                        </select>

                        <div class="createBtn">
                            <button type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection