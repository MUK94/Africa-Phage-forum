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
                <h3 class="title">Current Header Cover</h3>
                <div class="postTable">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Mission</th>
                                <th scope="col">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($viewData["home_covers"] as $homeCover)
                                <tr>
                                    <td>{{ $homeCover->getId() }}</td>
                                    <td>{{ $homeCover->getTitle() }}</td>
                                    <td>{{ $homeCover->getQuote() }}</td>
                                    <td class="edit"> 
                                        <a href="{{ route('admin.homeCover.edit', ['id'=>$homeCover->getId()]) }}" class="edit">
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