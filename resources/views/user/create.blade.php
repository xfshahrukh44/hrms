{!! Form::open(['route' => 'user.store','method' => 'post']) !!}
@csrf
<div class="row">
    <div class="form-group col-lg-6 col-md-6">
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', null, ['class' => 'form-control','required' => 'required']) !!}
    </div>

    <div class="form-group col-lg-6 col-md-6">
        {!! Form::label('email', 'Email') !!}
        {!! Form::text('email', null, ['class' => 'form-control','required' => 'required']) !!}
    </div>
    <div class="form-group col-lg-6 col-md-6">
        {!! Form::label('password', 'Password') !!}
        {!! Form::password('password', ['class' => 'form-control','required' => 'required']) !!}
    </div>

    @if(\Auth::user()->type != 'super admin')
        <div class="form-group col-lg-6 col-md-6 ">
            {{ Form::label('role', __('User Role')) }}
            {!! Form::select('role', $roles, null,array('class' => 'form-control select2','required'=>'required')) !!}
            @error('role')
            <span class="invalid-role" role="alert">
                <strong class="text-danger">{{ $message }}</strong>
        </span>
            @enderror
        </div>
    @endif
    <div class="col-md-12 text-right">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('Cancel')}}</button>
        {{Form::submit(__('Create'),array('class'=>'btn btn-primary'))}}
    </div>
</div>
{!! Form::close() !!}

