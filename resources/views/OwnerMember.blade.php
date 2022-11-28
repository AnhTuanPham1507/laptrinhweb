@extends('layout.App')
@section('content')
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row row-header">
                <div class="col-sm-6">
                    <h2>Manage <b>Owner Member</b></h2>
                </div>

                <form class="search-bar" method="get" action="{{route('search_ownermember')}}">
                    <div class="form-outline">
                        <input type="search" id="searchTerm" name="searchTerm" class="form-control" />
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <span class="material-symbols-outlined">
                            search
                        </span>
                    </button>
                </form>
                <div class="col-sm-6">
                    <a id="createButton" style="float:right" href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New OwnerMember</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <a href="#filterEmployeeModal" data-toggle="modal">
                <span class="material-symbols-outlined my-icon">
                    filter_alt
                </span>
            </a>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Birthday</th>
                    <th>Relationship</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ownerMembers as $o)
                <tr>
                    <td>
                        {{$o->id}}
                    </td>
                    <td>{{$o->name}}</td>
                    <td>{{$o->gender}}</td>
                    <td>
                        @php
                        $date=date_create($o->birthday);
                        echo date_format($date,"d-m-Y");
                        @endphp
                    </td>
                    <td>{{$o->relationship}} of {{$o->Owner->name}}</td>
                    <td>
                        <a 
                            onclick="setUpdatingOwnerMember('{{$o->id}}','{{$o->name}}','{{$o->birthday}}','{{$o->gender}}','{{$o->relationship}}','{{$o->owner_id}}')" href="#editEmployeeModal" class="edit" data-toggle="modal"
                        >
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                        </a>
                        <a onclick="setDeletingOwnerMember('{{$o->id}}')" href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="clearfix">
            <div class="hint-text" style="float:right">
                Showing <b>{{$ownerMembers->count()}}</b> out of <b>{{$ownerMembers->total()}}</b> entries
            </div>
        </div>
        {{$ownerMembers->links()}}

    </div>
</div>
</div>

<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="creatingForm" method="POST" action="{{route('create_ownermember')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <h4 class="modal-title">Add Owner Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                @if($errors->any() && Session::get('action') == 'create')
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input name="birthday" type="date" class="form-control" max="<?= date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-select" aria-label=".form-select-sm example" name="gender">
                            @foreach($genders as $g)
                            <option value="{{$g}}">{{$g}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Relationship</label>
                        <select class="form-select" aria-label=".form-select-sm example" name="relationship">
                            @foreach($relationships as $r)
                            <option value="{{$r}}">{{$r}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Owner</label>
                        <select class="form-select" aria-label=".form-select-sm example" name="owner">
                            @foreach($owners as $o)
                            <option value="{{$o->id}}">{{$o->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('update_ownermember')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <h4 class="modal-title">Edit Owner Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                @if($errors->any() && Session::get('action') == 'update')
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>
                            {{$error}}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="modal-body">
                    <input id="updatingId" name="id" type="hidden" class="form-control" required>

                    <div class="form-group">
                        <label>Name</label>
                        <input id="updatingName" name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Birthday</label>
                        <input id="updatingBirthday" name="birthday" type="date" class="form-control" max="<?= date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-select" aria-label=".form-select-sm example" id="updatingGender" name="gender">
                            @foreach($genders as $g)
                            <option value="{{$g}}">{{$g}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Relationship</label>
                        <select class="form-select" aria-label=".form-select-sm example" id="updatingRelationship" name="relationship">
                            @foreach($relationships as $r)
                            <option value="{{$r}}">{{$r}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Owner</label>
                        <select class="form-select" aria-label=".form-select-sm example" id="updatingOwner" name="owner">
                            @foreach($owners as $o)
                            <option value="{{$o->id}}">{{$o->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-info" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('delete_ownermember')}}">
                {{csrf_field()}}
                <input id="deletingId" name="id" type="hidden" required />
                <div class="modal-header">
                    <h4 class="modal-title">Delete Owner Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete these Records?</p>
                    <p class="text-warning"><small>This action cannot be undone.</small></p>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-danger" value="Delete">
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Filter Modal HTML -->
<div id="filterEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="GET" action="{{route('filter_ownermember')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <h4 class="modal-title">Filter Owner Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input name="name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select multiple class="form-select" aria-label=".form-select-sm example" name="genders[]">
                            <option value="all">All of them</option>
                            @foreach($genders as $g)
                            <option value="{{$g}}">{{$g}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Owner</label>
                        <select multiple class="form-select" aria-label=".form-select-sm example" name="owners[]">
                            <option value="all">All of them</option>
                            @foreach($owners as $o)
                            <option value="{{$o->id}}">{{$o->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Filter">
                </div>
            </form>
        </div>
    </div>
</div>

@if($errors->any())
@if(Session::get('action') == 'create')
<script>
    document.getElementById("createButton").click()
</script>
@endif

@if(Session::get('action') == 'udpate')
<script>
    document.getElementById("updateButton").click()
</script>
@endif
@endif

@stop