@extends('layout.App')
@section('content')
<div class="container-fluid">
    <h2>Danh sách chủ chung cư </h2>

		<a class="nav-link" href="{{route('addowner')}}">Thêm Chủ Chung Cư</a>

    <table class="table table-striped">
        <tr>
            <th>Tên Chủ Chung Cư: </th>
            <th>Email: </th>
            <th>Số Điện Thoại: </th>
            <th>Địa Chỉ: </th>
            <th>Ngày Sinh: </th>
            <th>Giới Tính: </th>
            <th></th> 
            <th></th>
        </tr>
        @foreach($owner as $o)
        <tr>
            <td>{{$o->name}}</td>
            <td>{{$o->email}}</td>
            <td>{{$o->phone}}</td>
            <td>{{$o->hometown}}</td>
            <td>{{$o->birthday}}</td>
            <td>
            {{$o->gender}}
            </td>
            <td>
                <a href="{{route('deleteowner',['id'=>$o->id])}}" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
            <td>
            <a 
                            onclick="setUpdatingOwnerMember('{{$o->id}}','{{$o->name}}','{{$o->email}}','{{$o->phone}}','{{$o->hometown}}','{{$o->birthday}}','{{$o->gender}}')" href="#editEmployeeModal" class="edit" data-toggle="modal"
                        >
                            <i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                        </a>
             </td>
            

        </tr>
        @endforeach
    </table>
</div>
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('update_owner')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <h4 class="modal-title">Edit Property detail</h4>
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
                        <label>Email:  </label>
                        <input id="updatingemail" name="email" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>phone:  </label>
                        <input id="updatingphone" name="phone" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>hometown  </label>
                        <input id="updatinghometow" name="hometown" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>birthDay  </label>
                        <input id="updatingBirthday" name="birthday" type="date" class="form-control" max="<?= date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <label>gender</label>
                        <select class="form-select" aria-label=".form-select-sm example" name="gender">
                            @foreach($genders as $g)
                            <option value="{{$g}}">{{$g}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select class="form-select" aria-label=".form-select-sm example" id="updatingGender" name="gender">
                            @foreach($genders as $g)
                            <option value="{{$g}}">{{$g}}</option>
                            @endforeach
                        </select>
                    </div>

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
@stop

