@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    @include('inc.teamHeader')
    <div class="dashboard"> 
            <div class="container">
                <div class="box box-user">
                    <a href="{{ route('admin.homeCover.home') }} ">
                        <div class="card" >
                            <h3>Edit Home Header </h3>
                            <i class="fa-solid fa-house-user"></i>
                        </div>
                    </a>
                </div>

                <div class="box">
                    <a href="{{ route('admin.events.home') }} ">
                        <div class="card" >
                            <h3>Manage Events</h3>
                            <i class="fa-solid fa-calendar"></i>
                        </div>
                    </a>
                </div>

                <div class="box box-user">
                    <a href="{{ route('admin.aboutCover.home') }} ">
                        <div class="card" >
                            <h3>Edit about Header </h3>
                            <i class="fa-solid fa-user-pen"></i>
                        </div>
                    </a>
                </div>

                <div class="box box-user">
                    <a href="{{ route('admin.aboutSection.home') }} ">
                        <div class="card" >
                            <h3>Edit about Section </h3>
                            <i class="fa-solid fa-wrench"></i>
                        </div>
                    </a>
                </div>

                <div class="box box-user">
                    <a href="{{ route('admin.posts.index') }} ">
                        <div class="card" >
                            <h3>Manage Blogs</h3>
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </a>
                </div>
          
                <div class="box box-user">
                    <a href="{{ route('admin.team.home') }} ">
                        <div class="card" >
                            <h3>Manage Teams </h3>
                            <i class="fa-solid fa-people-roof"></i>
                        </div>
                    </a>
                </div>

                <div class="box box-user">
                    <a href="{{ route('admin.user.home') }} ">
                        <div class="card" >
                            <h3>Manage Users </h3>
                            <i class="fa-solid fa-user-gear"></i>
                        </div>
                    </a>
                </div>
            </div>
    </div>
 @endsection