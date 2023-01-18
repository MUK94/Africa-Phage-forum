@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    @include('inc.teamHeader')
    
    @include('inc.return')
    
    <div class="dashContent">
        <div class="postBox">
            {{-- ERROR HANDLING --}}
            @include('inc.errors')
            <div class="listOfPosts">
                <h3 class="title">APF Visitors</h3>
                <div class="postTable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData["users"] as $user)
                                <tr>
                                    <td>{{ $user->getId() }}</td>
                                    <td>{{ $user->getName() }}</td>
                                    <td>{{ $user->getEmail() }}</td>
                                    <td>{{ $user->getRole() }}</td>
                                    <td class="edit"> 
                                        <a href="{{ route('admin.user.edit', ['id'=>$user->getId()]) }}" class="edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                    </td>
                                    <td class="del">
                                        <form action="{{ route('admin.user.delete', $user->getId())}}" method="post">
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