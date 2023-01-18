@extends('layouts.app')
    @section('title', $viewData["title"])
@section('content')

    @include('inc.teamHeader')
    @include('inc.return')

    <div class="team-admin-container">
        {{-- ERROR HANDLING --}}
        @include('inc.errors')
        <h3 class="title">Update Teams' Info</h3>             
        <form class="form" action="{{ route('admin.team.update', ['id'=>$viewData['team']->getId()]) }}"  method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="country-input">
                <label for="country">Country</label>
                <input type="text" name="country" id="country" value="{{ $viewData['team']->getCountry() }}" 
                    maxlength="20" required>
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
                    <input type="text" name="managerName" id="managerName" maxlength="30" 
                        value="{{ $viewData['team']->getManagerName() }}" required>
    
                    <label for="managerInstitution">Institution</label>
                    <input type="text" name="managerInstitution" id="managerInstitution" maxlength="50" 
                        value="{{ $viewData['team']->getManagerInstitution() }}" required>
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
                        value="{{ $viewData['team']->getStakeholderName() }}" required>
    
                    <label for="stakeholderInstitution">Institution</label>
                    <input type="text" name="stakeholderInstitution" id="stakeholderInstitution" 
                                maxlength="50" value="{{ $viewData['team']->getStakeholderInstitution() }}" required>
    
                </div>
            </div>
            <div class="teamBtn createBtn">
                <div class="upload">
                    <label for="file">Upload country's flag</label>
                    <input id="file" type="file" name="image"/>
                </div>
                <button class="btn" type="submit">Submit</button>
            </div>

        </form>

        </div>
    </div>
@endsection

