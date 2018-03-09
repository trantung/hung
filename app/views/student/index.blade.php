@extends('admin.layout.default')

@section('title')
{{ $title='Quản lý học sinh' }}
@stop
@section('content')
	<div class="row margin-bottom">
	    <div class="col-xs-12">
			<a href="{{ action('ManagerStudentController@create') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Thêm học sinh mới</a>
	    </div>
	</div>
	@if( count($data) )
		<div class="box box-primary">
			<table class ="table table-bordered table-striped table-hover">
				<tr>
					<th>STT</th>
					<th>Họ tên</th>
					<th>Email</th>
					<th>Số điện thoại</th>
					<th>Giới tính</th>
					<th>Ngày sinh</th>
					<th>Thao tác</th>
				</tr>
					@foreach($data as $key => $student)
						<tr>
							<td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
							<td>{{ $student->full_name }}</td>
							<td>{{ $student->email }}</td>
							<td>{{ $student->phone }}</td>
							<td>{{ Common::getGenderName($student->gender) }}</td>
							<td>{{ date('d/m/Y', strtotime($student->birth_day)) }}</td>
							<td>
					           <a href="{{ action('ManagerStudentController@edit', $student->id) }}" class="btn btn-primary" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
							   {{ Form::open(array('method'=>'DELETE', 'action' => array('AdminController@destroy', $student->id), 'style' => 'display: inline-block;')) }}
					           <button title="Delete" class="btn btn-danger" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="glyphicon glyphicon-remove"></i></button>
					           {{ Form::close() }}
							</td>
						</tr>
					@endforeach
			</table>
			<div class="clear clearfix"></div>
			{{ $data->appends(Request::except('page'))->links() }}
		</div>
	@else
		<div class="alert alert-warning">Rất tiếc, không có dữ liệu hiển thị!</div>
	@endif
@stop