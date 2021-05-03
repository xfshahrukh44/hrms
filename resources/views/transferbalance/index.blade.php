@extends('layouts.dashboard')
@section('page-title')
    {{__('Transfer Balance')}}
@endsection
@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{__('Manage Transfer Balance')}}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{route('home')}}">{{__('Description')}}</a></div>
                    <div class="breadcrumb-item">{{__('Transfer Balance')}}</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="d-flex justify-content-between w-100">
                                    <h4>{{__('Transfer Balance List')}}</h4>
                                    @can('Create Transfer Balance')
                                        <a href="#" data-url="{{ route('transferbalance.create') }}" class="btn btn-sm btn-primary btn-round btn-icon" data-ajax-popup="true" data-toggle="tooltip" data-title="{{__('Create New Transfer Balance')}}" data-original-title="{{__('Create Transfer Balance')}}">
                                            <i class="fa fa-plus"></i> {{__('Create')}}
                                        </a>
                                    @endcan
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped mb-0" id="dataTable">
                                        <thead>
                                        <tr>
                                            <th>{{__('From Account')}}</th>
                                            <th>{{__('To Account')}}</th>
                                            <th>{{__('Date')}}</th>
                                            <th>{{__('Amount')}}</th>
                                            <th>{{__('Payment Method')}}</th>
                                            <th>{{__('Ref#')}}</th>
                                            <th class="text-right" width="200px">{{__('Action')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($transferbalances as $transferbalance)
                                            <tr>
                                                <td>{{ !empty($transferbalance->account($transferbalance->from_account_id))?$transferbalance->account($transferbalance->from_account_id)->account_name:'' }}</td>
                                                <td>{{ !empty($transferbalance->account($transferbalance->to_account_id))?$transferbalance->account($transferbalance->to_account_id)->account_name:'' }}</td>
                                                <td>{{  \Auth::user()->dateFormat($transferbalance->date) }}</td>
                                                <td>{{  \Auth::user()->priceFormat($transferbalance->amount) }}</td>
                                                <td>{{ !empty($transferbalance->payment_type($transferbalance->payment_type_id))?$transferbalance->payment_type($transferbalance->payment_type_id)->name:'' }}</td>
                                                <td>{{ $transferbalance->referal_id }}</td>

                                                <td class="text-right">
                                                    @can('Edit Transfer Balance')
                                                        <a href="#" data-url="{{ URL::to('transferbalance/'.$transferbalance->id.'/edit') }}" data-size="lg" data-ajax-popup="true" data-title="{{__('Edit Transfer Balance')}}" class="btn btn-outline-primary btn-sm mr-1" data-toggle="tooltip" data-original-title="{{__('Edit')}}"><i class="fas fa-pencil-alt"></i> <span>{{__('Edit')}}</span></a>
                                                    @endcan
                                                    @can('Delete Transfer Balance')
                                                        <a href="#" class="btn btn-outline-danger btn-sm" data-toggle="tooltip" data-original-title="{{__('Delete')}}" data-confirm="Are You Sure?|This action can not be undone. Do you want to continue?" data-confirm-yes="document.getElementById('delete-form-{{$transferbalance->id}}').submit();"><i class="fas fa-trash"></i> <span>{{__('Delete')}}</span></a>
                                                        {!! Form::open(['method' => 'DELETE', 'route' => ['transferbalance.destroy', $transferbalance->id],'id'=>'delete-form-'.$transferbalance->id]) !!}
                                                        {!! Form::close() !!}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

