@extends('layout.App')
@section('content')
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Owner Member</b></h2>
                </div>
                <div class="col-sm-6">
                    <a id="createButton" style="float:right" href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New OwnerMember</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
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
                        <a href="#editEmployeeModal" class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="#deleteEmployeeModal" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        <div class="clearfix">
            <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
            <ul class="pagination">
                <li class="page-item disabled"><a href="#">Previous</a></li>
                <li class="page-item"><a href="#" class="page-link">1</a></li>
                <li class="page-item"><a href="#" class="page-link">2</a></li>
                <li class="page-item active"><a href="#" class="page-link">3</a></li>
                <li class="page-item"><a href="#" class="page-link">4</a></li>
                <li class="page-item"><a href="#" class="page-link">5</a></li>
                <li class="page-item"><a href="#" class="page-link">Next</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- Add Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('create_ownermember')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <h4 class="modal-title">Add Owner Member</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                @if($errors->any())
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
                        <select name="gender">
                            @foreach($genders as $g)
                            <option value="{{$g}}">{{$g}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Relationship</label>
                        <select name="relationship">
                            @foreach($relationships as $r)
                            <option value="{{$r}}">{{$r}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Owner</label>
                        <select name="owner">
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
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <textarea class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" required>
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
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Delete Employee</h4>
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

@if($errors->any())
    @if(Session::get('action') == 'create')
        <script>
                document.getElementById("createButton").click()
        </script>
    @endif
@endif

@stop