@extends('layouts.app')
    @section('title', $viewData["title"])
@section('content')

    @include('inc.teamHeader')
    @include('inc.return')

    <div class="team-admin-container">
        {{-- ERROR HANDLING --}}
        @include('inc.errors')
        <h3 class="title">Add Teams</h3>             
        <form class="form" action="{{ route('admin.team.store') }}" method="post" enctype="multipart/form-data">
            
            @csrf
            <div class="country-input">
                <label for="country">Country</label>
                <input type="text" name="country" id="country"
                    maxlength="20" placeholder="Enter your country" required>
            </div>
            <div class="team-col">

                <div class="team-admin-box">
                    <label for="managerTitle">Select Manager Title</label>
                    <select name="managerTitle" id="managerTitle">
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mr.">Dr.</option>
                        <option value="Mr.">Prof.</option>
                    </select>
    
                    <label for="managerName">FullName</label>
                    <input type="text" name="managerName" id="managerName" maxlength="30" placeholder="Enter Name" required>
    
                    <label for="managerInstitution">Institution</label>
                    <input type="text" name="managerInstitution" id="managerInstitution" maxlength="50" 
                            placeholder="Enter Institution Name" required>
                </div>
            
                <div class="team-admin-box">
    
                    <label for="stakeholderTitle">Select Stakeholder Title</label>
                    <select name="stakeholderTitle" id="stakeholderTitle">
                        <option value="Mr.">Mr.</option>
                        <option value="Mrs.">Mrs.</option>
                        <option value="Ms.">Ms.</option>
                        <option value="Mr.">Dr.</option>
                        <option value="Mr.">Prof.</option>
                    </select>
    
                    <label for="stakeholderName">FullName</label>
                    <input type="text" name="stakeholderName" id="stakeholderName" maxlength="30" 
                            placeholder="Enter Name" required>
    
                    <label for="stakeholderInstitution">Institution</label>
                    <input type="text" name="stakeholderInstitution" id="stakeholderInstitution" 
                                maxlength="50" placeholder="Enter Institution Name" required>
    
                </div>
            </div>
            <div class="teamBtn createBtn">
                <div class="upload">
                    <label for="file">Upload country's flag</label>
                    <input id="file" type="file" name="image"  required/>
                </div>
                <button class="btn" type="submit">Submit</button>
            </div>

        </form>


        <h3 class="title">List of Teams</h3>
        <div class="listOfTeams">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Country</th>
                        <th scope="col">Manager</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Institution</th>
                        <th scope="col">Stakeholder</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Institution</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($viewData["teams"] as $team)
                        <tr>
                            <td>{{ $team->getId() }}</td>
                            <td>{{ $team->getCountry() }}</td>
                            <td>{{ $team->getManagerTitle() }}</td>
                            <td>{{ $team->getManagerName() }}</td>
                            <td>{{ $team->getManagerInstitution() }}</td>
                            <td>{{ $team->getStakeholderTitle() }}</td>
                            <td>{{ $team->getStakeholderName() }}</td>
                            <td>{{ $team->getStakeholderInstitution() }}</td>
    
                            <td class="edit"> 
                                <a href="{{ route('admin.team.edit', ['id'=>$team->getId()]) }}" class="edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </td>
                            <td class="del">
                                <form action="{{ route('admin.team.delete', $team->getId())}}" method="GET">
                                    @csrf
                                    @method('DELETE')
                                    <div class="delBtn">
                                        <button>
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach 
                </tbody>
            </table>
        </div>
    </div>
@endsection
