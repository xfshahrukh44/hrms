{{ Form::model($shift, array('route' => array('shift.update', $shift->id), 'method' => 'PUT')) }}
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('title', __('Title')) }}
        {{ Form::text('title', null, array('class' => 'form-control title','required'=>'required')) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('start_time', __('Start Time')) }}
        {{ Form::time('start_time', null, array('class' => 'form-control start_time','required'=>'required')) }}
    </div>

    <div class="form-group col-md-6">
        {{ Form::label('end_time', __('End Time')) }}
        {{ Form::time('end_time', null, array('class' => 'form-control end_time','required'=>'required')) }}
    </div>
</div>
<div class="row">
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Update'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{{ Form::close() }}

