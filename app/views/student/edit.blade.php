@extends('admin.layout.default')

@section('title')
{{ $title='Sửa | '.$student->full_name }}
@stop

@section('content')
<div class="row margin-bottom">
    <div class="col-xs-12">
        <a href="{{ action('ManagerStudentController@index') }}" class="btn btn-success">Danh sách học sinh</a>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            {{ Form::open(array('action' => array('ManagerStudentController@update', $student->id), 'method' => "PUT", 'files' => true)) }}
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <fieldset>
                                <legend>Thông tin học sinh</legend>
                                <div class="form-group">
                                    <label>Họ và tên <span class="text-warning">(*)</span></label>
                                    {{  Form::text('full_name', $student->full_name, array('class' => 'form-control', 'required' => 'required' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Ảnh đại diện</label>
                                    <input type="file" name="avatar" class="form-control">
                                    {{ !empty($student->avatar) ? '<br><a target="_blank" href="'.$student->avatar.'"><img width="100px" src="'.$student->avatar.'"></a>' : '' }}
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="text-warning">(*)</span></label>
                                    {{  Form::email('email', $student->email, array('class' => 'form-control', 'required' => 'required' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại <span class="text-warning">(*)</span></label>
                                    {{  Form::text('phone', $student->phone, array('class' => 'form-control', 'required' => 'required' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ <span class="text-warning">(*)</span></label>
                                    {{  Form::text('address', $student->address, array('class' => 'form-control', 'required' => 'required' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Giới tính <span class="text-warning">(*)</span></label>
                                    {{ Form::select('gender', ['' => '-- Chọn --', NAM => 'Nam', NU => 'Nữ', BD => 'Không xác định'], $student->gender, ['class' => 'form-control', 'required' => 'required']); }}
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh <span class="text-warning">(*)</span></label>
                                    <input type="date" name="birth_day" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control" required value="{{ $student->birth_day }}">
                                </div>
                            </fieldset>
                        </div>

                        <div class="col-sm-6">
                            <fieldset>
                                <div class="form-group">
                                    <label>Chọn thời lượng buổi học</label>
                                    {{  Form::select('level', ['' => '-- Chọn --', 30 => '30 phút', 60 => '60 phút', 90 => '90 phút'], $student->level, array('class' => 'form-control', 'rows' => 3 )) }}
                                </div>
                                <div class="form-group">
                                    <label>Ngày bắt đầu học</label>
                                    <input type="date" name="start_date" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" class="form-control" value="{{ $student->start_date }}">
                                </div>
                                <div class="form-group">
                                    <label>Trình độ</label>
                                    {{  Form::select('level', ['' => '-- Chọn --', BEGINING => 'Begining', ADVANCE => 'Advance'], $student->level, array('class' => 'form-control', 'rows' => 3 )) }}
                                </div>
                                <legend>Thông tin đính kèm</legend>
                                <div class="form-group">
                                    <label>Họ tên bố/mẹ</label>
                                    {{  Form::text('parent_name', $student->parent_name, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Email bố/mẹ</label>
                                    {{  Form::text('parent_email', $student->parent_email, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại bố/mẹ</label>
                                    {{  Form::text('parent_phone', $student->parent_phone, array('class' => 'form-control' )) }}
                                </div>
                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    {{  Form::textarea('comment', $student->comment, array('class' => 'form-control', 'rows' => 3 )) }}
                                </div>
                            </fieldset>
                        </div>
                    </div> {{-- End row --}}
                </div> {{-- End box-body --}}

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                </div>
            {{ Form::close() }}
        </div>
        <!-- /.box -->
    </div>
</div>
@stop