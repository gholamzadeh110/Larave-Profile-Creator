@extends('Admin.layout.master')
@section('title', __('messages.dashboard'))
@section('page-style')
<link rel="stylesheet" href="{{asset('assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css')}}"/>
<link rel="stylesheet" href="{{asset('assets/plugins/charts-c3/plugin.css')}}" />
<link rel="stylesheet" href="{{asset('assets/plugins/morrisjs/morris.min.css')}}" />
@stop
@section('content')
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card">
                <div class="header">
                    <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.dashboard') }}</strong></h2>
                    <ul class="header-dropdown">
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="body mb-2">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('dashboard.publish',['profile' => $profile->id]) }}">
                        @csrf
                        <input type="hidden" id="id" name="id" value="{{$profile->id}}">
                        <div class="card col-12">
                            <div class="row">
                                <div class="form-group col-6">
                                    <label class="title_style4">name:<i class="required_style1">*</i>
                                    </label>
                                    <input type="text" id="name" name="name" class="form-control" style="font-size: 12px" placeholder="Please Enter Your Name." value="{{$profile->name}}">
                                </div>
                                <div class="form-group col-6">
                                    <label class="title_style4">family:<i class="required_style1">*</i>
                                    </label>
                                    <input type="text" id="family" name="family" class="form-control" style="font-size: 12px" placeholder="Please Enter Your Family." value="{{$profile->family}}">
                                </div>
                                @if($profile->publish)
                                    <div class="form-group col-12">
                                        <label class="title_style4">{{ __('messages.link') }}:<i class="required_style1"></i>
                                        </label>
                                        <a href="http://gnew.ir/{{$profile->id}}" type="text" id="link" name="link" class="form-control" style="font-size: 12px">
                                            http://gnew.ir/{{$profile->id}}
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">{{ __('messages.Publish') }}</button>
                                <button class="btn btn-secondary" href="{{ route('experience.create') }}" type="reset">{{ __('messages.refresh') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('page-script')
<script src="{{asset('assets/bundles/jvectormap.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/sparkline.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/c3.bundle.js')}}"></script>
<script src="{{asset('assets/js/pages/index.js')}}"></script>
@stop
