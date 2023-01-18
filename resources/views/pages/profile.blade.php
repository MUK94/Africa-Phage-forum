@extends('layouts.app')
@section('title', $viewData["title"])
@section('content')
    @include('inc.teamHeader')
    <main class="setting">
        <h2> <span>{{ Auth::user()->getName() }}</span> profile info</h2>
        <section class="setting-container">
            <aside class="image-profile">
                <img src="{{ asset('/public/storage/'.(Auth::user()->image)) }}" alt="">
            </aside>
            <aside class="user-info">
                <table>
                    <tr>
                        <th>Username</th>
                        <td>{{  Auth::user()->getName() }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{  Auth::user()->getEmail() }}</td>
                    </tr>
                    <tr>
                        <th>Experience</th>
                        <td>{{  Auth::user()->getExperience() }}</td>
                    </tr>
                    <tr>
                        <th>Laboratory</th>
                        <td>{{  Auth::user()->getLaboratory() }}</td>
                    </tr>
                        <th>Edit</th>
                        <td class="edit"> 
                            <a href="{{ route('user.profile.edit', ['id'=>Auth::user()->getId()]) }}" class="edit">
                                <i class="fa fa-pencil"></i>            
                            </a>
                        </td>
                    </tr>
                </table>
            </aside>
        </section>
    </main>
@endsection