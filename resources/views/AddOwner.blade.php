@extends('layout.App')
@section('content')

@if($errors -> any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors -> all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{route('insert')}}" enctype="multipart/form-data">
    {{csrf_field()}}
    <div class="form-group" >
        <label for="name">Tên chủ sở hữu: </label>
        <input type="text" name="name" id="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email:  </label>
        <input type="text" name="email" id="email" class="form-control">
    </div>
    <div class="form-group">
        <label for="Phone">Phone:  </label>
        <input type="text" name="phone" id="phone" class="form-control">
    </div>
    <div class="form-group">
        <label for="Hometown">Hometown:  </label>
        <input type="text" name="hometown" id="hometown" class="form-control">
    </div>
    <div class="form-group">
        <label for="Birthday">Birthday:  </label>
        <input name="birthday" type="date" class="form-control" max="<?= date('Y-m-d'); ?>" required>
    </div>
    <div class="form-group">
        <label>Gender:</label>
         <select class="form-select" aria-label="form-control" name="gender">
        @foreach($genders as $g)
            <option value="{{$g}}">{{$g}}</option>
         @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-info">Thêm</button>
    
</form>
@stop