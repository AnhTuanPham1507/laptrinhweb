@extends('layout.App')
@section('content')
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <b>Chi Phí</b></h2>
                </div>
                <div class="col-sm-6">
                    <a id="createButton" style="float:right" href="#addChiPhi" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm Loại Chi Phí</span></a>
                </div>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nhà cung cấp</th>
                    <th>Tên khách hàng</th>
                    <th>Tháng</th>
                    <th>Tiền điện</th>
                    <th>Tiền nước</th>
                    <th>Phí quản lý</th>
                    <th>Phí đổ xe</th>
                    <th>Trạng thái</th>
                    <th>Phí đổ xe</th>
                    <th>Tài sản</th>
                    <th>Chi phí khác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($ChiPhi as $ChiPhi)
                <tr>
                    <td>
                        {{$ChiPhi->namencc}} 
                    </td>
                    <td>{{$ChiPhi->namekh}} of {{$Owner-> name}}</td>
                    <td>{{$ChiPhi-> month}}</td>
                    <td>{{$ChiPhi->electric_fee}}</td>
                    <td>{{$ChiPhi-> water_fee}}</td>
                    <td>{{$ChiPhi-> management_fee}}</td>
                    <td>{{$ChiPhi-> parking_fee}}</td>
                    <td>{{$ChiPhi-> status}}</td>
                    <td>{{$ChiPhi-> property_id}}</td>
                    <td>{{$ChiPhi-> other_fee}}</td>
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
            <form method="POST" action="{{route('create_chiphi')}}">
                {{csrf_field()}}
                <div class="modal-header">
                    <h4 class="modal-title">Thêm chi phí</h4>
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
                        <label>Nhà cung cấp</label>
                        <input name="namencc" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input name="namekh" type="text" class="form-control" max="<?= date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tháng</label>
                        <select name="month">
                            @foreach($month as $m)
                            <option value="{{$m}}">{{$m}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiền điện</label>
                        <input name="electric_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tiền nước</label>
                        <input name="water_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tiền điện</label>
                        <input name="electric_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phí quản lý</label>
                        <input name="management_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phí đổ xe</label>
                        <input name="parking_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tài sản</label>
                        <input name="property_fee" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phí khác</label>
                        <input name="other_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status">
                            @foreach($status as $s)
                            <option value="{{$s}}">{{$s}}</option>
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
<div class="modal-body">
                    <div class="form-group">
                        <label>Nhà cung cấp</label>
                        <input name="namencc" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tên khách hàng</label>
                        <input name="namekh" type="text" class="form-control" max="<?= date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Tháng</label>
                        <select name="month">
                            @foreach($month as $m)
                            <option value="{{$m}}">{{$m}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tiền điện</label>
                        <input name="electric_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tiền nước</label>
                        <input name="water_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tiền điện</label>
                        <input name="electric_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phí quản lý</label>
                        <input name="management_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phí đổ xe</label>
                        <input name="parking_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tài sản</label>
                        <input name="property_fee" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Phí khác</label>
                        <input name="other_fee" type="number" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <select name="status">
                            @foreach($status as $s)
                            <option value="{{$s}}">{{$s}}</option>
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