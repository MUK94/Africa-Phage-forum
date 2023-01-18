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
                <h3 class="title">Current Section Content</h3>
                <div class="postTable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">About us</th>
                                <th scope="col">What we do</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData["about_sections"] as $aboutSection)
                                <tr>
                                    <td>{{ $aboutSection->getId() }}</td>
                                    <td>{{ $aboutSection->getDescription() }}</td>
                                    <td>{{ $aboutSection->getDetails() }}</td>
                                    <td class="edit"> 
                                        <a href="{{ route('admin.aboutSection.edit', ['id'=>$aboutSection->getId()]) }}" class="edit">
                                            <i class="fa fa-pencil"></i>
                                        </a>
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