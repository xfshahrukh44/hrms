{{ Form::open(array('route' => array('store.language'))) }}
<div class="row">
    <div class="form-group col-md-12">
        {{ Form::label('code', __('Language Code')) }}
        {{ Form::text('code', '', array('class' => 'form-control','required'=>'required')) }}
        @error('code')
        <span class="invalid-code" role="alert">
            <strong class="text-danger">{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn dark btn-outline" data-dismiss="modal">{{__('Cancel')}}</button>
    {{Form::submit(__('Create'),array('class'=>'btn green'))}}
</div>
{{ Form::close() }}

