@extends('Admin.layout.master')
@section('title', __('messages.setting'))
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
                    <h2><strong><i class="zmdi zmdi-chart"></i> {{ __('messages.Update_Setting') }}</strong></h2>
                    <ul class="header-dropdown">
                        <li class="remove">
                            <a role="button" class="boxs-close"><i class="zmdi zmdi-close"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="body mb-2">
                    <form enctype="multipart/form-data" method="POST" action="{{ route('setting.store') }}">
                        @csrf
                        <input type="hidden" id="profile_id" name="profile_id" value="{{$profile->id}}">
                        <div class="card col-12">
                            <div class="row">
                                <div class="form-group col-4">
                                    <div class="row">
                                        <label class="title_style4">{{ __('messages.lang') }}:<i class="required_style1">*</i>
                                        </label>
                                        @foreach ($langs as $value)
                                            <div class="form-group col-3">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="lang" id="{{$value}}" value="{{$value}}" @if ((empty(!$setting) and $setting->lang == $value) or $loop->first) checked @endif >{{$value}}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <div class="row">
                                        <label class="title_style4">{{ __('messages.theme') }}:<i class="required_style1"></i>
                                        </label>
                                        @foreach ($themes as $value)
                                            <div class="form-group col-5">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="theme" id="{{$value}}" value="{{$value}}" @if ((empty(!$setting) and$setting->theme == $value) or $loop->first) checked @endif >{{$value}}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <div class="row">
                                        <label class="title_style4">{{ __('messages.rtl') }}:<i class="required_style1"></i>
                                        </label>
                                        @foreach ($rtl as $value)
                                            <div class="form-group col-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="rtl" id="{{$value}}" value="{{$value}}" @if ((empty(!$setting) and $setting->rtl == $value) or $loop->first) checked @endif >{{$value}}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">{{ __('messages.send') }}</button>
                                <button class="btn btn-secondary" href="{{ route('setting.create') }}" type="reset">{{ __('messages.refresh') }}</button>
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
