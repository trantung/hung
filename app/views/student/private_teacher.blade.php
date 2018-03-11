@extends('admin.layout.default')

@section('title')
{{ $title='Danh sách học sinh' }}
@stop
@section('content')
	<div class="margin-bottom">
	    @include('student.filter')
	</div>
	@if( count($data) )
		<div class="box box-primary">
			<table class ="table table-bordered table-striped table-hover">
				<tr>
					<th>STT</th>
					<th>Họ tên</th>
					<th>Email</th>
					<th>Số điện thoại</th>
					<th>Trình độ</th>
					<th>Thao tác</th>
				</tr>
					@foreach($data as $key => $schedule)
						<tr>
							<td>#{{ $key + 1 + ($data->getPerPage() * ($data->getCurrentPage() -1)) }}</td>
							<td>{{ $schedule->student->full_name }}</td>
							<td>{{ $schedule->student->email }}</td>
							<td>{{ $schedule->student->phone }}</td>
							<td>{{ Common::getLevelName($schedule->student->level) }}</td>
							
							<td>
								{{ renderUrl('PublishController@showScheduleStudent', 'Xem danh sách lịch học', [$schedule->id], ['class' => 'btn btn-primary']) }}
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