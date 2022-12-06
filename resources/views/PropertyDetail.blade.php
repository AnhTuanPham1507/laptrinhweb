@extends('layout.App')
@section('content')
		<div class="container">
			<div class="productdetail">
				Mã căn Hộ: {{$prod->id}} <br>
				Số Phòng: {{$prod->property_number}} <br>
				Loại phòng: {{$prod->type}} <br>
                Số Lầu: {{$prod->floor_number}} <br>
                Tên Chủ Sở Hữu Hiện Tại: {{$prod->Owner ->name}} <br>
                <a 
                            onclick="setUpdatingOwnerMember('{{$prod->id}}','{{$prod->property_number}}','{{$prod->type}}','{{$prod->floor_number}}','{{$prod->Owner ->name}}')" href="#editEmployeeModal" class="edit" data-toggle="modal"
                        >
                            Sửa<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
                </a>

			</div>
		</div>
<div id="editEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{route('update_property')}}">
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
                        <label>Mã căn hộ:  </label>
                        <input id="updatingName" name="property_number" type="text" class="form-control">
                    </div>
                    
                    <div class="form-group">
                        <label>Loại Phòng:</label>
                        <select class="form-select" aria-label=".form-select-sm example" name="type">
                            @foreach($type as $t)
                            <option value="{{$t}}">{{$t}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tên Chủ Sở Hữu Hiện Tại: </label>
                        <select class="form-select" aria-label=".form-select-sm example" name="owner">
                            @foreach($owner as $o)
                            <option value="{{$o->id}}">{{$o ->name}}</option>
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