@extends('layout.App')
@section('content')
		<div class="container-fluid">
			<div class="row">
				@foreach ($Property as $p)
				<div class="product col-md-4 col-sm-4 col-lg-4 item" style="border: 1px solid gray; text-align: center;">
					Số phòng:
					<a href="{{route('prodetail',['PropertyId'=>$p->id])}}">{{$p -> property_number}}</a><br>
					<br>Chủ Sỏ Hữu: {{$p -> Owner ->name}}
				</div>
				@endforeach
			</div>
		</div>

@stop
